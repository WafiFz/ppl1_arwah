<?php

namespace Modules\Wedding\Console\Commands;

use Illuminate\Console\Command;

class WeddingCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:WeddingCommand';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Wedding Command description';

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
