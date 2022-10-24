@extends('layouts.base')



@section('content')

    @if (Cart::count() > 0)

        <table>
            <thead>

                <tr>
                    <th>
                      <div class="">Product</div>
                    </th>
                    <th>
                      <div classe="">Price</div>
                    </th>
                    <th>
                      <div classe="">Quantity</div>
                    </th>
                    <th>
                      <div class="">Remove</div>
                    </th>
                  </tr>
            </thead>

            <tbody>
                @foreach (Cart::content() as $product)
                <tr>
                    <th>
                        <img width="70" src="{{$product->model->cover}}" alt="">
                        <td>{{$product->name}}</td>
                    </th>
                  
                    <td>{{$product->price / 100}} €</td>
                    <td>3</td>
                    <td>
                        <form action=" {{ route('cart.destroy', $product->rowId) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">remove</button>
                        </form>
                        
                       
                    
                    </td>
                </tr>
                
                    
                @endforeach
            </tbody>
        </table>

    @else
        <p>Votre Panier est vide.</p>
    @endif



    


    



@endsection