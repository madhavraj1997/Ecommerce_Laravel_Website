<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset=UTF-8>
    <meta name=viewport content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset('frontend/css/bootstrap5.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('Admin/main.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('Admin/productinfo.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('Admin/addproduct.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('Admin/landing.css')}}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Admin Dashboard</title>
</head>

<body>
    <?php $activePage = basename($_SERVER['PHP_SELF'], ".php"); ?>
    <div class="sidebar">

        <div class="sidebar-brand ms-3 mt-3">
            <i>
                <h2>Sasto<span style="color: #db18a7ab;">Pasal</span></h2>
            </i>
        </div>
        <div class="sidebar-wrapper side-menu mt-3">
            <ul class="nav">
                <li class="nav-item <?= ($activePage == 'landing') ? 'active':''; ?>">
                    <a class="nav-link" href="{{ route('landings') }}"><span
                            class="material-symbols-outlined">dashboard</span>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="nav-item <?= ($activePage == 'user-info') ? 'active':''; ?>">
                    <a class="nav-link" href="{{ route('username') }}"><span
                            class="material-symbols-outlined">person_add</span>
                        <span>User</span>
                    </a>
                </li>

                <li class="nav-item <?= ($activePage == 'category-info') ? 'active':''; ?>">
                    <a class="nav-link " href="{{route('category') }}"><span
                            class="material-symbols-outlined">bookmark</span>
                        <span>Category</span>
                    </a>
                </li>

                <li class="nav-item <?= ($activePage == 'product-info') ? 'active':''; ?>">
                    <a class="nav-link" href="{{route('product') }}"><span class="material-symbols-outlined">shop</span>
                        <span>Product</span>
                    </a>
                </li>

                <li class="nav-item  <?= ($activePage == 'order-info') ? 'active':''; ?>">
                    <a class="nav-link" href="{{ route('order') }}"><span
                            class="material-symbols-outlined">shopping_cart_checkout</span>
                        <span>Order</span>
                    </a>
                </li>

            </ul>
        </div>
    </div>
    <div class="main-content">
        <header>
            <h4>
                <label for="">
                    <i class="bi bi-list"></i>
                    Dashboard
                </label>
            </h4>
            <div class="search-wrapper">
                <span class="material-symbols-rounded">
                    search
                </span>
                <input type="search" placeholder="Search here...">
            </div>
            <div class="user-wrapper">
            {{ Auth::user()->name }}
                <span class="material-symbols-rounded">
                    account_circle
                 
                </span>
               
                <a class="item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>


            </div>

        </header>
        <div class="container">
            @yield('content')
        </div>



    </div>



    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @if(session('status'))
    <script>
    swal("{{ session('status') }}");
    </script>
    @endif
    <!-- @yeild('scripts') -->
    <!-- scripts  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('frontend/js/bootstrap5.js') }}"></script>
    <script src="{{ asset('Admin/js/custom.js') }}"></script>
    <script>
    $('.nav li a').click(function() {
        var parentLI = $(this).parent().toggleClass('active off');
        if (parentLI.hasClass('active')) {
            parentLI.siblings('.active').toggleClass('active off');
        }
    });
    </script>
</body>

</html>