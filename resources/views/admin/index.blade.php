@extends('layouts.admin')

@section('content')

<div class="card">
<div class="card-header">
<h1>Dashboard</h1>
    </div>
    <div class="card-body">
        <div class="row">
        <div class="col-md-6">
            <h3>Total Categories</h3>
            <h5>{{$categories}}</h5>
        </div>
        <div class="col-md-6">
            <h3>Total Products</h3>
            {{$products}}
        </div>
        </div>
      
    </div>

</div>

@endsection