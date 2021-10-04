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
              <a class="nav-link active" href="#">Edit Tenant</a>
            </li>
           
          </ul>
    <div class="card-body">
    
        <form action="{{route('tenant.edit')}} " method="POST" >
            @csrf

            <input type="hidden" value=" {{$tenant->id}} " name = "id">

            <label class="form-label" >Name : </label>
            <input value="{{$tenant->name}} " type="text" class="form-control col-lg-3" placeholder="Tenant name" name="name" >
            
            <label class="form-label">Number : </label>
            <input value=" {{$tenant->phone_number}} " type="text" class="form-control col-lg-3" placeholder="Tenant number" name="number">
            
            <label class="form-label">Email : </label>
            <input  value="{{$tenant->email}} " type="text" class="form-control col-lg-3" placeholder="Tenant email" name="email">   
            
            <label class="form-label">Address : </label>
            <textarea type="text"  class="form-control col-lg-3 "
            rows="4" cols="50" placeholder="address ..." name="address">{{$tenant->address}} </textarea>

            <label class="form-label"> City :</label>
            <input value="{{$tenant->city}} " type="text" class="form-control col-lg-3" placeholder="Tenant city" name="city"> 
           
             <button type="submit" class="btn btn-primary mt-5 "> Edit Tenant</button>
            <a class="btn btn-secondary mt-5" href="{{route('tenants_index')}} ">back</a>

        </form>


    </div>
</div>
@stop