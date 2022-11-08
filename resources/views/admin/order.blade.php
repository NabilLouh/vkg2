
@extends('layouts.admin')



@section('content')

<div>

    <h1>Les commandes</h1>


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

            @foreach ($orders as $order)
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
                        @if ($order->is_shipped)
                            Expédié
                        @else
                            Non Expédié
                        @endif
                    </td>
                    <td><a href="{{ route('admin.orderedit', $order) }}">Modifier</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>




@endsection