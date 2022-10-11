@extends('layouts.app')
@section('content')




<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Order View
                    <a href="{{url('my-order')}}" class="btn btn-primary sm-3 float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">First Name</label>
                            <div class="border p-2">{{ $orders->fname }}</div>
                            <label for="">Last Name</label>
                            <div class="border p-2">{{ $orders->lname }}</div>
                            <label for="">Email</label>
                            <div class="border p-2">{{ $orders->email }}</div>
                            <label for="">Phone</label>
                            <div class="border p-2">{{ $orders->phone }}</div>

                            <label for="">Shipping Address</label>
                            <div class="border p-2">
                                {{ $orders->address }},
                                {{ $orders->city }},
                                {{ $orders->state }},
                                {{ $orders->country }}

                            </div>
                            <label for="">Zip Code</label>
                            <div class="border p-2">{{ $orders->pincode }}</div>

                        </div>




                        <div class="col-md-6">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Image</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders->orderitems as $item)
                                    <tr>
                                        <td>{{ $item->products->name }}</td>
                                        <td>{{ $item->qty }}</td>
                                        <td>{{ $item->price }}</td>
                                        <td><img src="{{ asset('images/products/'.$item->products->image) }}"
                                                alt="Product Image" width="50px"></td>


                                    </tr>
                                    @endforeach
                                </tbody>

                            </table>
                            <h4>Grand Total: {{ $orders->total_price }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection