@extends('layouts.app')
@section('title', $products->name)
@section('content')

<div class="container">
    <div class="card shadow product_data mt-2 mb-2">
        <div class="row">
            <div class="col-md-4 border-right imgs">
                <img class=" w-100" src="{{ asset('images/products/'.$products->image) }}" alt="">
                <div class="magnifier-lens"></div>
            </div>


            <div class="col-md-8 ">
                <div class="all">

                    <h2 class="mb-0">
                        {{$products->name}}
                        @if($products->trending == '1')
                        <label style="font-size: 16px;" class="float-end badge bg-danger trending_tagg">trending</label>
                        @endif
                    </h2>

                    <hr>

                    <label class="me-3">Old Price : <s>Rs.{{ $products->old_price }}</s></label>
                    <label class="fw-bold">New Price : Rs.{{ $products->new_price }}</></label>
                    <p class="mt-3 color-dark">
                        {!! $products->description !!}
                    </p>
                    <div class="rating-css">
                        <div class="star-icon">
                            <!-- <input type="radio" value="1" name="product_rating" checked_id="rating1"> -->
                            <label for= "rating1" class="bi bi-star"></label>
                            <label for= "rating1" class="bi bi-star"></label>
                            <label for= "rating1" class="bi bi-star"></label>
                            <label for= "rating1" class="bi bi-star"></label>
                            <label for= "rating1" class="bi bi-star"></label>
                        </div>
                    </div>
                    <hr>
                    @if($products->qty > 0)
                    <label class="badge bg-success">In stock</label>
                    @else
                    <label class="badge bg-danger">Out of stock</label>
                    @endif
                    <div class="row mt-2">
                        <div class="col-md-2">
                            <input type="hidden" value="{{ $products->id }}" class="prod_id">
                            <label for="Quantity">Quantity</label>
                            <div class="input-group text-center mb-3" style="width:130px;">
                                <button class="input-group-text decrement-btn">-</button>
                                <input type="text" name="quantity" value="1" class="form-control qty-input text-center">
                                <button class="input-group-text increment-btn">+</button>

                            </div>
                        </div>
                        <div class="col-md-10">
                            <br />
                            <button type="button" class="btn btn-success me-3 addToWishlist float-start">Add to Wishlist
                                <i class="bi bi-heart-fill"></i></button>

                            @if($products->qty>0)
                            <button type="button" class="btn btn-primary me-3 addToCartBtn float-start" id="IdBtn">Add
                                to Cart<i class="bi bi-cart-check-fill"></i></button>
                            @endif
                        </div>
                    </div>
                    <div class="magnified-img"></div>
                </div>

            </div>

        </div>
    </div>

</div>











@endsection