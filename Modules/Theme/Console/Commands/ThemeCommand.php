<?php

namespace Modules\Theme\Console\Commands;

use Illuminate\Console\Command;

class ThemeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:ThemeCommand';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Theme Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        return Command::SUCCESS;
    }
}
