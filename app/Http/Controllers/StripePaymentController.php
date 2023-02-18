<?php
    
namespace App\Http\Controllers;
     
use Illuminate\Http\Request;
use Session;
use Stripe;
use Mail;

use App\Models\PaymentPlans;
use App\Models\PaymentHistory;

class StripePaymentController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    
    
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function paymentPost(Request $request)
    {

//         Name: Test

// Number: 4242 4242 4242 4242

// CSV: 123

// Expiration Month: 12

// Expiration Year: 2028

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        Stripe\Charge::create ([
                "amount" => $request->input('paymentAmount') * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Payment for ".$request->input('paymentTitle')." from ".$request->input('name')." with Email ".$request->input('email')
                
        ]);
      
        Session::flash('success', 'Payment successful! Check your email for confirmation');
      
        PaymentHistory::create([
            'name' => $request->input('name'),
            'contact' => $request->input('contact'),
            'email' => $request->input('email'),
            'payment_plans_id' => $request->input('paymentId')
        ]);

        // Mail::send('mail', [
        //      ],
        //         function ($message,) {
        //             $message->from('ticfco.infinity@gmail.com');
        //             $message->to('abdulrauf5097911@gmail.com', 'Your Name')
        //             ->subject('sd');
                    
        //         });
        
        
        return back();
    }
}