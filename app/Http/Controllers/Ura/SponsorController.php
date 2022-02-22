<?php

namespace App\Http\Controllers\Ura;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\Sponsor;
use Braintree\Gateway;
use Illuminate\Http\Request;

class SponsorController extends Controller
{
    public function sendPayment(Request $request)
    {
        $validatedData = $request->validate([
            'apartment_id' => 'numeric',
            'sponsor_id' => 'numeric',
            //'expires_on' => 'nullable|date',
        ]);
        //ddd($validatedData);

        $apartment = Apartment::find($request->apartment_id);
        $sponsor = Sponsor::find($request->sponsor_id);

        $apartment->sponsors()->attach($sponsor->id)->first();
        //ddd($apartment->sponsors()->attach($sponsor->id));

        $gateway = new Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey'),
        ]);

        $amount = $request->amount;
        $nonce = $request->payment_method_nonce;

        $result = $gateway->transaction()->sale([
            'amount' => $amount,
            'paymentMethodNonce' => $nonce,
            'customer' => [
                'firstName' => 'Admin',
                'lastName' => 'Admin',
                'email' => 'admin@admin.com',
            ],
            'options' => [
                'submitForSettlement' => true,
            ],
        ]);

        if ($result->success) {
            //ddd($result->transaction);
            $transaction = $result->transaction;

            return back()->with('success_message', 'Transaction successful. The ID is:' . $transaction->id);
        } else {
            $errorString = "";

            foreach ($result->errors->deepAll() as $error) {
                $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
            }

            return back()->withErrors('An error occurred with the message: ' . $result->message);
        }
        return redirect()->route('ura.apartments.index')->with(session()->flash('success', "Aparmtent sponsored succesfully"));

    }

}
