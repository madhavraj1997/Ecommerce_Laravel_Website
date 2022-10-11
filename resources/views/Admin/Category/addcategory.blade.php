@extends('Admin.Dashboard.dashboard')
@section('content')

<div class="container">
    <div class="add-card">
        <form action="{{route('insert-category')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">

            <div class="col-md-6 mb-3">
                <label for="name"><b>Name:</b></label><br>
                <input type="text" name="name" id="name" class="form-control">
            </div>
            
            <div class="col-md-6 mb-3">
                <label for="slug"><b>Slug:</b></label><br>
                <input type="text" name="slug" id="slug" class="form-control">
            </div>

            <div class="col-md-12 mb-3">
                <label for="name"><b>Description:</b></label><br>
                <textarea name="description" id="description" class="form-control"></textarea>
            </div>

            <div class="col-md-6 mb-3">
                <label for="name"><b>Status:</b></label>
                <input type="checkbox" name="status">
            </div>

            <div class="col-md-6 mb-3">
                <label for="name"><b>Popular:</b></label>
                <input type="checkbox" name="popular">
            </div>

            <div class="col-md-6 mb-3">
                <label><b>Image:</b></label>
                <input type="file" name="image" class="form-control-file">
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