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
              <a class="nav-link active" aria-current="true" href="#">List of Properties </a>
            </li>
          </ul>
        </div>
    <div class="card-body">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th> ID</th>
                <th>Date</th>
                <th>Tenant's name</th>
                <th>Property</th>
                <th>Rent Type</th>
                <th>Amount</th>
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
                <td>{{$contract->rent_amount}} </td>
                <td>{{$contract->close_date}} </td>
                <td>XXXX</td>
              </tr>
          @endforeach
        </tbody>
    </table>
</div>



@stop

