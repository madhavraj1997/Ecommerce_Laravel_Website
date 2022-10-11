@extends('layouts.app')

@section('content')

<div class="contact">
    <div class="row">
        <div class="col-md-4 col-lg-6">
            <div class="card mt-2 mb-3">


                <div class="group">
                    <h3 class="text-center">CONTACT US</h3>
                    @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                    @endif
                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 rest">
                                <label for="exampleFormControlInput1" class="form-label">Name</label>
                                <input type="text" class="form-control items @error('name') is-invalid @enderror "
                                    name="name" placeholder="Enter your name ">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-6 rest">
                                <label for="exampleFormControlInput1" class="form-label">Email</label>
                                <input type="email" class="form-control items @error('email') is-invalid @enderror"
                                    name="email" placeholder="Enter your email address">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-6 rest">
                                <label for="exampleFormControlInput1" class="form-label">Phone No.</label>
                                <input type="text"
                                    class="form-control items @error('phone_number') is-invalid @enderror"
                                    name="phone_number" placeholder="Enter your phone number">
                                @error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-6 rest">
                                <label for="exampleFormControlInput1" class="form-label">Subject</label>
                                <input type="text" class="form-control items @error('subject') is-invalid @enderror"
                                    name="subject" placeholder="Enter your Subject">
                                @error('subject')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-12 rest">
                                <label for="exampleFormControlTextarea1" class="form-label items">Message</label>
                                <textarea class="form-control @error('message') is-invalid @enderror" name="message"
                                    rows="3"></textarea>
                                @error('message')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <input type="submit" class="btn btn-primary w-30 btns">
                            </div>
                        </div>
                    </form>
                </div>

            </div>

        </div>

        <div class="col-md-4 col-lg-6">
            <div class="detail">
                <h4 class="adres">Address</h4>
                <p>Kathmandu,Nepal</p>
                <h4 class="phn">Phone</h4>
                <p><a href="">+977 9810166382</a></p>
                <h4 class="mal">Email</h4>
                <p>sastopasal123@gmail.com</p>
            </div>

        </div>
    </div>
</div>


@endsection