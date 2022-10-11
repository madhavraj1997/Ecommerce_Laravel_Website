@extends('layouts.app')

@section('content')

<div class="container my-5">
    <div class="card shadow">
    <div class="card-header">
        <h3 class="text-center">Wishlist Page</h3>
    </div>
        <div class="card-body">
            @if($wishlist->count()>0)
            @foreach($wishlist as $item)
            <div class="row product_data">
                <div class="col-md-2 my-auto">
                    <img src="{{ asset('images/products/'.$item->products->image) }}" height="70px" width="70px"
                        alt="Image here">
                </div>
                <div class="col-md-2 my-auto">
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
                        <button class="input-group-text decrement-btn">-</button>
                        <input type="text" name="quantity " value="1"
                            class="form-control qty-input text-center">
                        <button class="input-group-text   increment-btn">+</button>

                    </div>
               
            
                    @else
                    <h6>Out of Stock</h6>
                    @endif
                </div>
                <div class="col-md-2 my-auto">
                    <button class="btn btn-success addToCartBtn"><i class="bi bi-cart"></i>Add to Cart</button>
                </div>

                <div class="col-md-2 my-auto">
                    <button class="btn btn-danger remove-wishlist-item"><i class="bi bi-trash"></i>Remove</button>
                </div>

            </div>
            @endforeach

            @else
            <h4>There is no products in your wishlist.</h4>
            @endif
        </div>
    </div>
</div>

@endsection