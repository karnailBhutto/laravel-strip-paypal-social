<?php

namespace App\Http\Controllers;
  
use App\Models\Payment;
use Illuminate\Http\Request;
use Auth;
use Session;

use Stripe;

   

class StripePaymentController extends Controller

{

    /**

     * success response method.

     *

     * @return \Illuminate\Http\Response

     */

    public function stripe()

    {

        return view('home');

    }

  

    /**

     * success response method.

     *

     * @return \Illuminate\Http\Response

     */

    public function stripePost(Request $request)

    {

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

       $stripePayment =  Stripe\Charge::create ([

                "amount" => $request->amount,

                "currency" => "inr",

                "source" => $request->stripeToken,

                "description" => "Test payment from itsolutionstuff.com." 

        ]);


   $dataArray = array(
        "user_id"     =>   Auth::user()->id,
         "tran_id"     =>   $stripePayment->id,
        "first_name"     =>   $request->first_name,
        "last_name"     =>   $request->last_name,
        "address"     =>   $request->address,
        "city"     =>   $request->city,
        "state"     =>   $request->state,
        "zip_code"     =>   $request->zip_code,
        "email"     =>   $request->email,
        "amount"     =>   $request->amount,
        "currency"     =>   $request->currency,
         "country"     =>   $request->country,
        "reason"     =>   $request->reason,
        "card_no"     =>   $request->card_no,
        "exp_month"     =>   $request->exp_month,
        "exp_year"     =>   $request->exp_year,
        "cvv"     =>   $request->cvv,
        "status"     =>  1,
        );


       Payment::create($dataArray);
        Session::flash('success', 'Payment successful!');         

        return back();

    }

}