<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('cart.index');
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
        
      

        $duplicata = Cart::search(function ($cartItem, $rowId) use ($request){
            
            return $cartItem->id == $request->product_id;
        });
       
        if ($duplicata->isNotEmpty()) {
            return redirect()->route('products')->with('success', 'Le produit a deja été ajouté.');
        }

        $product = Product::find($request->product_id);

        Cart::add($product->id, $product->Name, 1, $product->Price)
            ->associate('App\Product');

        return redirect()->route('products')->with('success', 'Le produit a bien été ajouté.');
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
    public function update(Request $request, $rowId)
    {
        $data = $request->json()->all();

        $validator = Validator::make($request->all(), [
            'qty' => 'required|numeric|between:1,100'
        ]);

        if($validator->fails()) {
            Session::flash('danger', 'La quantité du produit est erroné.');

            return response()->json(['success' => 'Cart Quantity Has Not Been Updated']);
        }

        Cart::update($rowId, $data['qty']);

        Session::flash('success', 'La quantité du produit est passé à '. $data['qty']);

        return response()->json(['success' => 'Cart Quantity Has Been Updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($rowid)
    {
        Cart::remove($rowid);

        return back()->with('success', 'Le produit a été supprimé');
    }
}
