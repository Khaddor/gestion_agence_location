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

<div class="container">
          <ul class="nav nav-tabs">
            <li class="nav-item">
              <a class="nav-link " aria-current="true" href="/properties">List of Properties </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="{{route('property_add')}} ">Add property</a>
            </li>
           
          </ul>
    <div class="card-body">
    
        <form action="{{route('property.store')}} " method="POST" >
            @csrf

            <label class="form-label" >Name : </label>
            <input type="text" class="form-control col-lg-3" placeholder="Property name" name="name">
            <label class="form-label">City : </label>
            <input type="text" class="form-control col-lg-3" placeholder="Property city" name="city">
            <label class="form-label">Address : </label>
            <input type="text" class="form-control col-lg-3" placeholder="Property address" name="address">   
            <label class="form-label">Type : </label>
            <input type="text" class="form-control col-lg-3" placeholder="Property type" name="type"> 
            <label class="form-label"> Description :</label>
            <textarea type="text"  class="form-control col-lg-4 "
             rows="4" cols="50" placeholder="Property description ..." name="description"></textarea>
            <button type="submit" class="btn btn-primary mt-5 "> Add Property</button>
            <a class="btn btn-secondary mt-5" href=" {{route('properties_index')}} ">back</a>

        </form>


    </div>
</div>
@stop