@extends('layouts.app')

@section('content')

<div class="container my-5">
    <div class="card shadow">
        <div class="card-header">
            <h3 class="text-center">CartPage</h3>
        </div>
        <div class="card-body">
            @php $total = 0; @endphp
            @foreach($cartitems as $item)
            <div class="row product_data">
                <div class="col-md-3 my-auto">
                    <img src="{{ asset('images/products/'.$item->products->image) }}" height="70px" width="70px"
                        alt="Image here">
                </div>
                <div class="col-md-3 my-auto">
                    <h6>{{ $item->products->name }}</h6>
                </div>
                <div class="col-md-2 my-auto">
                    <h6>{{ $item->products->new_price }}</h6>
                </div>
                <div class="col-md-2 my-auto">
                    <input type="hidden" class="prod_id" value="{{ $item->prod_id }}">
                    @if($item->products->qty >= $item->prod_qty)
                    <label for="Quantity">Quantity</label>
                    <div class="input-group text-center mb-3">
                        <button class="input-group-text changeQuantity decrement-btn">-</button>
                        <input type="text" name="quantity " value="{{ $item->prod_qty }}"
                            class="form-control qty-input text-center">
                        <button class="input-group-text  changeQuantity increment-btn">+</button>

                    </div>
                    @php $total += $item->products->new_price * $item->prod_qty ; @endphp
                    @else
                    <h6>Out of Stock</h6>
                    @endif
                </div>
                <div class="col-md-2 my-auto">
                    <button class="btn btn-danger delete-cart-item"><i class="bi bi-trash"></i>Remove</button>
                </div>

            </div>
           
            @endforeach
        </div>
        <div class="card-footer">
            <h6>Total Price: {{ $total }}
                <a href="{{ url('checkout') }}" class="btn btn-outline-primary float-end">Proceed to checkout</a>
            </h6>
        </div>

    </div>
</div>

@endsection