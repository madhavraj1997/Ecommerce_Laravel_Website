@extends('Admin.Dashboard.dashboard')
@section('content')


<div class="row mt-4">
    <div class="col-md-3 mt-4">
        <div class="shadow">
            <div class="card text-white bg-dark card-item">


                <div class="icon">
                    <span class="material-symbols-outlined">
                        group
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill user-count">
                     {{ $usercount }}
                            <span class="visually-hidden">unread messages</span>
                        </span>
                    </span>

                </div>

                <h6>Normal Users</h6>



            </div>
        </div>
    </div>
    <div class="col-md-3 mt-4">
        <div class="shadow">
            <div class="card text-white bg-primary card-item">

                <div class="icon">
                    <span class="material-symbols-outlined">
                        production_quantity_limits
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill">
                            {{ $products }}
                            <span class="visually-hidden">unread messages</span>
                        </span>
                    </span>

                </div>
                <h6> Total Product</h6>

            </div>
        </div>
    </div>
    <div class="col-md-3 mt-4">
        <div class="shadow">
            <div class="card text-white bg-secondary card-item">

                <div class="icon">
                    <span class="material-symbols-outlined">
                        inventory_2
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill">
                        {{ $orders }}
                            <span class="visually-hidden">unread messages</span>
                        </span>
                    </span>

                </div>
                <h6>Total Orders</h6>

            </div>
        </div>
    </div>

    <div class="col-md-3 mt-4">
        <div class="shadow">
            <div class="card text-white bg-secondary card-item">

                <div class="icon">
                    <span class="material-symbols-outlined">
                        inventory_2
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill ">
                            {{$admincount}}
                            <span class="visually-hidden">unread messages</span>
                        </span>
                    </span>

                </div>
                <h6>Admin User</h6>

            </div>
        </div>
    </div>

</div>




@endsection