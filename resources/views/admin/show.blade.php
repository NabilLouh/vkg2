@extends('layouts.admin')



@section('content')

    <div class="">
        <h1 class="mt-5 w-52 m-auto mb-5 font-bold text-xl ">Les Produits</h1>
        
        <a class="ml-10 bg-green-700 text-white p-5 rounded-3xl border-2 border-green-700 hover:bg-slate-300 hover:text-green-700" href="{{route('admin.create')}}">Creer un produit</a>
        
        



        <table class="mt-10 w-2/3 m-auto">
            <thead>
                <tr>
                    <th class="p-2">#</th>
                    <th class="p-2">Image</th>
                    <th class="p-2">Nom</th>
                    <th class="p-2">Prix</th>
                    <th class="p-2">Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($products as $creation)
                    <tr>
                        <th class="p-2 text-center">{{$creation->id}}</th>
                        <td class="p-2 text-center"><img width="80" src="{{$creation->cover}}" alt=""></td>
                        <td class="p-2 text-center">{{$creation->Name}}</td>
                        <td class="p-2 text-center">{{$creation->Price}}</td>
                        <td class="p-2 text-center">

                            <div class="my-5">
                                <a class=" bg-green-700 text-white p-2 px-4 rounded-3xl border-2 border-green-700 hover:bg-slate-300 hover:text-green-700" href="{{ route('admin.edit', $creation)}}">Modifier</a>
                            </div>
                            

                            <form action="{{ route('admin.destroy', $creation)}}" method="post">
                                @csrf
                                @method('delete')
                                <button class="bg-red-700 text-white p-2 rounded-3xl border-2 border-red-700 hover:bg-slate-300 hover:text-red-700">Supprimer</button>
                            </form>

                        </td>
                    </tr>


                @endforeach
            </tbody>


        </table>
   
    </div>
    



@endsection