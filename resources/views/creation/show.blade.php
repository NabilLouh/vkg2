@extends('layouts.base')



@section('content')


<div class="bg-white w-4/5 m-auto flex">
    <div>
        <img src="{{$creation->cover}}" alt="">
    </div>
    <div class="flex flex-col justify-between">
        <div>
            <h1 class="m-3">{{$creation->Name}}</h1>
    
            <p class="m-6">{{$creation->Description}}</p>
    
    
        </div>
        
        <div>
            <p class="flex items-end m-3"> {{$creation->Price / 100}} €</p>
        </div>
        
    </div>
   

</div>



@endsection