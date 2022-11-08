@extends('layouts.base')


@section('content')






<div>
    <h1>Commande : {{$lastorder[0]->id}}</h1>


    <h2>Les produits achetés</h2>

    @foreach (unserialize($lastorder[0]->products) as $product)
        <p> - {{$product[0]}} ( {{ getPrice($product[1] )}} ) x {{ $product[2]}} </p>
    @endforeach


    <p>Prix total : {{ getPrice($lastorder[0]->amount)}}</p>
</div>

@endsection