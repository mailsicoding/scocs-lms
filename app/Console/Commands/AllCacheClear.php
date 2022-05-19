<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class AllCacheClear extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'all:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear SCOCS LMS cache, config, optimize, views, routes';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->call('view:clear');
        $this->call('cache:clear');
        $this->call('config:clear');
        $this->call('config:cache');
        $this->call('route:cache');
        $this->call('optimize:clear');         
        $this->info('All Cache Cleared Successfully.');
    }
}
