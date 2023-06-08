@extends('layouts.app')

 @section('content')

   
   <section id="page-title" class="page-title-clr" >

<div class="container clearfix my-3 px-10">
    <h1 class="text-white">Single Product</h1>
  
    <ol class="breadcrumb">
        <li class="breadcrumb-item "><a class="" href="{{ url('/')}}">Home</a></li>
        <li class="breadcrumb-item active " aria-current="page">{{$products->category->name}} / {{$products->name}}</li>
    </ol>
</div>

</section>

<div class="container bg-grey">
  <div class="row">
    <div class="col-sm-5">
     <img src="{{asset('assets/product/'. $products->image)}}" class="img-responsive" style="width:80%" alt="Image">
    </div>
    <div class="col-sm-6">
      <h2>{{$products->name ?? 'Not found'}}</h2><br><br>
      <h4><strong>Price: Rs.{{$products->price ?? 'Not found'}}</strong></h4><br>
      
      <p><strong>Description:</strong><br> {{$products->description ?? 'Not found'}}</p>
    </div>
  </div>
</div>

 @endsection  