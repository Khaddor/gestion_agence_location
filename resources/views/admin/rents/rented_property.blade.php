@extends('adminlte::page')


@section('content_header')
  <h3 class="m-3">Contract</h3><hr>
@stop

@section('content')


<div class="container">

  <div class="row">
    

    <div class="col-lg-6 bg-white p-4 " style=" border-right: 1px solid #333;">
        <h3>Property Information :</h3><hr>


        <table class="table table-bordered table-striped text-center">
            <tr>
              <th >Property ID</th>
              <td>{{$contract->property->id}} </td>
            </tr>
            <tr>
              <th>Property Name</th>
              <td>{{$contract->property->name}} </td>
            </tr>
            <tr>
              <th>Property City</th>
              <td>{{$contract->property->city}} </td>
            </tr>
            <tr>
              <th>Property Address</th>
              <td>{{$contract->property->address}} </td>
            </tr>
            <tr>
              <th>Property Type</th>
              <td>{{$contract->property->type}} </td>
            </tr>
            <tr>
              <th>Property Description</th>
              <td>{{$contract->property->description}} </td>
            </tr>

          </table>
          <img src="{{asset('propertiesImages/'.$contract->property->image)}} " class="img-circle float-right" style="max-width:100px;">
          <img src="{{asset('propertiesImages/'.$contract->property->image)}} " class="img-circle float-right" style="max-width:100px;">


       <!-- <div class="card-body" >
          <h5 class="card-title" ><b>Property ID :  </b><span class="badge badge-primary">   {{  $contract->property->id}} </span> </h5>
          <br><br>
          <h5 class="card-title"><b> Property Name :</b> <span>{{$contract->property->name}} </span></h5><br>
          <br>
          <h5 class="card-title"><b>Property City : </h5></b><span>{{$contract->property->city}} </span><br>
          <br>
          <h5 class="card-title"><b>Property Address : </b><span>{{$contract->property->address}} </span></h5><br>
          <br>
          <h5 class="card-title"><b>Property Type : </b><span>{{$contract->property->type}} </span></h5><br>
          <br>
          <h5 class="card-title"><b>Property Description : </b><span>{{$contract->property->description}} </span></h5><br>
          <img src="{{asset('propertiesImages/'.$contract->property->image)}} " class="rounded float-left mt-5" style="max-width:200px;">
         
          
        </div>-->
    </div>
    <div class="col-lg-6 bg-white p-4">
      <h3>Tenant Information :</h3><hr>

  <!--      <div class="card-body">
            <h5 class="card-title"><b>Tenant ID :  </b><span class="badge badge-success">   {{  $contract->tenant->id}} </span> </h5>
            <br><br>
            <h5 class="card-title"><b> Tenant Name :</b> <span>{{$contract->tenant->name}} </span></h5><br>
            <br>
            <h5 class="card-title"><b> Tenant Number :</b> <span>{{$contract->tenant->phone_number}} </span></h5><br>
            <br>
            <h5 class="card-title"><b> Tenant Email :</b> <span>{{$contract->tenant->email}} </span></h5><br>
            <br>
            <h5 class="card-title"><b> Tenant Address :</b> <span>{{$contract->tenant->address}} </span></h5><br>
            <br>
            <h5 class="card-title"><b> Tenant City :</b> <span>{{$contract->tenant->city}} </span></h5><br>
            
           
            
          </div>-->


          <table class="table table-bordered table-striped text-center">
            <tr>
              <th>Tenant ID</th>
              <td>{{$contract->tenant->id}} </td>
            </tr>
            <tr>
              <th>Tenant Name</th>
              <td>{{$contract->tenant->name}} </td>
            </tr>
            <tr>
              <th>Tenant Number</th>
              <td>{{$contract->tenant->phone_number}} </td>
            </tr>
            <tr>
              <th>Tenant Email</th>
              <td>{{$contract->tenant->email}} </td>
            </tr>
            <tr>
              <th>Tenant Address</th>
              <td>{{$contract->tenant->address}} </td>
            </tr>
            <tr>
              <th>Tenant City</th>
              <td>{{$contract->tenant->city}} </td>
            </tr>

          </table>
    </div>
  </div>

<div class="row pb-5 bg-white p-4">
    <div class="col-lg-6 ">

     <h3>Contract Information</h3><hr><br>
    <!--   <h5 class="card-title"><b>Contract ID :  </b><span class="badge badge-info">   {{  $contract->id}} </span> </h5>
      <br><br>
      <h5 class="card-title"><b> Contract Date :</b> <span>{{$contract->date}} </span></h5><br>
      <br>
      <h5 class="card-title"><b> Rent Type :</b> <span>{{$contract->rent_type}} </span></h5><br>
      <br>
      <h5 class="card-title"><b> Rent amount :</b> <span>{{$contract->rent_amount}} DH </span></h5><br>
      <br>
      <h5 class="card-title"><b> Contract Close Date :</b> <span>{{$contract->close_date}} </span></h5><br>
      <br>-->
      <table class="table table-bordered table-striped text-center">
          <tr>
            <th>Contract ID</th>
            <td>{{$contract->id}} </td>
          </tr>
          <tr>
            <th>Contract Date</th>
            <td>{{$contract->date}} </td>
          </tr>
          <tr>
            <th>Rent Type</th>
            <td>{{$contract->rent_type}} </td>
          </tr>
          <tr>
            <th>Rent amount </th>
            <td>{{$contract->rent_amount}} </td>
          </tr>
          <tr>
            <th>Contract Close Date</th>
            <td>{{$contract->close_date}} </td>
          </tr>
      </table>
    </div>
    <div class="col-lg-4 mt-5">
      <img src="{{asset('contracts/'.$contract->image)}} " class="rounded float-left mt-5" style="max-width:200px;">

    </div>
  </div>
  <a href="/rented_properties" class="btn btn-secondary"> Back</a><br><br>
</div>

@stop

