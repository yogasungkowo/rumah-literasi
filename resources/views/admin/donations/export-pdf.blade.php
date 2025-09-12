<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Donations Report</title>
    <style>
        @page {
            margin: 20mm;
            footer: html_footer;
        }
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            line-height: 1.4;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #2563eb;
            padding-bottom: 15px;
        }
        .header h1 {
            color: #2563eb;
            margin: 0 0 10px 0;
            font-size: 24px;
            font-weight: bold;
        }
        .header h2 {
            color: #666;
            margin: 0 0 5px 0;
            font-size: 16px;
            font-weight: normal;
        }
        .header p {
            margin: 0;
            color: #666;
            font-size: 11px;
        }
        .summary {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            border: 1px solid #e9ecef;
        }
        .summary h3 {
            margin: 0 0 10px 0;
            color: #2563eb;
            font-size: 14px;
        }
        .summary-grid {
            display: table;
            width: 100%;
        }
        .summary-row {
            display: table-row;
        }
        .summary-col {
            display: table-cell;
            padding: 3px 15px 3px 0;
            font-size: 11px;
        }
        .summary-label {
            font-weight: bold;
            width: 150px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 10px;
        }
        th, td {
            border: 1px solid #dee2e6;
            padding: 6px;
            text-align: left;
            vertical-align: top;
        }
        th {
            background-color: #2563eb;
            color: white;
            font-weight: bold;
            font-size: 10px;
        }
        tr:nth-child(even) {
            background-color: #f8f9fa;
        }
        .status {
            padding: 2px 6px;
            border-radius: 3px;
            font-size: 9px;
            font-weight: bold;
            text-align: center;
            display: inline-block;
            min-width: 60px;
        }
        .status-pending { background: #fef3c7; color: #92400e; }
        .status-approved { background: #d1fae5; color: #065f46; }
        .status-picked_up { background: #dbeafe; color: #1e40af; }
        .status-completed { background: #e9d5ff; color: #6b21a8; }
        .status-rejected { background: #fee2e2; color: #991b1b; }
        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 10px;
            color: #666;
            border-top: 1px solid #e9ecef;
            padding-top: 10px;
        }
        .page-break {
            page-break-before: always;
        }
        .text-center { text-align: center; }
        .text-right { text-align: right; }
        .no-wrap { white-space: nowrap; }
    </style>
</head>
<body>
    <div class="header">
        <h1>Rumah Literasi</h1>
        <h2>Laporan Donasi Buku</h2>
        <p>Digenerate pada: {{ now()->format('d F Y, H:i:s') }}</p>
        @if($startDate !== 'all' && $endDate !== 'all')
            <p>Periode: {{ \Carbon\Carbon::parse($startDate)->format('d F Y') }} s/d {{ \Carbon\Carbon::parse($endDate)->format('d F Y') }}</p>
        @else
            <p>Periode: Semua Data</p>
        @endif
    </div>

    <div class="summary">
        <h3>Ringkasan</h3>
        <div class="summary-grid">
            <div class="summary-row">
                <div class="summary-col summary-label">Total Donasi:</div>
                <div class="summary-col">{{ number_format($donations->count()) }}</div>
                <div class="summary-col summary-label">Total Buku:</div>
                <div class="summary-col">{{ number_format($donations->sum('total_books')) }}</div>
            </div>
            <div class="summary-row">
                <div class="summary-col summary-label">Pending:</div>
                <div class="summary-col">{{ number_format($donations->where('status', 'pending')->count()) }}</div>
                <div class="summary-col summary-label">Disetujui:</div>
                <div class="summary-col">{{ number_format($donations->where('status', 'approved')->count()) }}</div>
            </div>
            <div class="summary-row">
                <div class="summary-col summary-label">Selesai:</div>
                <div class="summary-col">{{ number_format($donations->where('status', 'completed')->count()) }}</div>
                <div class="summary-col summary-label">Ditolak:</div>
                <div class="summary-col">{{ number_format($donations->where('status', 'rejected')->count()) }}</div>
            </div>
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th width="5%">ID</th>
                <th width="20%">Nama Donatur</th>
                <th width="18%">Email</th>
                <th width="12%">Telepon</th>
                <th width="8%">Jml Buku</th>
                <th width="12%">Status</th>
                <th width="12%">Tgl Dibuat</th>
                <th width="13%">Tgl Pickup</th>
            </tr>
        </thead>
        <tbody>
            @foreach($donations as $index => $donation)
                <tr>
                    <td class="text-center">{{ $donation->id }}</td>
                    <td>{{ $donation->donor_name }}</td>
                    <td style="font-size: 9px;">{{ $donation->donor_email }}</td>
                    <td class="no-wrap">{{ $donation->donor_phone }}</td>
                    <td class="text-center">{{ $donation->total_books }}</td>
                    <td class="text-center">
                        <span class="status status-{{ $donation->status }}">
                            @switch($donation->status)
                                @case('pending') Pending @break
                                @case('approved') Disetujui @break
                                @case('picked_up') Diambil @break
                                @case('completed') Selesai @break
                                @case('rejected') Ditolak @break
                                @default {{ ucfirst($donation->status) }}
                            @endswitch
                        </span>
                    </td>
                    <td class="text-center no-wrap">{{ $donation->created_at->format('d/m/Y H:i') }}</td>
                    <td class="text-center no-wrap">
                        {{ $donation->pickup_date ? \Carbon\Carbon::parse($donation->pickup_date)->format('d/m/Y') : '-' }}
                    </td>
                </tr>
                
                {{-- Add page break every 20 records --}}
                @if(($index + 1) % 20 == 0 && !$loop->last)
                    </tbody>
                    </table>
                    <div class="page-break"></div>
                    <table>
                        <thead>
                            <tr>
                                <th width="5%">ID</th>
                                <th width="20%">Nama Donatur</th>
                                <th width="18%">Email</th>
                                <th width="12%">Telepon</th>
                                <th width="8%">Jml Buku</th>
                                <th width="12%">Status</th>
                                <th width="12%">Tgl Dibuat</th>
                                <th width="13%">Tgl Pickup</th>
                            </tr>
                        </thead>
                        <tbody>
                @endif
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        <p>Laporan ini digenerate secara otomatis oleh sistem Rumah Literasi.</p>
        <p>Halaman dari {{ $donations->count() }} total donasi</p>
    </div>
</body>
</html>
