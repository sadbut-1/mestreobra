<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\FeedbackEmailService;

class SendFeedbackMailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:feedback';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Envia o primeiro e-mail de feedback para o cliente';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(FeedbackEmailService $service)
    {
        parent::__construct();
        $this->service = $service;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->service->send();
    }
}
