@extends('layouts.admin')



@section('content')

<h1 class="m-3">Creer un Produit</h1>

<ul>
    @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
    @endforeach
</ul>


<form action="" method="post" enctype="multipart/form-data">
    @csrf

    <div class="m-3">
        <label for="Name">Nom :</label>
        <input type="text"  name="Name" id="Name" value="{{ old('Name') }}">
    </div>

    <div class="m-3">
        <label for="Description">Description :</label>
        <input type="text"  name="Description" id="Description" value="{{ old('Description') }}">
    </div>

    <div class="m-3">
        <label for="Price">Prix :</label>
        <input type="number"  name="Price" id="Price" value="{{ old('Price') }}" min="99" max="3000">
    </div>



    <div class="m-3">
        <label for="cover">Cover : </label>
        <input type="file" name="cover" id="cover" value="{{ old('cover') }}">
    </div>


    <button class="m-3 bg-green-700 p-3">Ajouter</button>

</form>



@endsection