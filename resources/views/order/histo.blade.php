@extends('layouts.user')



@section('content')

<div>

    <h1>Historique des commandes</h1>


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


        <tbody class="flex">

            @foreach ($orders as $order)
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
            @endforeach
        </tbody>
    </table>
</div>




@endsection