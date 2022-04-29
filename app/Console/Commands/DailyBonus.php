<?php

namespace App\Console\Commands;

use App\Models\BonusWallet;
use App\Models\TokenWallet;
use App\Models\User;
use App\Models\PackageSettings;
use App\Models\Purchase;
use Carbon\Carbon;
use DateTime;
use Illuminate\Console\Command;
use function Sodium\add;
use Auth;

class DailyBonus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bonus:daily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Daily package bonus';

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
        //return Command::SUCCESS;


        $purchases= Purchase::all();

        //$daily_bonus= User::where('id',Auth::id())->first();
        //dd($daily_bonus->packages->price);
        //dd($sponsor_bonus['royality_bonus']);

        foreach ($purchases as $row) {

                $date1 = new DateTime($row['created_at']);
                $date2 = new DateTime(Carbon::now()->addDay(1));
                $days  = $date2->diff($date1)->format('%a');
                $package= PackageSettings::where('id',$row->package_id)->first();
                $sponsor_id= User::where('id',$row->user_id)->first();

                if ($days <= $package->duration){

                    $bonus= new BonusWallet();
                    $bonus->user_id= $row->user_id;

                    $bonus->amount= (($package->amount)*(($package->daily_buyer_token)/100)/2);
                    $bonus->method= 'Daily Bonus';
                    $bonus->type= 'Credit';
                    $bonus->description= (($package->amount)*(($package->daily_buyer_token)/100)/2). ' G1 Token ' . 'Daily Bonus for purchasing '. ' ' . $package->package_name;
                    $bonus->save();

                    $bonus= new TokenWallet();
                    $bonus->user_id= $row->user_id;

                    $bonus->amount= (($package->amount)*(($package->daily_buyer_token)/100)/2);
                    $bonus->method= 'Daily Bonus';
                    $bonus->type= 'Credit';
                    $bonus->description= (($package->amount)*(($package->daily_buyer_token)/100)/2). ' G1 Token ' . 'Daily Bonus for purchasing '. ' ' . $package->package_name;
                    $bonus->save();

                    $refer_bonus_amount= (($package->amount)*(($package->daily_buyer_token)/100)/2)*(($package->affilate_token)/100);
                    $sponsor_bonus= new BonusWallet();
                    $sponsor_bonus->user_id= $sponsor_id->sponsor;

                    $sponsor_bonus->amount= $refer_bonus_amount;
                    $sponsor_bonus->method= 'Daily Bonus';
                    $sponsor_bonus->type= 'Credit';
                    $sponsor_bonus->description= $refer_bonus_amount. ' G1 Token ' . 'Sponsor Bonus from '. ' ' . $sponsor_id->user_name;
                    $sponsor_bonus->save();

                    $bonus= new TokenWallet();
                    $bonus->user_id= $sponsor_id->sponsor;

                    $bonus->amount= $refer_bonus_amount;
                    $bonus->method= 'Daily Bonus';
                    $bonus->type= 'Credit';
                    $bonus->description= $refer_bonus_amount. ' G1 Token ' . 'Sponsor Bonus from package purchased by '. ' ' . $sponsor_id->user_name;
                    $bonus->save();



        }

        $this->info('Successfully added daily bonus.');

      //  $use=((($user['packages']['return_percentage']*$user['packages']['price'])/100)*$sponsor_bonus['royality_bonus']/100)*$income[$i]/100;
    }
  }

}
