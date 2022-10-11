<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class EsewaController extends Controller
{
    public function paymentEsewa(Request $request, $orderId){

        $order = Order::where('id', $orderId)->first();

        $totalPrice = $order->total_price;
        $transactionRefID = $order->tracking_no;
        
        $data = [
            'paymentUrl' => 'https://uat.esewa.com.np/epay/main',
            'totalPrice' => $totalPrice,
            'transactionRefID' => $transactionRefID,
            'productCode' => 'epay_payment',
            'successUrl' => route('esewa.success', $order->id),
            'failureUrl' => route('esewa.fail', $order->id),
        ];

        return view('Frontend.Payments.esewa', $data);
    }

    public function SuccessEsewa(Request $request, $orderID)
    {
        if(isset($request->pid) && isset($request->amt) && isset($request->refId))
        {
            $order = Order::where('id', $orderID)->first();
            if($order)
            {
                $url = "https://uat.esewa.com.np/epay/transrec";

                $data =[
                    'amt'=> $totalPrice,
                    'rid'=> $refId,
                    'pid'=>$oid,
                    'scd'=> 'epay_payment',
                ];
                $curl = curl_init($url);
                curl_setopt($curl, CURLOPT_POST, true);
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); 
                $response = curl_exec($curl);
                curl_close($curl);

                $response_code = $this->get_xml_node_value('response_code', $response);
                if( $response_code == 'success')
                {
                    $order-> status==1;
                    $order->save();

                }

            }


        }
        return redirect('/home')->with('success_message', "Transaction Completed");

   


    }

    public function FailEsewa(Request $request, $orderID)
    {  
        
        
        return redirect()->route()->with('error_message', "Transaction Failed");  
        
    }
    public function get_xml_node_value($node, $xml) 
    {
        if ($xml ==false){
            return false;
        }
        $found = preg_match('#<'.$node.'(?:\s+[^>]+)?>(.*?)'.'</'.$node.'>#s',$xml, $matches);
        if(found !=false){
            return $matches[1];
        }
        return false;

    }
}
