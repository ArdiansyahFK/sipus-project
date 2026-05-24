<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CreateDatabase extends Command
{
    protected $signature = 'db:create-if-not-exists';
    protected $description = 'Create database if it does not exist';

    public function handle()
    {
        $database = config('database.connections.mysql.database');

        try {
            DB::statement("CREATE DATABASE IF NOT EXISTS `$database`");
            $this->info("Database '$database' created successfully or already exists.");
            return 0;
        } catch (\Exception $e) {
            $this->error("Error creating database: " . $e->getMessage());
            return 1;
        }
    }
}
