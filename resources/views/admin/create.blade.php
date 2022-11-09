@extends('layouts.admin')



@section('content')

<h1 class="mt-5 w-52 m-auto mb-5 font-bold text-xl ">Creer un Produit</h1>

<ul class="bg-red-500 w-2/3 m-auto rounded-lg">
    @foreach ($errors->all() as $error)
        <li class="pt-2 pl-2">{{$error}}</li>
    @endforeach
</ul>


<form class="ml-5" action="" method="post" enctype="multipart/form-data">
    @csrf

    <div class="m-3">
        <label class="mr-11" for="Name">Nom :</label>
        <input type="text"  name="Name" id="Name" value="{{ old('Name') }}">
    </div>

    <div class="m-3">
        <label class="mr" for="Description">Description :</label>
        <input type="text"  name="Description" id="Description" value="{{ old('Description') }}">
    </div>

    <div class="m-3">
        <label class="mr-14" for="Price">Prix :</label>
        <input type="number"  name="Price" id="Price" value="{{ old('Price') }}" min="99" max="3000">
    </div>



    <div class="m-3">
        <label class="mr-10" for="cover">Cover : </label>
        <input type="file" name="cover" id="cover" value="{{ old('cover') }}">
    </div>

    <div>
        <label class="mr-14" for="is_creation">Type : </label>
        <select name="is_creation" id="is_creation">
            <option value="0">Produit</option>
            <option value="1">Creation</option>
        </select>
    </div>


    <button class="rounded-lg m-3 bg-green-700 p-3 border-2 border-green-700 hover:bg-slate-300">Ajouter</button>

</form>



@endsection