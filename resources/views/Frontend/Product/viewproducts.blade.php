@extends('layouts.app')
@section('content')
<link href="{{asset('frontend/css/style.css')}}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{url('frontend/css/product.css')}}">

<div class="container">
    <div class="row">
        <div class="col-md-6 mt-2">
            <b>
                <h1 class="product-title">{{$categories->name}}</h1>
            </b>

        </div>

    </div>

    <div class="row">
        @foreach($products as $prod)
        <div class="col-md-6 col-lg-4">
            <div class="card product-card">

                <div class="product-card-img">
                    <img src="{{ asset('images/products/'.$prod->image) }}" class="img-fluid">
                </div>
                <a href="{{ url('view-category/'.$categories->slug.'/'.$prod->slug) }}" class="prod-main-btn">Buy
                    Now</a>

                <div class="product-card-content">
                    <div class="item-name">
                        <p>{{$prod->name}}</p>
                    </div>
                    <div class="product-card-footer">
                        <div class="product-price">
                            <span class="disabled-amount">Rs.{{$prod->old_price}}</span>
                            <span class="amount">Your price <strong>Rs.{{$prod->new_price}}</strong></span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        @endforeach



    </div>

</div>
@endsection