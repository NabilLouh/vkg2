@extends('layouts.base')



@section('content')

<h1 class="m-3 mt-20 mb-10 flex justify-center">Creer un Devis</h1>

<ul>
    @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
    @endforeach
</ul>


<div class=" bg-white w-1/3 text-black m-auto border-4 border-orange-500 rounded-lg mb-10">

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
            <label for="fichier3d">Cover : </label>
            <input type="file" name="fichier3d" id="fichier3d" value="{{ old('fichier3d') }}">
        </div>
    
        
    
        <div>
            <label for="Type">Type : </label>
            <select name="Type" id="Type">
                <option value="Type 1">Type 1</option>
                <option value="Type 2">Type 2</option>
                <option value="Type 3">Type 3</option>
                <option value="Type 4">Type 4</option>
            </select>
        </div>
    
        <div>
            <label for="couleurfil">Type : </label>
            <select name="couleurfil" id="couleurfil">
                <option value="bleu">bleu</option>
                <option value="rouge">rouge</option>
                <option value="jaune">jaune</option>
                <option value="violet">violet</option>
            </select>
        </div>
    
    
        <div>
            <label for="couleurpeint">Type : </label>
            <select name="couleurpeint" id="couleurpeint">
                <option value="bleu">bleu</option>
                <option value="rouge">rouge</option>
                <option value="jaune">jaune</option>
                <option value="violet">violet</option>
            </select>
        </div>
    
    
        <button class="m-3 bg-green-700 p-3">Ajouter</button>
    
    </form>
    

</div>


@endsection