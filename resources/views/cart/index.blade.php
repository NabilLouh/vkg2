@extends('layouts.base')

@section('extra-meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')

    @if (Cart::count() > 0)

        <table>
            <thead>

                <tr>
                    <th class="w-1/5">
                      <div class="">Product</div>
                    </th>
                    <th class="w-1/5">Name</th>
                    <th class="w-1/5">
                      <div classe="">Price</div>
                    </th>
                    <th class="w-1/5">
                      <div classe="">Quantity</div>
                    </th>
                    <th class="w-1/5">
                      <div class="">Remove</div>
                    </th>
                  </tr>
            </thead>

            <tbody>
                @foreach (Cart::content() as $product)
                <tr>
                    <th class="flex justify-center">
                        <img width="70" src="{{$product->model->cover}}" alt="">
                        
                    </th>

                    <th >{{$product->name}}</th>
                  
                    <td class="flex justify-center">{{ getPrice( $product->subtotal()) }} </td>
                    <td class="text-black items-center">
                        <select name="qty" id="qty" data-id="{{$product->rowId}}">
                            @for ($i = 1; $i < 101; $i++)
                                <option value="{{ $i }}" {{ $i == $product->qty ? 'selected' : '' }}>{{ $i }}</option>
                            @endfor
                        </select>
                    </td>
                    <td class="flex justify-center">
                        <form action=" {{ route('cart.destroy', $product->rowId) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-700 rounded-lg p-3 border-2 border-red-700 hover:bg-black hover:text-red-700" type="submit">remove</button>
                        </form>
                        
                       
                    
                    </td>
                </tr>
                
                    
                @endforeach
            </tbody>
        </table>

        <div class="flex justify-center mt-10 font-bold text-xl">
            Details de la commande
        </div>


        <div class="flex justify-end mr-10">
            
            <ul>
                <li class="mb-5 border-b-2 border-white"><strong>Sous-total : </strong><strong>{{ getPrice(Cart::subtotal())}}</strong></li>
                <li class="mb-5 border-b-2 border-white"><strong>Taxe : </strong><strong>{{ getPrice(Cart::tax())}}</strong></li>
                <li class="mb-5 border-b-2 border-white"><strong>Total : </strong><strong>{{ getPrice(Cart::total() )}}</strong> </li>
            </ul>

            
        </div>

        <div class="flex justify-end">
            <a class="bg-green-500 p-3 rounded-lg mr-10 mb-10 border-green-500 border-2 hover:bg-black" href="{{ route('checkout.index') }}"> Passer à la caisse </a>
        </div>


       

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