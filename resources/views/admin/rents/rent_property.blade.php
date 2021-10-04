@extends('adminlte::page')

@section('content_header')
    <h2 class="m-3"> Rent a Property</h2><hr>
@stop

@section('content')
    
@if (Session::has('success'))
    <div class="alert alert-success">
        {{Session::get('success')}}    
    </div>
@endif

<div class="container bg-white p-4">
      <!--    <ul class="nav nav-tabs">
            <li class="nav-item">
              <a class="nav-link active " aria-current="true" href="#">Rent a Property </a>
            </li>-->
          
           
          </ul>
    <div class="card-body">
    
        <form action="{{route('rent_property')}} " method="POST" enctype="multipart/form-data">
            @csrf

            <label class="form-label" >Property : </label>
            <select class="form-select form-control col-lg-5" aria-label="Default select example" name="property" required>
                <option selected>Select Property</option>

                @foreach ($properties as $property)
                <option value="{{$property->id}} ">{{$property->name}}</option>
                @endforeach    
                
            </select>

            <label class="form-label">Tenant : </label>
            <select class="form-select form-control col-lg-5" aria-label="Default select example" name="tenant" required>
                <option selected>Select Tenant</option>

                @foreach ($tenants as $tenant)
                <option value="{{$tenant->id}} ">{{$tenant->name}} </option>
                @endforeach

              </select>

              <label class="form-label">End of Contract Date : </label>
              <input class="form-select form-control col-lg-5"
               type="date" id="birthday" name="close_date" required>

            <label class="form-label">Rent Type : </label>
            <select class="form-select form-control col-lg-5" aria-label="Default select example" name="rent_type" required>
                <option selected>Select Type</option>
                <option value="Monthly">Monthly </option>
                <option value="Yearly">Yearly </option>
              </select>

            <label class="form-label">Rent amount : </label>
            <input type="file" class="form-control-file col-lg-5"   name="image"> 

            <label class="form-label">Rent amount : </label>
            <input type="text" class="form-control col-lg-5" placeholder="MAD " name="rent_amount"  required> 
            
         <!--   <label class="form-label">Close date : </label>
            <input type="text" class="form-control col-lg-3" placeholder="..." name="close_date"> -->
       
 
            <button type="submit" class="btn btn-primary float-left mt-5 "> Rent Property</button>

        </form>


    </div>
</div>
@stop