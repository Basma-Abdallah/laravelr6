<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class BackupDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'backup:database';


    /**
     * The console command description.
     *
     * @var string
     */

   
     protected $description = 'Backup the database to a file';
    /**
     * Execute the console command.
     */
    public function handle()
    {
        $databaseName = env('laravelR6');
        $username = env('root');
        $password = env('');
        $host = env('127.0.0.1');
        $port = env('DB_PORT', '3306');

        $date = now()->format('Y-m-d_H-i-s');
        $backupFile = "backup/{$databaseName}_{$date}.sql";

        $command = "mysqldump --user={$username} --password={$password} --host={$host} --port={$port} {$databaseName} > " . storage_path($backupFile);
    
        exec($command, $output, $return);

        if ($return === 0) {
            $this->info('Backup successfully created: ' . $backupFile);
        } else {
            $this->error('Backup failed.');
        }
    }
}
