@extends('layouts.admin')



@section('content')

    <div class="">
        <h1>Les Créations</h1>

        <a href="{{route('admin.creationcreate')}}">Creer une Creation</a>



        <table class="table-auto">
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
                @foreach ($creations as $creation)
                    <tr>
                        <th class="p-2">{{$creation->id}}</th>
                        <td class="p-2"><img width="80" src="{{$creation->cover}}" alt=""></td>
                        <td class="p-2">{{$creation->Name}}</td>
                        <td class="p-2">{{$creation->Price}}</td>
                        <td class="p-2">
                            <a href="{{ route('admin.creationedit', $creation)}}">Modifier</a>

                            <form action="{{ route('admin.creationdestroy', $creation)}}" method="post">
                                @csrf
                                @method('delete')
                                <button class="">Supprimer</button>
                            </form>

                        </td>
                    </tr>


                @endforeach
            </tbody>


        </table>
   
    </div>
    



@endsection