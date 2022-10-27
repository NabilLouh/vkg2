<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use Stripe\PaymentIntent;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (Cart::count() <= 0) {
            return redirect()->route('home');
        }
        Stripe::setApiKey('sk_test_51LwRvyGm0FBUZE3XjpQljbBnFygZ9zovVYMTp9qidSYmgfSmWmnqeAZ71hnNt87i6rw3nkvrogcgoXFgoewpDQEV004vopMtT4');
        $intent = PaymentIntent::create([
            'amount' => round(floatval(Cart::total())),
            'currency' => 'eur',
            'metadata' => [
                'userId' => Auth::user()->id
            ]
        ]);

        $clientSecret = Arr::get($intent, 'client_secret');
        return view('checkout.index', [
            'clientSecret' => $clientSecret
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Cart::destroy();
        $data = $request->json()->all();

        return $data['paymentIntent'];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
