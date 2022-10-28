@extends('layouts.admin')



@section('content')

<h1 class="m-3">Modifier {{$product->Name}}</h1>

<ul>
    @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
    @endforeach
</ul>


<form action="" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')


    <div>
        <label for="Name">Nom :</label>
        <input type="text"  name="Name" id="Name" value="{{ old('Name', $product->Name) }}">
    </div>

    <div>
        <label for="Description">Description :</label>
        <input type="text"  name="Description" id="Description" value="{{ old('Description', $product->Description) }}">
    </div>

    <div>
        <label for="Price">Prix :</label>
        <input type="number"  name="Price" id="Price" value="{{ old('Price', $product->Price) }}" min="99" max="3000">
    </div>


    <div>
        <label for="cover">Cover : </label>
        <input type="file" name="cover" id="cover" value="{{ old('cover'), $product->cover }}">
    </div>


    <div>
        <label for="is_creation">Type : </label>
        <select name="is_creation" id="is_creation">
            <option value="0">Produit</option>
            <option value="1">Creation</option>
        </select>
    </div>


    <button>Ajouter</button>
    
</form>


@endsection