@extends('layouts.ura')

@section('content')
    <div class="container">
        @if (session('success_message'))
            <div class="alert alert-success">
                {{ session('success_message') }}
            </div>
        @endif

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row">
            <div class="flex-center w-25 m-auto">
                <div class="content">
                    <form method="post" id="payment-form" action="{{ route('ura.checkout') }}">
                        @csrf
                        <div class="mb-3">
                            <div class="form-group">
                                <label hidden for="apartment_id">Appartamento</label>
                                <select hidden class="form-control" name="apartment_id" id="apartment_id">

                                    <option selected value="{{ $apartment->id }}">
                                        {{ $apartment->id }}
                                    </option>

                                    </option>
                                </select>
                                @error('apartment_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="sponsor_id">Sponsor Package</label>
                                <select class="form-select" name="sponsor_id" id="sponsor_id">
                                    <option value="">--Make a choice--</option>
                                    @foreach ($sponsors as $sponsor)
                                        <option value="{{ $sponsor->id }}" value="{{ $sponsor->price }}">
                                            {{ $sponsor->name }} - {{ $sponsor->duration }} ore -
                                            {{ $sponsor->price }} €
                                        </option>
                                    @endforeach
                                </select>
                                <p></p>
                            </div>
                        </div>

                        <section>
                            <label for="amount">
                                <span hidden class="input-label">Amount</span>
                                <div hidden id="container_input" class="input-wrapper amount-wrapper">


                                    <input id="amount" name="amount" type="tel" min="1" placeholder="Amount" value="">
                                </div>
                            </label>

                            <div class="bt-drop-in-wrapper">
                                <div id="bt-dropin"></div>
                            </div>
                        </section>

                        <input id="nonce" name="payment_method_nonce" type="hidden" />
                        <button class="btn btn-success pt-2" type="submit"><span>Buy package</span></button>
                    </form>
                </div>
            </div>
            <script src="https://js.braintreegateway.com/web/dropin/1.13.0/js/dropin.min.js"></script>
            <script>
                var form = document.querySelector('#payment-form');
                var client_token = "{{ $token }}";

                braintree.dropin.create({
                    authorization: client_token,
                    selector: '#bt-dropin',
                    paypal: {
                        flow: 'vault'
                    }
                }, function(createErr, instance) {
                    if (createErr) {
                        console.log('Create Error', createErr);
                        return;
                    }
                    form.addEventListener('submit', function(event) {
                        event.preventDefault();

                        instance.requestPaymentMethod(function(err, payload) {
                            if (err) {
                                console.log('Request Payment Method Error', err);
                                return;
                            }

                            // Add the nonce to the form and submit
                            document.querySelector('#nonce').value = payload.nonce;
                            form.submit();
                        });
                    });
                });
            </script>
            <script>
                const select = document.getElementById('sponsor_id');
                const amount_input = document.getElementById('amount');
                select.addEventListener('change', setValueInput);

                function setValueInput() {
                    const choice = select.value;
                    //console.log(choice);

                    if (choice === '1') {
                        amount_input.value = '2.99'

                    } else if (choice === '2') {
                        amount_input.value =
                            '5.99';
                    } else if (choice === '3') {
                        amount_input.value =
                            '9.99';
                    }
                }
            </script>

        @endsection
