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
              <a class="nav-link active " aria-current="true" href="#">List of Properties </a>
            </li>
          
           
          </ul>
    <div class="card-body">
    
        <form action="{{route('rent_property')}} " method="POST" >
            @csrf

            <label class="form-label" >Property : </label>
            <select class="form-select form-control col-lg-3" aria-label="Default select example" name="property">
                <option selected>Select Property</option>

                @foreach ($properties as $property)
                <option value="{{$property->id}} ">{{$property->name}}</option>
                @endforeach    
                
            </select>

            <label class="form-label">Tenant : </label>
            <select class="form-select form-control col-lg-3" aria-label="Default select example" name="tenant">
                <option selected>Select Tenant</option>

                @foreach ($tenants as $tenant)
                <option value="{{$tenant->id}} ">{{$tenant->name}} </option>
                @endforeach

              </select>

              <label class="form-label">End of Contract Date : </label>
              <input class="form-select form-control col-lg-3"
               type="date" id="birthday" name="close_date">

            <label class="form-label">Rent Type : </label>
            <select class="form-select form-control col-lg-3" aria-label="Default select example" name="rent_type">
                <option selected>Select Type</option>
                <option value="Monthly">Monthly </option>
                <option value="Yearly">Yearly </option>
              </select>
            <label class="form-label">Rent amount : </label>
            <input type="text" class="form-control col-lg-3" placeholder="..." name="rent_amount"> 
            
         <!--   <label class="form-label">Close date : </label>
            <input type="text" class="form-control col-lg-3" placeholder="..." name="close_date"> -->
       
 
            <button type="submit" class="btn btn-primary mt-5 "> Add Property</button>
            <a class="btn btn-secondary mt-5" href=" #">back</a>

        </form>


    </div>
</div>
@stop