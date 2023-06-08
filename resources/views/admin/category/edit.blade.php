@extends('layouts.admin')

@section('content')

<div class="card">
    <div class="card-header">
    <h4>Edit Product</h4>
    </div>
    <div class="card-body">
      <form action="{{ route('category.update', $category->id)}}" method="post" enctype="multipart/form-data" >
        @csrf
       
        <div class="row">
           <div class="col-md-6">
           <label for="">Product Name</label>
           <input type="text" name="name" class="form-control @error('name') is-invalid @enderror "  value="{{old('name',$category->name)}}">
           @if ($errors->has('name')) <div class="invalid-feedback">{{ $errors->first('name') }}</div>@endif
           </div>

           <div class="col-md-12">
            <label for="">Description</label>
           <textarea name="description"  rows="3" class="form-control @error('description') is-invalid @enderror">{{old('description',$category->description)}}</textarea>
           @if ($errors->has('description')) <div class="invalid-feedback">{{ $errors->first('description') }}</div>@endif
           </div>
           
           <div class="col-md-12">
            <label for="image">image</label>
            @if($category->image)
            <img src="{{asset('assets/product/'. $category->image)}}" class="w-5" alt="img">
            @endif
            <input type="file" name="image" id="" class="form-control @error('image') is-invalid @enderror" aria-describedby="helpId" accept="image/*">
            @if ($errors->has('image')) <div class="invalid-feedback">{{ $errors->first('image') }}</div>@endif
           </div>

           <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Update</button>
           </div>
        </div>
      </form>
    </div>

</div>

@endsection