<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use React\Socket\ConnectionInterface;

class StartServerCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'server:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Starting a new server';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        require 'vendor/autoload.php';

        $loop = \React\EventLoop\Factory::create();

        $server = new \React\Socket\Server('127.0.0.1:8000',$loop);
        $server->on('connection', function(ConnectionInterface $connection){
            echo $connection->getRemoteAddress();
            echo "\n";

            $connection->write("Zdravo");

           // $connection->on('data', function ($data) use ($connection){
             //   $connection->write($data);

            //});
        });
        $loop->run();

    }
}