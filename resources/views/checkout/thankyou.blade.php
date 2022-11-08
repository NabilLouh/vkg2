@extends('layouts.base')


@section('content')


    <div class="w-1/3 m-auto bg-white text-black">

        <h1>Vous pouvez retrouver votre facture ici : </h1>

        <a href="{{ route('checkout.lastorder')}}">DERNIERE COMMANDE</a>

    </div>
    
@endsection


