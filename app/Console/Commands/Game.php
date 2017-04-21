<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Service\Game as ServiceGame;

class Game extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'game:play';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'test play game';

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
        $aGame = new ServiceGame();

        $aGame->add("Chet");
        $aGame->add("Pat");
        $aGame->add("Sue");


        do {

            $aGame->roll(rand(0,5) + 1);

            if (rand(0,9) == 7) {
                $notAWinner = $aGame->wrongAnswer();
            } else {
                $notAWinner = $aGame->wasCorrectlyAnswered();
            }



        } while ($notAWinner);
    }
}
