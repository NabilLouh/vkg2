<?php

namespace App\Http\Controllers;

use App\Models\Order;
use DateTime;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
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
            'amount' => round((Cart::total())),
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
       
       
        $data = $request->json()->all();
        dump($data);
       
        $order = new Order();

        
        $order->payment_intent_id = $data['paymentIntent']['id'];
       $order->amount = $data['paymentIntent']['amount'];

        $order->payment_created_at = (new DateTime())->setTimestamp($data['paymentIntent']['created'])->format('Y-m-d H:i:s');

        $products = [];
        $i = 0;

        foreach(Cart::content() as $product) {
            $products['product_' . $i][] = $product->model->Name;
            $products['product_' . $i][] = $product->model->Price;
            $products['product_' . $i][] = $product->qty;
            $i++;
        }
        
        $order->products = serialize($products);
        $order->user_id = Auth::user()->id;
        $order->save();
       
       // Order::create(collect($order)->all());




        
       
        if ($data['paymentIntent']['status'] == 'succeeded') {
            Cart::destroy();
            Session::flash('success', 'Votre commande a été traitée avec succès.');
           // return $data['paymentIntent'];
            return response()->json(['success' => 'Payment Intent Succeeded']);
        } else {
            //return $data['paymentIntent'];
            return response()->json(['error' => 'Payment Intent Not Succeeded']);
            
            
        }
    }


    public function thankYou()
    {
        return Session::has('success') ? view('checkout.thankYou') : redirect()->route('home');
        
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
