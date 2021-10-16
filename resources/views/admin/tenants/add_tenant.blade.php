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
        <h4><b>Add New Tenant :</b></h4><hr>
    <form action="{{route('tenant.store')}} " method="POST" >
            @csrf
            <div class="row  mt-2">
              <div class="col-lg-6">
                <label class="form-label " >Name : </label>
                <input type="text" class="form-control col-lg-10" placeholder="Tenant name" name="name" required>    
              </div>
           
              <div class="col-lg-6">
                <label class="form-label ">Number : </label>
                <input type="text" class="form-control col-lg-10 " placeholder="Tenant number" name="number"required>     
              </div>
            </div>
              
            <div class="row mt-2">
              <div class="col-lg-6">
                <label class="form-label">Email : </label>
                <input type="text" class="form-control col-lg-10" placeholder="Tenant email" name="email" required>   
              </div>

              <div class="col-lg-6 ">
                <label class="form-label"> City :</label>
                <input type="text" class="form-control col-lg-10" placeholder="Tenant city" name="city" required> 
              </div>
             
            </div>
            


              <div class="mt-2">
                <label class="form-label">Address : </label>
                <textarea type="text"  class="form-control col-lg-6 "
                rows="4" cols="50" placeholder="address ..." name="address" required></textarea>
              </div>


           
             <button type="submit" class="btn btn-primary mt-5 "> Add Tenant</button>
            <a class="btn btn-secondary mt-5" href="{{route('tenants_index')}} ">back</a>


    </form>


    </div>
</div>
@stop