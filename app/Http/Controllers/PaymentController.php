<?php
namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use PayPal\Api\Amount;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use Illuminate\Support\Facades\Redirect;
use Session;
use URL;

class PaymentController extends Controller
{
    private $api_context;
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function getPaymentStatus(Request $request)
    {
        /** Get the payment ID before session clear **/
        $payment_id = Session::get('paypal_payment_id');

        /** clear the session payment ID **/
        Session::forget('paypal_payment_id');
        //if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {
        if(empty($request->input('PayerID')) || empty($request->input('token')))
        {
            \Session::put('error', 'Payment failed');
            return Redirect::to('/finishOrder');

        }

        $payment = Payment::get($payment_id, $this->api_context);
        $execution = new PaymentExecution();
        $execution->setPayerId($request->input('PayerID'));

        /**Execute the payment **/
        $result = $payment->execute($execution, $this->api_context);

        if ($result->getState() == 'approved') {

            \Session::put('success', 'Payment success');
            return Redirect::to('/finishOrder');

        }

        \Session::put('error', 'Payment failed');
        return Redirect::to('/finishOrder');

    }

}
