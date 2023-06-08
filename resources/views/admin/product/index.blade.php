@extends('layouts.admin')

@section('content')

<div class="card">
    <div class="card-header">
    <h4>Product List</h4>
    </div>
    <div class="card-body">
    <form action="" method="get">
   
      
    <div class="form-group">
        
        <input type="search" name="search" id="" class="form-control" placeholder="Search here by name" aria-describedby="helped">
      </div> 
     
      <br>
      <button class="btn btn-primary">Search</button>
      <a href="{{url('/products')}}"> <button class="btn btn-warning" type="button>">Reset</button></a>
      </form>
     <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>IMAGE</th>
                <th>PRODUCT NAME</th>
                <TH>CATEGORY</TH>
                <th>PRICE</th>
                <th>DESCRIPTION</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
        @if(count($products) > 0)
            @foreach($products as $item)
             <tr>
                <td>{{$item->id}}</td>
                <td>
                   <img src="{{asset('assets/product/'. $item->image)}}" class="w-25" alt="img"> </td>
                <td>{{$item->name}}</td>
                <td>{{$item->category->name}}</td>
                <td>{{$item->price}}</td>
                <td>{{$item->description}}</td>
                <td><a href="{{url('/delete', $item->id)}}"><button class="btn btn-danger">Delete</button></a></td>
                <td><a href="{{url('/product-edit', $item->id)}}"><button class="btn btn-success">Edit</button></a></td>
             </tr>
            @endforeach
            @else
<tr>
  <td colspan="5">No Record Found</td>
</tr>
@endif
  </tbody>
</table>
<div class="row">
  
  {!! $products->links() !!}

</div>
        
    </div>

</div>

@endsection