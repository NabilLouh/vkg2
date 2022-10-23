@extends('layouts.user')

@section('content')


<h1>Mes Informations</h1>




<ul>
    @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
    @endforeach
</ul>




<form action="" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')


    <div>
        <label for="name">Nom :</label>
        <input type="text"  name="name" id="name" value="{{ old('name', Auth::user()->name) }}">
    </div>


    <div>
        <label for="email">email :</label>
        <input type="text"  name="email" id="email" value="{{ old('email', Auth::user()->email) }}">
    </div>


    <div>
        <label for="password">mot de passe :</label>
        <input type="text"  name="password" id="password" >
    </div>

    <button>Modifier</button>
    
</form>

@endsection