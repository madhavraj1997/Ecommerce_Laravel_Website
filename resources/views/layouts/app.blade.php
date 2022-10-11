<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Ecommerce</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.css" rel="stylesheet" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <!-- style -->
    <link rel="stylesheet" type="text/css" href="{{url('css/productdetails.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('frontend/css/product.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('frontend/css/home.css')}}">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link href="{{asset('frontend/css/bootstrap5.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/font.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/home.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/custom.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/contact.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/productmag.css')}}" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <!-- new -->
    <div class="app">
        <div class="header-top">
            <div class="container-xxl">
                <div class="row position-relative">
                    <div class="col-md-3 col-lg-3 position-relative">
                        <div class="logo">
                            <a href="{{ url('/home') }}"><i>Sasto<span>Pasal</span></i></a>
                        </div>

                    </div>
                    <div class="col-md-12 col-lg-4 search-header">
                        <div class="header-search">
                            <form action="{{ url('search-product') }}" method="POST">
                                @csrf
                                <div class=" input-group mb-3">
                                    <input type="search" class="form-control" id="search_product" name="product_name"
                                        placeholder="search products...">
                                    <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i></button>
                                </div>


                            </form>
                        </div>


                    </div>


                    <div class="col-md-9 col-lg-5">




                        <ul class="navbar-nav ms-auto">
                            <!-- Authentication Links -->
                            <div class="row position-relative">
                                <div class="col-md-6 mt-4">

                                    <button class="btn position-relative">

                                        <span
                                            class="position-absolute top-0 start-100  translate-middle text-primary cart-count"></span>
                                    </button>
                                    <a href="{{ url('/cart') }}"> <span>My Cart</span></a>

                                    <button class="btn position-relative">

                                        <span
                                            class="position-absolute top-0 start-100 translate-middle text-primary wishlist-count">
                                        </span>
                                    </button>
                                    <a href="{{ url('wishlist') }}"> <span>WishList</span></a>


                                </div>
                                <div class="col-md-6">
                                    @guest
                                    @if (Route::has('login'))

                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>

                                    @endif


                                    @if (Route::has('register'))

                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>

                                    @endif
                                    @else
                                    <li class="nav-item dropdown mt-2">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle"
                                            style="font-size:1.3rem;" href="#" role="button" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }}
                                        </a>



                                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                            <li>
                                                <a class="dropdown-item" href="{{url('my-order')}}">My Orders</a>
                                            </li>

                                            <li>

                                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }}
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                    class="d-none">
                                                    @csrf
                                                </form>
                                            </li>
                                        </ul>


                                    </li>
                                    @endguest
                                </div>

                            </div>
                        </ul>







                    </div>



                </div>
            </div>
        </div>





        <!-- navbar -->
        <nav class="bg-primary">
            <div class="container-xxl">

                <div class="nav-collapse">
                    <ul class="custom-nav mx-auto">
                        <li class="cst-nav-item">
                            <a href="{{url('/home')}}" class="cst-nav-link">Home</a>
                        </li>
                        <li class="cst-nav-item">
                            <a href="{{url('/product')}}" class="cst-nav-link">Product</a>
                        </li>

                        <li class="cst-nav-item">
                            <a href="{{url('/contact')}}" class="cst-nav-link">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>

        </nav>

        <!-- body -->



        <!-- bodyend -->












        <div class="container">
            @yield('content')
        </div>
















        <!-- footer -->

        <div class="footer">
            <div class="container">
                <div class="heading">
                    <div class="col-md-3 col-lg-3 position-relative">
                        <div class="logo">
                            <i>Sasto<span>Pasal</span></i>
                        </div>

                    </div>

                </div>


                <div class="content">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="social-media">
                                <h4>Social Media</h4>
                                <p>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                </p>
                                <p>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                </p>
                                <p>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </p>
                                <p>
                                    <a href=""><i class="bi bi-twitter"></i></a>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="links">
                                <h4>Quick Links</h4>
                                <p>
                                    <a href="{{url('/home')}}">Home</a>
                                </p>
                                <p>
                                    <a href="{{url('/product')}}">Product</a>
                                </p>

                                <p>
                                    <a href="{{url('/contact')}}">Contact Us</a>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="details">
                                <h4 class="address">Address</h4>
                                <p>Kathmandu,Nepal</p>
                                <h4 class="phone">Phone</h4>
                                <p><a href="">+977 9810166382</a></p>
                                <h4 class="mail">Email</h4>
                                <p>sastopasal123@gmail.com</p>
                            </div>
                        </div>
                    </div>
                </div>
                <footer>
                    <hr>
                    &copy; 2022 sastopasal
                </footer>
            </div>
        </div>
        <!-- footerend -->





















    </div>

    <!-- scripts  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"
        integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.js"></script>
    <script src="{{ asset('frontend/js/bootstrap5.js') }}"></script>
    <script src="{{ asset('frontend/js/custom.js') }}"></script>
    <script src="{{ asset('frontend/js/magnifier.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

    <script>
    var availableTags = [];
    $.ajax({
        method: "GET",
        url: "/product-search",
        data: "data",
        success: function(response) {
            startAutoComplete(response);

        }
    });

    function startAutoComplete(availableTags) {
        $("#search_product").autocomplete({
            source: availableTags
        });
    }
    </script>

    <script type="text/javascript">
    function submitForm() {
        document.getElementById('esewaPayment').submit();
    }
    </script>


    @if(session('status'))
    <script>
    swal("{{ session('status') }}");
    </script>
    @endif
    @if(session('success_message'))
    <script>
    swal("{{ session('success_message') }}")
    </script>
    @endif
    @if(session('error_message'))
    <script>
    swal("{{ session('error_message') }}")
    </script>
    @endif
    @yield('scripts')

</body>

</html>