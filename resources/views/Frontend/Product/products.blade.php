@extends('layouts.app')
@section('content')
<link rel="stylesheet" type="text/css" href="{{url('frontend/css/product.css')}}">
<main class="inner-page">
    <div class="container mt-4">
        <div class="products-area">
            <div class="row">

                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                        <b><h2 class="products-title">All Products</h2></b>

                        </div>
                        <hr>

                    </div>

                    <div class="row">
                        @foreach($products as $prod)
                        <div class="col-md-6 col-lg-4">
                            <div class="card product-card">

                                <div class="product-card-img">
                                    <img src="{{ asset('images/products/'.$prod->image) }}" class="img-fluid">
                                </div>
                                <a href="{{ url('productdetail/'.$prod->slug) }}" class="prod-main-btn">Buy Now</a>


                                <div class="product-card-content">
                                    <div class="item-name">
                                        <p>{{$prod->name}}</p>
                                    </div>
                                    <div class="product-card-footer">
                                        <div class="product-price">
                                            <span class="disabled-amount">Rs.{{$prod->old_price}}</span>
                                            <span class="amount">Your price
                                                <strong>Rs.{{$prod->new_price}}</strong></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach



                    </div>


                </div>

            </div>
            {{ $products->links() }}
        </div>
    </div>

</main>
@endsection