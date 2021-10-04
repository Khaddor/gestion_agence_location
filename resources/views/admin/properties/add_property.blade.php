@extends('adminlte::page')

@section('content_header')
<p></p>
@stop

@section('content')
    
@if (Session::has('success'))
    <div class="alert alert-success">
        {{Session::get('success')}}    
    </div>
@endif

<div class="container bg-white p-4">
          <ul class="nav nav-tabs">
            <li class="nav-item">
              <a class="nav-link " aria-current="true" href="/properties">List of Properties </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="{{route('property_add')}} ">Add property</a>
            </li>
           
          </ul>
    <div class="card-body">
    
        <form action="{{route('property.store')}} " method="POST" enctype="multipart/form-data">
            @csrf

            <label class="form-label" >Name : </label>
            <input type="text" class="form-control col-lg-5" placeholder="Property name" name="name" required>
            <label class="form-label">City : </label>
            <input type="text" class="form-control col-lg-5" placeholder="Property city" name="city" required>
            <label class="form-label">Address : </label>
            <input type="text" class="form-control col-lg-5" placeholder="Property address" name="address" required>   
            <label class="form-label">Type : </label>
            <input type="text" class="form-control col-lg-5" placeholder="Property type" name="type" required> 
            <label class="form-label"> Upload Image :</label> 
            <input type="file"  class="form-control col-lg-5" name="image" required>
            <label class="form-label"> Description :</label>
            <textarea type="text"  class="form-control col-lg-5 "
             rows="4" cols="50" placeholder="Property description ..." name="description"></textarea>
            <button type="submit" class="btn btn-primary mt-5 "> Add Property</button>
            <a class="btn btn-secondary mt-5" href=" {{route('properties_index')}} ">back</a>

        </form>


    </div>
</div>
@stop