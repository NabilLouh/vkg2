@extends('layouts.base')



@section('content')


<div class="bg-white w-4/5 m-auto flex text-black rounded-lg mt-20 mb-10">
    <div >
        <img class="m-6 " src="{{$product->cover}}" alt="">
    </div>
    <div class="flex flex-col justify-between">
        <div>
            <h1 class="ml-12 mt-6 font-bold text-lg">{{$product->Name}}</h1>
    
            <p class="ml-12 mt-4">{{$product->Description}}</p>
    
    
        </div>
        
        <div>
            <p class="flex items-end ml-12 font-bold text-lg"> {{$product->Price / 100}} €</p>
        </div>
        

        <div>
            <form action="{{ route('cart.store') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id}}">
               

                <button class="ml-12 mb-6 bg-sky-500/75 rounded-3xl px-4 py-2 hover:text-white hover:bg-blue-700" type="submit" class="btn btn-dark">Ajouter au panier</button>
            </form>
        </div>
    </div>
   

</div>



@endsection