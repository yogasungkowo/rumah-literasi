<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Investor;

class SyncInvestorOrganization extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:investor-organization';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync organization field in users table with company_name in investors table';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Starting synchronization of investor organization data...');

        // Sync from investors to users (company_name -> organization)
        $investors = Investor::with('user')->whereNotNull('company_name')->get();
        $syncedFromInvestor = 0;

        foreach ($investors as $investor) {
            if ($investor->user && $investor->user->organization !== $investor->company_name) {
                $investor->user->withoutEvents(function () use ($investor) {
                    $investor->user->update(['organization' => $investor->company_name]);
                });
                $syncedFromInvestor++;
            }
        }

        // Sync from users to investors (organization -> company_name)
        $investorUsers = User::role('Investor')->with('investor')->whereNotNull('organization')->get();
        $syncedFromUser = 0;

        foreach ($investorUsers as $user) {
            if (!$user->investor) {
                // Create investor profile if not exists
                $user->investor()->create(['company_name' => $user->organization]);
                $syncedFromUser++;
            } elseif ($user->investor->company_name !== $user->organization) {
                // Update existing investor profile
                $user->investor->withoutEvents(function () use ($user) {
                    $user->investor->update(['company_name' => $user->organization]);
                });
                $syncedFromUser++;
            }
        }

        $this->info("Synchronization completed!");
        $this->info("- Updated {$syncedFromInvestor} user organization fields from investor company_name");
        $this->info("- Updated {$syncedFromUser} investor company_name fields from user organization");

        return Command::SUCCESS;
    }
}
