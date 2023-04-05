<?php

namespace Modules\Invitation\Console\Commands;

use Illuminate\Console\Command;

class InvitationCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:InvitationCommand';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Invitation Command description';

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
