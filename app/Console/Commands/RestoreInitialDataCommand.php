<?php

namespace App\Console\Commands;

use App\Models\Budget;
use App\Models\Category;
use App\Models\Expense;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class RestoreInitialDataCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:restore-initial-data-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Truncate the tables first to clear existing data
        User::truncate();
        Category::truncate();
        Budget::truncate();
        Expense::truncate();

        // Re-run the seeders to restore the initial data
        Artisan::call('db:seed', [
            '--class' => 'AdminUserSeeder',
        ]);

        Artisan::call('db:seed', [
            '--class' => 'CategorySeeder',
        ]);

        Artisan::call('db:seed', [
            '--class' => 'BudgetSeeder',
        ]);

        Artisan::call('db:seed', [
            '--class' => 'ExpenseSeeder',
        ]);

        $this->info('Data has been restored to its initial state.');
    }
}
