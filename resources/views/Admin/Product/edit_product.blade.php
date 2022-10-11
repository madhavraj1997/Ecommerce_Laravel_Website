@extends('Admin.Dashboard.dashboard')
@section('content')
<?php $activePage = basename($_SERVER['PHP_SELF'], ".php"); ?>
<div class="container">
    <div class="add-card">
        <form action="{{ url('product-update/'.$product->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="row">
            <div class="col-md-12 mb-3">
                    <select class="form-select">
                        <option value="">{{ $product->category->name }}</option>
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="name"><b>Name:</b></label><br>
                    <input type="text" name="name" value="{{ $product->name }}" id="name" class="form-control">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="slug"><b>Slug:</b></label><br>
                    <input type="text" name="slug" value="{{ $product->slug }}" id="slug" class="form-control">
                </div>

                <div class="col-md-12 mb-3">
                    <label for="name"><b>Description:</b></label><br>
                    <textarea name="description"  id="description" class="form-control">{{ $product->description }}</textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="old_price"><b>Old_Price:</b></label><br>
                    <input type="number" value="{{$product->old_price}}" name="old_price" id="old_price">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="new_price"><b>New_Price:</b></label><br>
                    <input type="number" value="{{$product->new_price}}" name="new_price">
                </div>

                @if($product->image)
                    <img src="{{ asset('images/products/'.$product->image) }}" alt="product-image">
                @endif

                <div class="col-md-6 mb-3">
                    <label for="exampleFormControlFile1"><b>Image:</b></label>
                    <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                </div>
                <div class="col-md-6 mb-3">
                    <label for=""><b>Quantity:</b></label><br>
                    <input type="number" value="{{$product->qty}}" name="qty">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="name"><b>Status:</b></label>
                    <input type="checkbox" {{ $product -> status == "1" ? 'checked':'' }} name="status">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="name"><b>Trending:</b></label>
                    <input type="checkbox" {{ $product -> trending == "1" ? 'checked':'' }} name="trending">
                </div>

              
               

                

                <br>

                <div class="col-md-12 mb-3">
                    <input type="submit" name="submit" class="btn btn-info btn-md" value="Update">
                </div>
            </div>

        </form>
    </div>
</div>

@endsection