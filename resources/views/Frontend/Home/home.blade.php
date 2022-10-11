@extends('layouts.app')

@section('content')



<!-- <div class="container">
    <section class="banner-card-section bg-red">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">

                <div class="carousel-item active">
                    <img src="{{ asset('images/clothes.webp') }}" class="d-block w-100 img" alt="...">
                    <div class="carousel-caption">
                        <div class=" animate__animated animate__fadeInLeft animate__delay-1s">
                            <h6>Sale<span>50%</span></h6>
                            <h4>Clothes</h4>

                        </div>
                        <a href="" class="animate__animated animate__fadeInTopRight animate__delay-1s"><b>Shop
                                Now</b></a>
                    </div>
                </div>

                <div class="carousel-item">
                    <img src="{{ asset('images/sports.jpg') }}" class="d-block w-100" alt="...">
                    <div class="carousel-caption">
                        <div class=" animate__animated animate__fadeInLeft animate__delay-1s">
                            <h6>Sale<span>50%</span></h6>
                            <h4>Shoes</h4>

                        </div>
                        <a href="" class="animate__animated animate__fadeInTopRight animate__delay-1s"><b>Shop
                                Now</b></a>
                    </div>
                </div>

                <div class="carousel-item ">
                    <img src="{{ asset('images/electronic.webp') }}" class="d-block w-100" alt="...">
                    <div class="carousel-caption">
                        <div class=" animate__animated animate__fadeInLeft animate__delay-1s">
                            <h6>Sale<span>50%</span></h6>
                            <h4>Electronics</h4>

                        </div>
                        <a href="" class="animate__animated animate__fadeInTopRight animate__delay-1s"><b>Shop
                                Now</b></a>
                    </div>
                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
    </section>
</div> -->


<!-- trending section -->
<div class="container">
    <b>
        <h2>Trending Product</h2>
    </b>
    <hr>
    <div class="row">

        @foreach($featured_product as $item)
        <div class="col-md-6 col-lg-4">
            <div class="card product-card">
                <div class="card-shadow">

                    <div class="product-card-img">
                        <img src="{{ asset('images/products/'.$item->image) }}" class="img-fluid">
                    </div>
                    <a href="{{ url('productdetail/'.$item->slug) }}" class="prod-main-btn">Buy Now</a>

                    <div class="product-card-content">
                        <div class="item-name">
                            <p>{{$item->name}}</p>
                        </div>
                        <div class="product-card-footer">
                            <div class="product-price">
                                <span class="disabled-amount">Rs.{{$item->old_price}}</span>
                                <span class="amount">Your price <strong>Rs.{{$item->new_price}}</strong></span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>


<!-- category product -->

<div class="container">
    <b>
        <h2>Category Product</h2>
    </b>
    <hr>
    <div class="row">

        @foreach($categories as $cate)
        <div class="col-md-6 col-lg-4">
            <a href="{{ url('view-categories/'.$cate->slug) }}">

                <div class="card product-card card-style ">
                    <div class="card shadow">
                        <div class="product-card-img img-style">
                            <img src="{{ asset('images/category/'.$cate->image) }}" class="img-fluid">
                            <div class="product-card-content">
                                <h5 class="text-dark">{{$cate->name}}</h5>
                                <p class="text-dark">{{$cate->description}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @endforeach

    </div>
</div>
@endsection