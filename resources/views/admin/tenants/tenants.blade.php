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
    

<div class="container  bg-white p-4">

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

        <div class="row mt-4" id="searchDiv" style="display: none;">
          <label class="form-label  mr-3">Search : </label>
          
          <input type="text" class="form-control form-control-sm col-lg-3" name="search" id="search" placeholder="Search ...">
        </div>
        <button class="btn btn-success mt-4 col-2" id="searchBtn"> Search</button>
        <button class="btn btn-primary mt-4 " ><b>PDF</b></button>

        
    <table class="table table-bordered table-striped table-sm text-center mt-2" id="table">
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
                <td>{{Str::limit($tenant->address, 20)}} </td>
                <td>{{$tenant->city}} </td>
                <td> 
                  <a href="{{route('index_edit' , $tenant->id)}} " class="btn btn-info btn-sm"><i class="fa fa-edit fa-sm"></i> </a>
                  <a href="{{route('tenant.delete' , $tenant->id)}} " onclick="return confirm('Are you sure?')"  class="btn btn-danger btn-sm"><i class="fa fa-trash fa-sm"></i> </a>

                </td>
            </tr>
          @endforeach
            
        </tbody>
    </table>
        
    <div class="float-right">
        {{$tenants->links()}}   
      </div> 
</div>



@stop
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<script type="text/javascript">

$(document).ready(function(){

  $('#search').keyup(function(){
      var search = $('#search').val();

    $.ajax({
        url : '/search_tenants',
        type : 'GET',
        data : {'search':search},
        success : function(response){
            $('tbody').html(response);
        }


    });
  });

$('#searchBtn').click(function (){
      $('#searchBtn').hide();
      $('#searchDiv').fadeIn();
});



});



</script>
<script type="text/javascript">
  $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script>