<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Chrome extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'chrome';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Execute ChromeDriver';

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->output->writeln('Starting ChromeDriver');
        shell_exec('"./vendor/laravel/dusk/bin/chromedriver-win.exe" --verbose');
    }
}
