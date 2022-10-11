@extends('layouts.app')
@section('title')
checkout
@endsection

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-7">
            <div class="row">
                <h3><a href="#" class="btn btn-primary mt-3 w-40"><b>Cash On Delivery</b></a></h3>
                <div class="col-md-4">
                    
                </div>
                <div class="col-md-4">
                    <a href="{{ route('esewa.payment', $order->id) }}"
                        class="btn btn-success mt-3 w-40"><b>eSewa</b></a>
                </div>
                <div class="col-md-4">
                    <a href="{{ route('fonepay.payment', $order->id) }}"
                        class="btn btn-danger mt-3 w-40"><b>Fonepay</b></a>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card mb-4">
                <div class="card-body">

                    <h6>Order Details</h6>
                    <hr>
                    <table class="table table-bordered">
                        <tbody>
                            <thead>
                                <tr>
                                    <th>Total Price</th>
                                </tr>
                            </thead>

                            <tr>
                                <td>{{ $order->total_price }}</td>
                            </tr>

                        </tbody>
                    </table>


                </div>

            </div>
        </div>
    </div>
</div>


@endsection