<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ImportDades extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:casino';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Importar fitxer .sql amb les dades bd casino';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        DB::unprepared(file_get_contents(storage_path('casino_failed_jobs.sql')));
        DB::unprepared(file_get_contents(storage_path('casino_games.sql')));
        DB::unprepared(file_get_contents(storage_path('casino_migrations.sql')));
        DB::unprepared(file_get_contents(storage_path('casino_oauth_access_tokens.sql')));
        DB::unprepared(file_get_contents(storage_path('casino_oauth_auth_codes.sql')));
        DB::unprepared(file_get_contents(storage_path('casino_oauth_clients.sql')));
        DB::unprepared(file_get_contents(storage_path('casino_oauth_personal_access_clients.sql')));
        DB::unprepared(file_get_contents(storage_path('casino_oauth_refresh_tokens.sql')));
        DB::unprepared(file_get_contents(storage_path('casino_password_resets.sql')));
        DB::unprepared(file_get_contents(storage_path('casino_personal_access_tokens.sql')));
        DB::unprepared(file_get_contents(storage_path('casino_players.sql')));
        DB::unprepared(file_get_contents(storage_path('casino_users.sql')));
                
        return 0;
    }
}
