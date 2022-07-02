<?php

namespace Abdulsalamishaq\Lazerpay\Commands;

use Illuminate\Console\Command;

class LazerpayCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    public $signature = 'lazerpay:install';

    /**
     * The console command description.
     *
     * @var string
     */
    public $description = 'Install lazerpay assets';

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
     * @return mixed
     */
    public function handle()
    {
        $this->line("<info>Setting up lazerpay</info>");
        $this->line("");
        sleep(2);

        $this->call('vendor:publish', [
            '--tag' => 'lazerpay-config',
        ]);

        $this->line("");
        sleep(2);
        $this->line("<info> lazerpay installed sucessfully!!</info>");
    }
}
