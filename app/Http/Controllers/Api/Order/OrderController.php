<?php

namespace App\Http\Controllers\Api\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Braintree\Gateway;

class OrderController extends Controller
{
    public function generate(Request $request,Gateway $gateway){
        $token = $gateway->clientToken()->generate();
        $data = [
            'success' => true,
            'token' => $token
        ];
        return response()->json($data,200);
    }

    public function makePayment(Request $request, Gateway $gateway){
        $request = $request->validate([
            'token' => 'required',
            'amount' => 'required'
        ]);

        $result = $gateway->transaction()->sale([
            'amount' => $request['amount'],
            'paymentMethodNonce' => $request['token'],
            'options' => [
                'submitForSettlement' => true
            ]
        ]);
        
        if($result->success){
            $date = date('Y/m/d');
            $data = [
                'success' => true,
                'message' => 'Transaction Success',
                'amount' => $request['amount'],
                'date' => $date
            ];

            return response()->json($data,200);
            
        }
        else{
            $data = [
                'success' => false,
                'message' => 'Transaction Failed'
            ];

            return response()->json($data,401);
        }
        return 'makePayment';
    }
}
