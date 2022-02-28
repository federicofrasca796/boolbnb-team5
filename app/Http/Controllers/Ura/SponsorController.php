<?php

namespace App\Http\Controllers\Ura;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\Sponsor;
use Braintree\Gateway;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SponsorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $apartment_sponsored = Apartment::with('sponsors')->where('user_id', Auth::user()->id)->get();
       
        //ddd($apt);

        

        /* $sponsorships = Sponsor::where('user_id', Auth::User()->id)->paginate(5); */
        return view('ura.sponsors.index', compact('apartment_sponsored'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sponsor  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function show(Sponsor $sponsor)
    {
        //
    }

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

        $admin = Auth::user();
        //ddd($admin);

        $now = Carbon::now('Europe/Rome');
        $expires_on = $now->addHours($sponsor->duration)->format('Y-m-d H:i:s');

        $apartment_sponsored = DB::table('apartment_sponsor')->where([
            ['apartment_id', '=', $request->apartment_id],
            ['expires_on', '>=', Carbon::now('Europe/Rome')],
        ])->first();
        //ddd($apartment_sponsored);

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
                'firstName' => $admin->name,
                'lastName' => $admin->surname,
                'email' => $admin->email,
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

                return redirect()->route('ura.apartments.index')->with(session()->flash('success', 'Transaction successful. The ID is: ' . $transaction->id . '.' . " Apartment '$apartment->title' sponsored succesfully"));
            } else {
                $errorString = "";

                foreach ($result->errors->deepAll() as $error) {
                    $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
                }

                return back()->withErrors('An error occurred with the message: ' . $result->message);
            }

        } else if ($apartment_sponsored->apartment_id === $apartment_id) {
            $sponsor_end = Carbon::parse($apartment_sponsored->expires_on)->format('d/m/Y H:i');
            return redirect()->route('ura.apartments.index')->withErrors("Apartment '$apartment->title' is sponsored until  $sponsor_end");

        }

    }

}
