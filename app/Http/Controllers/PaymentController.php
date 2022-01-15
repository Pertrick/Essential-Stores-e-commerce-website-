<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Collection;
use function MongoDB\BSON\toJSON;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $data = $request->session()->get('cart');
        if($data) {
            return view('user.payment.index');

        }else{
            return redirect()->back();
        }




    }

    public function verify($refernce)
    {
        $secret = "sk_test_e15e08e02cd7d5d4c098f1855f3aa89cf604c10c";
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/transaction/verify/$refernce",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer $secret",
                "Cache-Control: no-cache",
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

      /*  if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }*/

        $data = json_decode($response,true);
        return [$data];
    }

    public function successfulPayment(Request $request)
    {
       /* $payment = new Payment();
        $payment->amount = $request->amount;
        $payment->transaction_id
       */
        session()->forget('cart');
        return redirect('/home')->with('success', 'Thank you for your Patronage! your orders have be placed and confirmed.');

    }
}
