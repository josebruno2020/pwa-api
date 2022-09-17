<?php

namespace App\Console\Commands;

use App\Services\External\NodeReportsService;
use Illuminate\Console\Command;

class DeleteReports extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reports:delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send request to delete all reports';

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
        NodeReportsService::deleteReports();

        return 0;
    }
}
