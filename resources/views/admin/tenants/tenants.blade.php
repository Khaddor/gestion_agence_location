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

        <div class="">
          <ul class="nav nav-tabs ">
            <li class="nav-item">
              <a class="nav-link active" aria-current="true" href="/tenants">List of Tenants </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('tenant_add')}} ">Add Tenant</a>
            </li>
           
          </ul>
        </div>
    <div class="card-body">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th> ID</th>
                <th>Name</th>
                <th>Number</th>
                <th>Email</th>
                <th>Address</th>
                <th>city</th>
                <th>Action</th>

            </tr>
        </thead>

        <tbody>
          @foreach ($tenants as $tenant)
            <tr>
                <td>{{$tenant->id}} </td>
                <td>{{$tenant->name}} </td>
                <td>{{$tenant->phone_number}} </td>
                <td>{{$tenant->email}} </td>
                <td>{{$tenant->address}} </td>
                <td>{{$tenant->city}} </td>
                <td> 
                  <a href="{{route('index_edit' , $tenant->id)}} " class="btn btn-info btn-sm"><i class="fa fa-edit fa-sm"></i> </a>
                  <a href="{{route('tenant.delete' , $tenant->id)}} " onclick="return confirm('Are you sure?')"  class="btn btn-danger btn-sm"><i class="fa fa-trash fa-sm"></i> </a>

                </td>
            </tr>
          @endforeach
            
        </tbody>
    </table>
</div>



@stop

