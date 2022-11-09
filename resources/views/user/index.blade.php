@extends('layouts.user')

@section('content')


<h1 class="mt-5 w-52 m-auto mb-5 font-bold text-xl">Mes Informations</h1>




<ul>
    @foreach ($errors->all() as $error)
        <li class="bg-red-700 mt-10 mb-10 w-1/4 mx-auto flex justify-center rounded-lg" >{{$error}}</li>
    @endforeach
</ul>



<div class="ml-10">

    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
    
    
        <div class="mb-3">
            <label class="mr-14" for="name">Nom :</label>
            <input  type="text"  name="name" id="name" value="{{ old('name', Auth::user()->name) }}">
        </div>
    
    
        <div class="mb-3">
            <label class="mr-14" for="email">email :</label>
            <input type="text"  name="email" id="email" value="{{ old('email', Auth::user()->email) }}">
        </div>
    
    
        <div class="mb-3">
            <label for="password">mot de passe :</label>
            <input type="text"  name="password" id="password" >
        </div>
    
        <button class="mt-5 bg-blue-500 border-2 border-blue-500 p-3 rounded-lg text-white hover:bg-slate-300 hover:text-blue-500" >Modifier</button>
        
    </form>
</div>


@endsection