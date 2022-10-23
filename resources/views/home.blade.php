@extends('layouts.base')



@section('content')

<div class="flex justify-evenly"> 
    <a href="{{ route('products') }}">Nos Produit de réparation</a>
    <a href="{{ route('create') }}">Nos création</a>
    <a href="{{ route('devis') }}">Vos Création (devis)</a>
</div>

@endsection