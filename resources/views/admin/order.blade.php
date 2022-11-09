
@extends('layouts.admin')



@section('content')

<div>

    <h1 class="mt-5 w-52 m-auto mb-5 font-bold text-xl ">Les commandes</h1>


    <table class="mt-10 w-4/5 m-auto ">
        <thead>
            <tr>
                <th class="p-2 border border-black">ID</th>
                <th class="p-2 border border-black">Produit commander</th>
                <th class="p-2 border border-black">Prix Total</th>
                <th class="p-2 border border-black">Client</th>
                <th class="p-2 border border-black">Date</th>
                <th class="p-2 border border-black">Statue</th>
            </tr>
        </thead>


        <tbody>

            @foreach ($orders as $order)
                <tr>

                
                    <th class="p-2 text-center border border-black">{{ $order->id }}</th>
                    <td class="p-2 text-center border border-black">
                        <ul>

                            @foreach (unserialize($order->products) as $product)
                                <li>- {{$product[0]}} ( {{ getPrice($product[1] )}} ) x {{ $product[2]}} </li>
                            @endforeach

                        </ul>
                    

                    </td>
                    <td class="p-2 text-center border border-black">{{ getPrice($order->amount)}}</td>
                    <td class="p-2 text-center border border-black"> {{ $order->user->name }}</td>
                    <td class="p-2 text-center border border-black"> {{ $order->payment_created_at}}</td>
                    <td class="p-2 text-center border border-black">
                        @if ($order->is_shipped)
                            Expédié
                        @else
                            Non Expédié
                        @endif
                    </td>
                    <td><a class="ml-3 bg-green-700 text-white p-2 px-4 rounded-3xl border-2 border-green-700 hover:bg-slate-300 hover:text-green-700" href="{{ route('admin.orderedit', $order) }}">Modifier</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>




@endsection