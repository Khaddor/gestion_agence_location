@extends('adminlte::page')


@section('content_header')
@stop

@section('content')

@if (Session::has('success'))
    <div class="alert alert-success">
        {{Session::get('success')}}    
    </div>
@endif


<div class="container bg-white p-4  ">
  <h3 class=""><b> Occupied Properties :</b></h3><hr>

  <div class="row mt-4" id="searchDiv" style="display: none;">
    <label class="form-label  mr-3">Search : </label>
    <input type="text" class="form-control form-control-sm col-lg-3" name="search" id="search" placeholder="Search ...">
  </div>
  <button class="btn btn-success mt-4 col-2" id="searchBtn"> Search</button>
  <button class="btn btn-primary mt-4 " ><b>PDF</b></button>

  
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
    <div class="float-right">
      {{$contracts->links()}}
    </div>



</div>



@stop
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<script type="text/javascript">


$(document).ready(function(){

  $('#searchBtn').click(function(){
    $('#searchDiv').slideDown()
    $('#searchBtn').fadeOut()
  });

});


</script>
