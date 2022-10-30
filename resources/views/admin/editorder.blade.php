@extends('layouts.admin')



@section('content')

<ul>
    @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
    @endforeach
</ul>


<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Produit commander</th>
            <th>Prix Total</th>
            <th>Client</th>
            <th>Date</th>
        </tr>
    </thead>


    <tbody>

        
            <tr>
                <th>{{ $order->id }}</th>
                <td>
                    <ul>
                        
                        @foreach (unserialize($order->products) as $product)
                            <li>- {{$product[0]}} ( {{ getPrice($product[1] )}} ) x {{ $product[2]}} </li>
                        @endforeach

                    </ul>
                </td>
                <td>{{ getPrice($order->amount)}}</td>
                <td> {{ $order->user->name }}</td>
                <td> {{ $order->payment_created_at}}</td>
                <td>
                    
                    <form action="" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')


                        <select name="is_shipped" id="is_shipped">
                            <option value="0">Non Expédié</option>
                            <option value="1">Expédié</option>
                        </select>

                        <button>Ajouter</button>
    
                    </form>
                    

                </td>
                
            </tr>
    </tbody>
</table>



@endsection