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
    public function __construct()
    {
        /** PayPal api context **/
        $settings  = config('services.payPal.settings');
        $clientId = config('services.payPal.clientId');
        $secret    = config('services.payPal.secret');

        $apiContext = $this->api_context = new ApiContext(new OAuthTokenCredential($clientId, $secret));
        $apiContext->setConfig($settings);
        //dd($settings);
    }
    public function payWithpaypal(Request $request)
    {
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');


        $item = new Item();
        $item->setName($request->get('item_name')) /** item name **/
            ->setCurrency('EUR')
            ->setQuantity($request->get('item_qty'))
            ->setPrice($request->get('item_amount')); /** unit price **/

        //dd($item);

        $item_list = new ItemList();
        $item_list->setItems(array($item));

        $amount = new Amount();
        $amount->setCurrency('EUR')
            ->setTotal($request->get('item_amount'));

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('description');
        //dd($transaction);

        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::to('status')) /** Specify return URL **/
        ->setCancelUrl(URL::to('status'));
        //dd($redirect_urls);

        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));

        //dd($this->api_context);

        try {
            $payment->create($this->api_context);
        } catch (\PayPal\Exception\PPConnectionException $ex) {

            if (\Config::get('app.debug')) {

                \Session::put('error', 'Connection timeout');
                return Redirect::to('/');

            } else {

                \Session::put('error', 'Some error occur, sorry for inconvenient');
                return Redirect::to('/');

            }

        }

        foreach ($payment->getLinks() as $link) {

            if ($link->getRel() == 'approval_url') {

                $redirect_url = $link->getHref();
                break;

            }

        }

        /** add payment ID to session **/
        Session::put('paypal_payment_id', $payment->getId());

        if (isset($redirect_url)) {

            /** redirect to paypal **/
            return Redirect::away($redirect_url);

        }

        \Session::put('error', 'Unknown error occurred');
        return Redirect::to('/');

    }

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
