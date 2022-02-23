<?php

namespace App\Http\Controllers\Ura;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\Sponsor;
use Braintree\Gateway;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class SponsorController extends Controller
{
    public function sendPayment(Request $request)
    {
        $validatedData = $request->validate([
            'apartment_id' => 'numeric',
            'sponsor_id' => 'numeric',
        ]);
        //ddd($validatedData);

        $apartment = Apartment::find($request->apartment_id);
        $apartment_id = $apartment->id;
        $sponsor = Sponsor::find($request->sponsor_id);

        $now = Carbon::now('Europe/Rome');
        $expires_on = $now->addHours($sponsor->duration)->format('Y-m-d H:i:s');

        $apartment_sponsored = DB::table('apartment_sponsor')->where('apartment_id', '=', $request->apartment_id)->first();

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

        if ($apartment_sponsored === null) {
            if ($result->success) {
                //ddd($result->transaction);
                $transaction = $result->transaction;
                $sponsor->apartments()->attach([
                    $apartment_id => ['expires_on' => $expires_on],
                ]
                );

                return redirect()->route('ura.apartments.index')->with(session()->flash('success', 'Transaction successful. The ID is: ' . $transaction->id . " Apartment $apartment->title sponsored succesfully"));
            } else {
                $errorString = "";

                foreach ($result->errors->deepAll() as $error) {
                    $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
                }

                return back()->withErrors('An error occurred with the message: ' . $result->message);
            }

        } else if ($apartment_sponsored->apartment_id === $apartment_id) {
            $sponsor_end = Carbon::parse($apartment_sponsored->expires_on)->format('d/m/Y H:i');
            return redirect()->route('ura.apartments.index')->withErrors("Apartment $apartment->title risulta sponsorizzato fino a $sponsor_end");

        }

    }

}
