<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Traits\ConsoleTrait;

class SendMessage extends Command
{
    use ConsoleTrait { login as protected traitlogin; }
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:message';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send message';

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
        $ig = $this->traitlogin();
        $userId = $ig->people->getUserIdForName('gimtonic3');
        $recipientuserId = $ig->people->getUserIdForName('gimtonic86');

        $ig->direct->sendText(['users' => [$recipientuserId]], 'last comment');
    }
}
