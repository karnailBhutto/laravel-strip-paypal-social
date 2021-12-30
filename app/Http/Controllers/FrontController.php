<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Coinremitter\Coinremitter;


class FrontController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $btc_wallet = new Coinremitter('BTC');

        $balance = $btc_wallet->get_balance();

        $address = $btc_wallet->get_new_address();

        $param = [
    'to_address'=>'36Dmo7fCpSbPgwYoVJPiwf6bLrZmt1G54D',
    'amount'=>1
];
$withdraw = $btc_wallet->withdraw($param);


$rate = $btc_wallet->get_coin_rate();


$param = [
    'address' => '36Dmo7fCpSbPgwYoVJPiwf6bLrZmt1G54D',
];
$invoice = $btc_wallet->get_transaction_by_address($param);

echo "<pre>";
        print_r($address);
        die;


        return view('home',compact(''));
    }

       public function form()
    {
        return view('form');
    }
   public function test()
    {
        return view('test');
    }

}
