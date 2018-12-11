<?php

namespace App\Console\Commands;

use App\Classes\WebSocket;
use App\User;
use Illuminate\Console\Command;
use Ratchet\Http\HttpServer;
use Ratchet\Server\IoServer;
use Ratchet\WebSocket\WsServer;

class Ratchet extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ratchet:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run ratchet websocket';

    /** @var User $user */
    protected $user;
    /**
     * Create a new command instance.
     */
    public function __construct(User $user)
    {
        parent::__construct();
        $this->user = $user;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->output->writeln('Starting Ratchet Server');
        $server = IoServer::factory(
            new HttpServer(
                new WsServer(
                    new WebSocket()
                )
            ),8080
        );
        $server->loop->addPeriodicTimer(5, function() use($server){
            echo "Hola ".time();
        });
        $server->run();
    }
}
