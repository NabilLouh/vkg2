@extends('layouts.base')



@section('content')


<div class="bg-white w-4/5 m-auto flex">
    <div>
        <img src="{{$product->cover}}" alt="">
    </div>
    <div class="flex flex-col justify-between">
        <div>
            <h1 class="m-3">{{$product->Name}}</h1>
    
            <p class="m-6">{{$product->Description}}</p>
    
    
        </div>
        
        <div>
            <p class="flex items-end m-3"> {{$product->Price / 100}} €</p>
        </div>
        
    </div>
   

</div>



@endsection