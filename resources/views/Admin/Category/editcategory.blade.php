@extends('Admin.Dashboard.dashboard')
@section('content')

<div class="container">

    <div class="add-card">
        <form action="{{ url('category-update/'.$category->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label for="name"><b>Name:</b></label><br>
                    <input type="text" name="name" value="{{ $category->name }}" id="name" class="form-control">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="slug"><b>Slug:</b></label><br>
                    <input type="text" name="slug" value="{{ $category->slug }}" id="slug" class="form-control">
                </div>

                <div class="col-md-12 mb-3">
                    <label for="name"><b>Description:</b></label><br>
                    <textarea name="description"  id="description" class="form-control">{{ $category->description }}</textarea>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="name"><b>Status:</b></label>
                    <input type="checkbox" {{ $category -> status == "1" ? 'checked':'' }} name="status">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="name"><b>Popular:</b></label>
                    <input type="checkbox" {{ $category -> popular == "1" ? 'checked':'' }} name="popular">
                </div>

                @if($category->image)
                    <img src="{{ asset('images/category/'.$category->image)}}" alt="category-image">
                @endif

                <div class="col-md-6 mb-3">
                    <label for="exampleFormControlFile1"><b>Image:</b></label>
                    <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
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