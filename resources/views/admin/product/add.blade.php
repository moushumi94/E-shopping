@extends('layouts.admin')

@section('content')

<div class="card">
    <div class="card-header">
    <h4>Add Product</h4>
    </div>
    <div class="card-body">
      <form action="{{ route('product.store')}}" method="post" enctype="multipart/form-data" >
        @csrf
        <div class="row">
           <div class="col-md-6">
           <label for="">Product Name</label>
           <input type="text" name="name" class="form-control @error('name') is-invalid @enderror "  value="{{old('name')}}">
           @if ($errors->has('name')) <div class="invalid-feedback">{{ $errors->first('name') }}</div>@endif
           </div>


           <div class="col-md-6">
           <label for="">Price</label>
           <input type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{old('price')}}">
           @if ($errors->has('price')) <div class="invalid-feedback">{{ $errors->first('price') }}</div>@endif
           </div>

           <div class="col-md-12">
            <label for="">Description</label>
           <textarea name="description"  rows="3" class="form-control @error('description') is-invalid @enderror">{{old('description')}}</textarea>
           @if ($errors->has('description')) <div class="invalid-feedback">{{ $errors->first('description') }}</div>@endif
           </div>
           
           <div class="col-md-12">
           <label for="">Category</label>
           <select class="form-control @error('category_id') is-invalid @enderror"  name="category_id">
                                <option value="">Select category</option>
                                      @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                
                            </select>
                            @if ($errors->has('category_id')) <div class="invalid-feedback">{{ $errors->first('category_id') }}</div>@endif
           
           </div>

           <div class="col-md-12">
            <label for="image">image</label>
            <input type="file" name="image" id="" class="form-control @error('image') is-invalid @enderror" aria-describedby="helpId" accept="image/*">
            @if ($errors->has('image')) <div class="invalid-feedback">{{ $errors->first('image') }}</div>@endif
           </div>

           <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Submit</button>
           </div>
        </div>
      </form>
    </div>

</div>

@endsection