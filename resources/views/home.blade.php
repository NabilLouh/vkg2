@extends('layouts.base')



@section('content')

<div class="flex"> 
    <div class="w-1/3 hover:w-1/2 h-96 flex justify-center bg-center relative" style="background-image: url('/storage/public/logo/background1.jpg')">
        <a class="absolute top-1/2 z-10" href="{{ route('products') }}">Nos Produit de réparation</a>
        <div class="bg-black w-full opacity-50 hover:opacity-20"></div>
    </div>
    <div class="w-1/3 hover:w-1/2 h-96 flex justify-center bg-right relative" style="background-image: url('/storage/public/logo/background2.jpg')">
        <a class="absolute top-1/2 z-10" href="{{ route('create') }}">Nos création</a>
        <div class="bg-black w-full opacity-50 hover:opacity-20"></div>
    </div>
    <div class="w-1/3 hover:w-1/2 h-96 flex justify-center bg-center relative" style="background-image: url('/storage/public/logo/background3.jpg')">
        <a class="absolute top-1/2 z-10" href="{{ route('devis') }}">Vos Création (devis)</a>
        <div class="bg-black w-full opacity-50 hover:opacity-20"></div>
    </div>
    
    
    
</div>

@endsection