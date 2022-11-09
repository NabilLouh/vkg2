@extends('layouts.user')



@section('content')


<div>

    <h1 class="mt-5 w-52 m-auto mb-5 font-bold text-xl">Les commandes</h1>


    <table class="w-4/5 m-auto border-2 border-black">
        <thead class="border-2 border-black">
            <tr >
                <th class="w-1/10 border-2 border-black px-2 hover:bg-slate-400">ID</th>
                <th class="w-2/5 border-2 border-black hover:bg-slate-400">Produit commander</th>
                <th class="w-1/5 border-2 border-black hover:bg-slate-400">Prix Total</th>
                <th class="w-1/5 border-2 border-black hover:bg-slate-400">Client</th>
                <th class="w-1/5 border-2 border-black hover:bg-slate-400">Date</th>

            </tr>
        </thead>

        

        <tbody >

            @foreach ($orders as $order)
                <tr class="">
                    <th class="text-center border border-black hover:bg-slate-400">{{ $order->id }}</th>
                    <td class="text-center border border-black hover:bg-slate-400">
                        <ul>

                            @foreach (unserialize($order->products) as $product)
                                <li>- {{$product[0]}} ( {{ getPrice($product[1] )}} ) x {{ $product[2]}} </li>
                            @endforeach

                        </ul>
                    </td>
                    <td class="text-center border border-black hover:bg-slate-400">{{ getPrice($order->amount)}}</td>
                    <td class="text-center border border-black hover:bg-slate-400"> {{ $order->user->name }}</td>
                    <td class="text-center border border-black hover:bg-slate-400"> {{ $order->payment_created_at}}</td>
                    
                </tr>
                
            @endforeach

        </tbody>
    </table>
</div>


@endsection