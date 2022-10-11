@extends('Admin.Dashboard.dashboard')
@section('content')
<div class="card">
    <div class="card-header">
        <h5>Product Table</h5>

        <button type="button" class="btn btn-primary">
            <a href="{{route('add-product')}}" >Add </a>
        </button>


    </div>

    <div class="card-body">
    
        <table class="table table-bordered">
            <thead>
                <tr>
                  
                    <th>Name</th>
                    <th>Category</th>
                    
                    <th>Old_Price</th>
                    <th>New_Price</th>
                    <th>Image</th>
                    <th>Quantity</th>
                    <th>Action</th>


                </tr>

            </thead>
            <tbody>
               
            @foreach($product as $item)
                <tr>
                   
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->category->name }}</td>
                   
                    <td>{{ $item->old_price }}</td>
                    <td>{{ $item->new_price }}</td>
                    
                    <td>
                        <img src="{{ asset('images/products/'.$item->image) }}" style="width: 100px; height:50px;">
                        
                    </td>
                    <td>{{ $item->qty }}</td>
                   
                   
                    <td>
                        <a href="{{ url('product-edit/'.$item->id) }}" class="btn btn-sm btn-info">edit</a>
                        
                    </td>

                </tr>
                @endforeach
            
            
                
              
            </tbody>

        </table>

    </div>


</div>
@endsection