@extends('adminlte::page')


@section('content_header')
  <h3 class="m-3">Occupied Properties</h3><hr>
@stop

@section('content')

@if (Session::has('success'))
    <div class="alert alert-success">
        {{Session::get('success')}}    
    </div>
@endif


<div class="container bg-white p-4">

  <div class="row">
    <label class="form-label mr-3">Search : </label>
    
    <input type="text" class="form-control col-lg-3" name="search" placeholder="Search ...">
    <button class="btn btn-success ml-2"> Search</button>
  </div>
  
    <table class="table table-bordered table-striped table-sm text-center mt-3 ">
        <thead>
            <tr>
                <th> ID</th>
                <th>Date</th>
                <th>Tenant's name</th>
                <th>Property</th>
                <th>Rent Type</th>
                <th>Amount</th>
                <th>Contract</th>
                <th>Close Date</th>
                <th>Action</th>

            </tr>
        </thead>

        <tbody>
          @foreach ($contracts as $contract)
              <tr>
                <td>{{$contract->id}} </td>
                <td>{{$contract->date}} </td>
                <td> {{$contract->tenant->name}} </td>
                <td>{{$contract->property->name}} </td>
                <td>{{$contract->rent_type}} </td>
                <td>{{$contract->rent_amount}} DH</td>
                <td>
                  <img src=" {{asset('contracts/'.$contract->image)}} " class="rounded" style="max-width:50px; max-height:50px;">
                </td>
                <td>{{$contract->close_date}} </td>
                <td>
                  <a href="/rented_property/{{$contract->id}}"  class="btn btn-success btn-sm"><i class="fa fa-eye fa-sm"></i> </a>
                  <a href="#" class="btn btn-danger btn-sm"><i class="fa fa-trash fa-sm"></i> </a>

                </td> 
              </tr>
          @endforeach
        </tbody>
    </table>
</div>



@stop

