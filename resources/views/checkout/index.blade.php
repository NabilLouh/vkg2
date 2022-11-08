@extends('layouts.base')

@section('extra-meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('extra-script')
    <script src="https://js.stripe.com/v3/"></script>
@endsection



@section('content')

    <h1 class="my-20 mx-auto font-bold text-2xl">Page de Paiement</h1>


    <div class="w-2/4 bg-white m-auto p-5 rounded-lg mb-10">

        <div class="text-blue-800 font-bold text-2xl mb-5">
            Votre Carte
        </div>
        
        <form action=" {{ route('checkout.store') }}" method="POST" id="payment-form" classe="my-4">
            @csrf

            
            <div id="card-element" class="text-black border-2 border-black">
                
            <!-- Elements will create input elements here -->
            </div>

            <!-- We'll put the error messages in this element -->
            <div class="text-red" id="card-errors" role="alert"></div>

            <button id="submit" class="text-white bg-blue-800 rounded-lg p-3 mt-3 border-2 border-blue-800 hover:bg-white hover:text-blue-800">Procéder au paiement ( {{ getPrice(Cart::total()) }} ) </button>

        </form>

        
    
    </div>
@endsection


@section('extra-js')
<script>
    var stripe = Stripe('pk_test_51LwRvyGm0FBUZE3XVaFpCUw4qW0f30Bx9crb8xtMbBN0MyX4hwJTUkQ7LFGM4mB8ecfvW7EojbpQP7R2XwlrxboY00LScYD4Pl');
    var elements = stripe.elements();
    var style = {
        base: {
        color: "#32325d",
        fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
        fontSmoothing: "antialiased",
        fontSize: "16px",
        "::placeholder": {
            color: "#aab7c4"
        }
        },
        invalid: {
        color: "#fa755a",
        iconColor: "#fa755a"
        }
    };
    var card = elements.create("card", { style: style });
    card.mount("#card-element");

    card.addEventListener('change', ({error}) => {
    const displayError = document.getElementById('card-errors');
        if (error) {
            displayError.classList.add('alert', 'alert-warning', 'mt-3');
            displayError.textContent = error.message;
        } else {
            displayError.classList.remove('alert', 'alert-warning', 'mt-3');
            displayError.textContent = '';
        }
    });
    var submitButton = document.getElementById('submit');

    submitButton.addEventListener('click', function(ev) {
    ev.preventDefault();
    submitButton.disabled = true;

    stripe.confirmCardPayment("{{ $clientSecret }}", {
        payment_method: {
            card: card
        }
        }).then(function(result) {
            if (result.error) {
            // Show error to your customer (e.g., insufficient funds)
            submitButton.disabled = false;
            console.log(result.error.message);
            } else {
                // The payment has been processed!
                if (result.paymentIntent.status === 'succeeded') {
                    var paymentIntent = result.paymentIntent;
                    var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                    var form = document.getElementById('payment-form');
                   
                    var url = form.action;
                    
                    var redirect = '/merci';

                    fetch(
                        url,
                        {
                            headers: {
                                "Content-Type": "application/json",
                                "Accept": "application/json, text-plain, */*",
                                "X-Requested-With": "XMLHttpRequest",
                                "X-CSRF-TOKEN": token
                            },
                            method: 'post',
                            body: JSON.stringify({
                                paymentIntent: paymentIntent
                            })
                        }).then((data) => {
                        console.log(data)
                        window.location.href = redirect;
                    }).catch((error) => {
                        console.log(error)
                    })
                    
                }
            }
        });
    });
</script>
   
@endsection