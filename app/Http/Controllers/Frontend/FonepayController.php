<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

 class FonepayController extends Controller
{
    public function PaymentFonepay(Request $request)
    {
      if (isset($request->orderId)){
        
        $order = Order::where('id',$request->orderId)->first();
        $totalPrice = $order->total_price;
        $transactionRefID = $order->tracking_no;
        // dd($totalPrice);
        //  dd($transactionRefID);
        
       

        $fonepay=[];
        $fonepay['RU']= route('fonepay.return');
        $fonepay['PID']='NBQM';
        $fonepay['PRN']=$transactionRefID;
        $fonepay['AMT']=  $totalPrice ;
        $fonepay['CRN']='NPR';
        $fonepay['DT']=date('m/d/y');
        $fonepay['R1']='test';
        $fonepay['R2']='test';
        $fonepay['MD']='P';
    

        $data = $fonepay['PID'] .','.
        $fonepay['MD'] .','.
        $fonepay['PRN'] .','.
        $fonepay['AMT'] .','.
        $fonepay['CRN'] .','.
        $fonepay['DT'] .','.
        $fonepay['R1'] .','.
        $fonepay['R2'] .','.
        $fonepay['RU'] ;
        

        $fonepay['DV'] = hash_hmac('sha512', $data,'a7e3512f5032480a83137793cb2021dc');
        

        

        return view('Frontend.Payments.fonepay', compact ('fonepay'));
      }
       
    }

    public function FonepayReturn(Request $request)
    {
      // dump($request);
      if( isset($request->PRN) && isset($request->PID) && isset($request->P_AMT) && isset($request->UID)){
        $order = Order::where('tracking_no',$request->PRN)->first();
        $data = 'NBQM'.',';
        $data .= $order->total_price .',';
        $data .= $order->tracking_no .',';
        $data .= $request->UID .',';
      
      

        $DV = hash_hmac('sha512', $data, 'a7e3512f5032480a83137793cb2021dc');

        $PRN = $request['PRN'];
        $PID = $request['PID'];
        $P_AMT = $request['P_AMT'];
        $UID = $request['UID'];
       

        $queryString = "PRN=$PRN&PID=$PID&P_AMT=$P_AMT&UID=$UID&DV=$DV";
        

        $url = 'https://dev-clientapi.fonepay.com/api/merchantRequest/verificationMerchant?'. $queryString;
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $content = curl_exec($ch);
        // dump($content);
        $response = simplexml_load_string($content);
        dump($response);
       
        
       

     


      }

    }
  
}