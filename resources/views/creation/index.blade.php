@extends('layouts.base')



@section('content')

<div class="flex w-4/5 m-auto flex-wrap justify-center">

    @foreach ($creations as $product)

        <div class="a bg-white min-h-64 w-1/4 mx-3 my-2">
            <div>
                <img src=" {{ $product->cover}} " alt="">
            </div>
            <div>
                <h1 class="m-3"><a href="{{ route('creations.show', $product) }}">{{$product->Name}} </a> </h1>
                <p class="flex justify-end m-3"> {{$product->Price / 100}} €</p>
            </div>
        </div>

    @endforeach

    
</div>


{{ $creations->links()}}

@endsection