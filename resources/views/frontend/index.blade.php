@extends('layouts.front')
@section('title')
E-shopping
@endsection
@section('content')




   
   <section id="page-title" class="page-title-clr" >

<div class="container clearfix my-3 px-10">
<h1>Top Categories</h1>
    
</div>

</section>


<div class="container bg-3 text-center">    
 
  <div class="row">
 
  
  @foreach($categories as $item)
 
  
 
    <div class="col-sm-6">
    
      <div class="entire-img">
      
      <a href="{{ route('all-products',$item->name)}}"> <img src="{{asset('assets/product/'. $item->image)}}" class="pro-img" alt="img"></a>
      <br>
      <h5>{{$item->name}}</h5>
      </div>
      

      
      </div>
     
     
      @endforeach 
     

      
  </div>
</div><br> 



 @endsection  
    

