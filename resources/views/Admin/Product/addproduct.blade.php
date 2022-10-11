@extends('Admin.Dashboard.dashboard')
@section('content')
<div class="container">
    <div class="add-card">
        <form action="{{url('/product-insert')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for=""><b>Category</b></label>
                    <select class="form-select" name="cate_id">
                        <option value="">Select Category</option>
                        @foreach($category as $item)
                        <option value="{{ $item->id }}">{{ $item-> name }}</option>
                        @endforeach

                    </select>
                </div>


                <div class="col-md-6 mb-3">
                    <label for="name"><b>Name:</b></label><br>
                    <input type="text" name="name" id="name"class="form-control" >
                </div>

                <div class="col-md-6 mb-3">
                    <label for="slug"><b>Slug:</b></label><br>
                    <input type="text" name="slug" id="slug" class="form-control" >
                </div>
                




                <div class="col-md-12 mb-3">
                    <label for="name"><b>Description:</b></label><br>
                    <textarea name="description" id="description" class="form-control"></textarea>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="old_price"><b>Old_Price:</b></label><br>
                    <input type="number" name="old_price" id="old_price">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="new_price"><b>New_Price:</b></label><br>
                    <input type="number" name="new_price">
                </div>
                <div class="col-md-6 mb-3">
                    <label><b>Image:</b></label>
                    <input type="file" name="image" class="form-control-file">
                </div>

                <div class="col-md-6 mb-3">
                    <label for=""><b>Quantity:</b></label><br>
                    <input type="number" name="qty">
                </div>


                <div class="col-md-6 mb-3">
                    <label for="name"><b>Status:</b></label>
                    <input type="checkbox" name="status">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="name"><b>Trending:</b></label>
                    <input type="checkbox" name="trending">
                </div>

               

               
               

              
                <br>

                <div class="col-md-12 mb-3">
                    <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
                </div>
            </div>
        </form>
    </div>
</div>

@endsection