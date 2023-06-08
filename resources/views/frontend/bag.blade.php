@extends('layouts.app')

 @section('content')

   
   <section id="page-title" class="page-title-clr" >

<div class="container clearfix my-3 px-10">
    <h1 >T-shirt</h1>
  
    <ol class="breadcrumb">
        <li class="breadcrumb-item "><a class="text-white" href="">Home</a></li>
        <li class="breadcrumb-item active text-white" aria-current="page">Our Products / T-shirt</li>
    </ol>
</div>

</section>

 <div class="container bg-3 text-center">    
 
  <div class="row">
  @foreach($bags as $item)
    <div class="col-sm-3">
      <div class="entire-img">
      
      <a href=""> <img src="{{asset('assets/product/'. $item->image)}}" class="pro-img" alt="img"></a>
      <br>
      <h5>{{$item->name}}</h5>
      </div>
      </div>
      @endforeach 







 @endsection  