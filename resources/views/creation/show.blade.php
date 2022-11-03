@extends('layouts.base')



@section('content')


<div class="bg-white w-4/5 m-auto flex text-black rounded-lg">
    <div class="my-10 mx-4">
        <img src="{{$product->cover}}" alt="">
    </div>
    <div class="mt-10 mb-10 flex flex-col justify-between">
        <div>
            <h1 class="m-3 mb-10 font-bold text-lg">{{$product->Name}}</h1>
    
            <p class="m-3">{{$product->Description}}</p>
    
    
        </div>
        
        <div>
            <p class="flex items-end m-3"> {{$product->Price / 100}} €</p>
        </div>
        

        <div>
            <form action="{{ route('cart.store') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id}}">
               

                <button class="m-3" type="submit" class="btn btn-dark">Ajouter au panier</button>
            </form>
        </div>
    </div>
   

</div>



@endsection