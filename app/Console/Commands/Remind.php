<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Mail\RegisterMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Reservation;

class Remind extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'remind:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'remind send';

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
     * @return int
     */
    public function handle()
    {
        $today = date("Y-m-d");
        $reservations = Reservation::whereDate("visited_on",$today)->get();
        $message = $today;
        foreach($reservations as $reservation){
            $email = $reservation->user->email;
            $name = $reservation->user->name;
            $shop = $reservation->shop->name;
            $time = $reservation->visited_on;
            $message = $name . "様\n
                        予約のリマインドです。\n
                        店舗名:".$shop."\n
                        ご予約時間:".$time;
            Mail::send(new RegisterMail($email,$message,"【Rese】予約確認"));
        }

    }
}
