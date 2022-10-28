@extends('layouts.base')

@section('extra-meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

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
                  
                    <td>{{ getPrice( $product->subtotal()) }} </td>
                    <td>
                        <select name="qty" id="qty" data-id="{{$product->rowId}}">
                            @for ($i = 1; $i < 101; $i++)
                                <option value="{{ $i }}" {{ $i == $product->qty ? 'selected' : '' }}>{{ $i }}</option>
                            @endfor
                        </select>
                    </td>
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

        <div>
            Details de la commande
        </div>
        <ul>
            <li><strong>Sous-total : </strong><strong>{{ getPrice(Cart::subtotal())}}</strong></li>
            <li><strong>Taxe : </strong><strong>{{ getPrice(Cart::tax())}}</strong></li>
            <li><strong>Total : </strong><strong>{{ getPrice(Cart::total() )}}</strong> </li>
        </ul>


        <a href="{{ route('checkout.index') }}"> Passer à la caisse </a>

    @else
        <p>Votre Panier est vide.</p>
      
    @endif



    


    



@endsection


@section('extra-js')
<script>
    var qty = document.querySelectorAll('#qty');
   
    Array.from(qty).forEach((element) => {
        element.addEventListener('change', function () {
            var rowId = element.getAttribute('data-id');
            var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            fetch(`/panier/${rowId}`,
                {
                    headers: {
                        "Content-Type": "application/json",
                        "Accept": "application/json, text-plain, */*",
                        "X-Requested-With": "XMLHttpRequest",
                        "X-CSRF-TOKEN": token
                    },
                    method: 'PATCH',
                    body: JSON.stringify({
                        qty: this.value
                    })
            }).then((data) => {
                console.log(data);
                location.reload();
            }).catch((error) => {
                console.log(error);
            });
        });
    });
</script>
@endsection