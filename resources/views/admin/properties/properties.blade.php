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


<div class="container bg-white p-4  ">

        <div class="">
          <ul class="nav nav-tabs ">
            <li class="nav-item">
              <a class="nav-link active" aria-current="true" href="/properties">List of Properties </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('property_add')}} ">Add property</a>
            </li>
           
          </ul>
        </div>

        <div class="row mt-4" id="searchDiv" style="display: none;">
          <label class="form-label  mr-3">Search : </label>
          <input type="text" class="form-control form-control-sm col-lg-3" name="search" id="search" placeholder="Search ...">
        </div>
        <button class="btn btn-success mt-4 col-2" id="searchBtn"> Search</button>
        <button class="btn btn-primary mt-4 " ><b>PDF</b></button>

       
        
    <table class="table table-bordered table-striped table-sm mt-3 p-0 " role="grid">
        <thead>
            <tr>
                <th  class="text-center"> ID</th>
                <th class="text-center">Name</th>
                <th class="text-center">City</th>
                <th class="text-center">Address</th>
                <th class="text-center">Type</th>
                <th class="text-center">Description</th>
                <th class="text-center">Availbality</th>
                <th class="text-center">Action</th>

            </tr>
        </thead>

        <tbody>
@foreach ($properties as $property)
    <tr>
        <td class="text-center">{{$property->id}} </td>
        <td class="text-center"> {{$property->name}} </td>
        <td class="text-center"> {{$property->city}} </td>
        <td class="text-center">  {{Str::limit($property->address, 20)}} </td>
        <td class="text-center">  {{Str::limit($property->type, 20)}} </td>
        <td class="text-center"> {{Str::limit($property->description, 20)}}</td>
        
        @if ($property->isRented ==0)
                <td class="text-center" > <span class="badge badge-success"> Vaccant</span> </td>
        @else
                <td class="text-center" > <span class="badge badge-danger"> Occupied</span> </td>
        @endif
        <td  class="text-center" style="width: 110px"> 
              <!-- Button trigger modal -->
        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal{{$property->id}}">
                <i class="fa fa-eye fa-sm"></i>
        </button>
            <a class="btn btn-success btn-sm " href="/properties/edit/{{$property->id}} "> <i class="fa fa-edit fa-sm"></i></a>
       <button class="btn btn-danger btn-sm"><i class="fa fa-trash fa-sm"></i></button>
          </td>
    </tr>





    <!-- Modal -->
<div class="modal fade" id="exampleModal{{$property->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Property Details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="card mb-3" style="max-width: 540px;">
            <div class="row no-gutters">
              <div class="col-md-4">
                <img src=" {{asset('propertiesImages/'.$property->image)}} " class="rounded" style="max-width:100%; max-height:100%;">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">Property ID :   </h5><span class="badge badge-primary">   {{  $property->id}} </span>
                  <br><br>
                  <h5 class="card-title">Property Name : </h5><br>
                  <p>{{$property->name}} </p>
                  <h5 class="card-title">Property City : </h5><br>
                  <p>{{$property->City}} </p>
                  <h5 class="card-title">Property Address : </h5><br>
                  <p>{{$property->address}} </p>
                  <h5 class="card-title">Property Type : </h5><br>
                  <p>{{$property->type}} </p>
                  <h5 class="card-title">Property Description : </h5><br>
                  <p>{{$property->description}} </p>
                  <h5 class="card-title">Property Availbality : </h5><br>
                  <span class="badge badge-{{$property->isRented == 0 ?'success':'danger'}} ">{{$property->isRented == 0 ? 'Vaccant' : 'Occupied'}} </span>
                  <br>
                  <p class="card-text"><small class="text-muted">Property Up to date</small></p>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

@endforeach
            
        </tbody>
    </table>

    <div class="float-right">
      {{$properties->links()}}
    </div>

</div>



@stop
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script type="text/javascript">

$(document).ready(function(){
    $('#searchBtn').click(function(){
        $('#searchDiv').fadeIn()
        $('#searchBtn').fadeOut()
    });
});

</script>

