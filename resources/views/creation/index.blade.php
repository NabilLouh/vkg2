@extends('layouts.base')



@section('content')


<div class="mb-10 mt-20 flex justify-center font-bold text-2xl">Création</div>
<div class="flex w-4/5 m-auto flex-wrap justify-center">

    @foreach ($creations as $product)

        <div class="carte bg-white min-h-64 w-1/4 mx-3 my-2 text-black rounded-lg hover:scale-110">
            <div>
                <img class="rounded-t-lg" src=" {{ $product->cover}} " alt="">
            </div>
            <div>
                <h1 class="nomproduit m-3"><a href="{{ route('creations.show', $product) }}">{{$product->Name}} </a> </h1>
                <p class="flex justify-end m-3"> {{$product->Price / 100}} €</p>
            </div>
        </div>

    @endforeach

    
</div>


{{ $creations->links()}}

@endsection


@section('extra-style')
<style>
    .carte:hover .nomproduit {
        color:blue
    }


</style>

@endsection