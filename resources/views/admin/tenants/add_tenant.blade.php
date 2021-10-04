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
              <a class="nav-link " aria-current="true" href="/tenants">List of Tenants </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="#">Add Tenant</a>
            </li>
           
          </ul>
    <div class="card-body">
    
        <form action="{{route('tenant.store')}} " method="POST" >
            @csrf

            <label class="form-label" >Name : </label>
            <input type="text" class="form-control col-lg-5" placeholder="Tenant name" name="name">
            
            <label class="form-label">Number : </label>
            <input type="text" class="form-control col-lg-5" placeholder="Tenant number" name="number">
            
            <label class="form-label">Email : </label>
            <input type="text" class="form-control col-lg-5" placeholder="Tenant email" name="email">   
            
            <label class="form-label">Address : </label>
            <textarea type="text"  class="form-control col-lg-5 "
            rows="4" cols="50" placeholder="address ..." name="address"></textarea>

            <label class="form-label"> City :</label>
            <input type="text" class="form-control col-lg-5" placeholder="Tenant city" name="city"> 
           
             <button type="submit" class="btn btn-primary mt-5 "> Add Tenant</button>
            <a class="btn btn-secondary mt-5" href="{{route('tenants_index')}} ">back</a>

        </form>


    </div>
</div>
@stop