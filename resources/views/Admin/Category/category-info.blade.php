@extends('Admin.Dashboard.dashboard')
@section('content')
<div class="card">
    <div class="card-header">
        <h5>Category Table</h5>

        <button type="button" class="btn btn-primary">
            <a href="{{route('add-category')}}" >Add </a>
        </button>


    </div>

    <div class="card-body">
    
        <table class="table table-bordered">
            <thead>
                <tr>
                   
                    <th>Name</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Action</th>


                </tr>

            </thead>
            <tbody>
               
            @foreach($category as $item)
                <tr>
                   
                    <td>{{$item->name}}</td>
                    <td>{{$item->description}}</td>
                    <td>
                        <img src="{{ asset('images/category/'.$item->image) }}" style="width: 100px; height:50px;">
                        
                    </td>
                   
                   
                    <td>
                        <a href="{{url('category-edit/'.$item->id)}}" class="btn btn-sm btn-info">edit</a>
                        
                    </td>

                </tr>
                @endforeach
            
                
              
            </tbody>

        </table>

    </div>


</div>
@endsection