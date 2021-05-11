<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use Srmklive\PayPal\Services\ExpressCheckout;

use Cart;

class PayPalPaymentController extends Controller
{

    public function handlePayment()
        {
        // return $items = Cart::session(Auth::user()->id)->getContent();
            $product['items'] = array();
           
            foreach (\Cart::session(Auth::user()->id)->getContent() as $item) {
     
                    $product['items'][]= [
                        
                            'id' => $item->id,
                            'name' => $item->tile,
                            'price' => $item->price,
                            // 'desc'  => 'Running shoes for Men',
                            'quantity' => $item->quantity,
                    ];
                       
            }
           
      
            $product['invoice_id'] = mt_rand(1000, 10000).time().uniqid();
            $product['invoice_description'] = "Order #{$product['invoice_id']} Bill";
            $product['return_url'] = route('success.payment');
            $product['cancel_url'] = route('cancel.payment');
            $product['total'] = \Cart::getTotal();
    
            $provider = new ExpressCheckout;
      
            $response = $provider->setExpressCheckout($product);
      
            $response = $provider->setExpressCheckout($product, true);

            return $response;

            return redirect($response['paypal_link']);
        }
       
        public function paymentCancel()
        {
            dd('Your payment has been declend. The payment cancelation page goes here!');
        }
      
        public function paymentSuccess(Request $request)
        {
            $paypalModule = new ExpressCheckout;
            $response = $paypalModule->getExpressCheckoutDetails($request->token);
      
            if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
                dd('Payment was successfull. The payment success page goes here!');
            }
      
            dd('Error occured!');
        }
    

}
