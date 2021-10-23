@extends('adminlte::page')

@section('content_header')
    <h2 class="m-3"> Rent a Property</h2><hr>

@stop

@section('content')

@if (Session::has('success'))
    <div class="alert alert-success">
        {{Session::get('success')}}    
    </div>
@endif

<div class="container bg-white p-4">
      <!--    <ul class="nav nav-tabs">
            <li class="nav-item">
              <a class="nav-link active " aria-current="true" href="#">Rent a Property </a>
            </li>
          </ul>-->

<div class="row">
    <div class="col-lg-5" style="border-right: 1px solid black;">
        <div class="card-body">
            
                <form action="{{route('rent_property')}} " method="POST" enctype="multipart/form-data">
                    @csrf

                    <label class="form-label" >Property : </label>
                    <select class="form-select form-control " id="property" aria-label="Default select example" name="property" required>
                        <option selected>Select Property</option>

                        @foreach ($properties as $property)
                        <option value="{{$property->id}} ">{{$property->name}}</option>
                        @endforeach    
                        
                    </select>

                    <label class="form-label">Tenant : </label>
                    <select class="form-select form-control " id="tenant" aria-label="Default select example" name="tenant" required>
                        <option selected>Select Tenant</option>

                        @foreach ($tenants as $tenant)
                        <option value="{{$tenant->id}} ">{{$tenant->name}} </option>
                        @endforeach

                    </select>

                    <label class="form-label">End of Contract Date : </label>
                    <input class="form-select form-control "
                    type="date" id="birthday" name="close_date" required>

                    <label class="form-label">Rent Type : </label>
                    <select class="form-select form-control " aria-label="Default select example" name="rent_type" required>
                        <option selected>Select Type</option>
                        <option value="Monthly">Monthly </option>
                        <option value="Yearly">Yearly </option>
                    </select>

                    <label class="form-label">Contract Photo : </label>
                    <input type="file" class="form-control-file "   name="image"> 

                    <label class="form-label">Rent amount : </label>
                    <input type="text" class="form-control " placeholder="MAD " name="rent_amount"  required> 
                    
                <!--   <label class="form-label">Close date : </label>
                    <input type="text" class="form-control col-lg-3" placeholder="..." name="close_date"> -->
            
        
                    <button type="submit" class="btn btn-primary float-left mt-5 "> Rent Property</button>

                </form>


            </div>
    </div>
    <div class="col-lg-7">
        <h4><b> Property Information</b></h4>
          <!--  <div class="card-body">
                    <img src="#" id="property_image" class="img-circle float-right" style="max-width:150px;">

                    <h5 class="card-title"><b>Property ID :  </b><span id="property_id">----------</span></h5>
                    <br><br>
                    <h5 class="card-title"><b> Property Name :</b> <span id="property_name">---------- </span></h5><br>
                    <br>
                    <h5 class="card-title"><b> Property Type :</b> <span id="property_type">----------</span></h5><br>
                    <br>
                    <h5 class="card-title"><b> Property City :</b> <span id="property_city"> ----------</span></h5><br>
                    <br>
                    <h5 class="card-title"><b> Property Address :</b> <span id="property_address"> ----------</span></h5><br>
                    <br>
              
                
    
               
            </div> <hr>-->
         <div class="card-body">
            <table class="table table-bordered  text-center">
                <tr>
                  <th >Property ID</th>
                  <td id="property_id">------ </td>
                </tr>
                <tr>
                  <th>Property Name</th>
                  <td id="property_name">------ </td>
                </tr>
                <tr>
                  <th>Property City</th>
                  <td id="property_city">------ </td>
                </tr>
                <tr>
                  <th>Property Address</th>
                  <td id="property_address">------ </td>
                </tr>
                <tr>
                  <th>Property Type</th>
                  <td id="property_type">------ </td>
                </tr>
              </table> 
             <div class="container"> <img src="#" id="property_image" class="img-circle" style="max-width:100px;"></div>
            </div>
            <hr>
        <h4><b> Tenant Information</b></h4>
        <div class="card-body">

         <!--   <h5 class="card-title"><b>Tenant ID :  </b><span id="tenant_id"> --------</span></h5>
            <br><br>
            <h5 class="card-title"><b> Tenant Name :</b> <span id="tenant_name">-------- </span></h5><br>
            <br>
            <h5 class="card-title"><b> Tenant Number :</b> <span id="tenant_number">--------</span></h5><br>
            <br>
            <h5 class="card-title"><b> Tenant Email :</b> <span id="tenant_email"> --------</span></h5><br>
            <br>
            <h5 class="card-title"><b> Tenant Address :</b> <span id="tenant_address"> --------</span></h5><br>
            <br>
            <h5 class="card-title"><b> Tenant City :</b> <span id="tenant_city"> --------</span></h5><br>
         -->
         <table class="table table-bordered  text-center">
            <tr>
              <th >Tenant ID</th>
              <td id="tenant_id">------ </td>
            </tr>
            <tr>
              <th>Tenant Name</th>
              <td id="tenant_name">------ </td>
            </tr>
            <tr>
              <th>Tenant Number</th>
              <td id="tenant_number">------ </td>
            </tr>
            <tr>
              <th>Property Address</th>
              <td id="tenant_address">------ </td>
            </tr>
            <tr>
              <th>Property Email</th>
              <td id="tenant_email">------ </td>
            </tr>
            <tr>
                <th>Property City</th>
                <td id="tenant_city">------ </td>
              </tr>
          </table> 
         
        </div><hr>
        
          
</div>
@stop
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script type="text/javascript">

    $(document).ready(function(){

        /*OnChange Tenant **/
        $('#tenant').change(function(e){
            e.preventDefault();

            var tenant_id = $('#tenant').val();
            /// alert(tenant_id);


        $.ajax({
            url: 'getTenant/'+tenant_id,
            type : 'GET',
            dataType : 'json',
            success : function (response){
                $('#tenant_id').html(response.id);
                $('#tenant_name').html(response.name);
                $('#tenant_city').html(response.city);
                $('#tenant_address').html(response.address);
                $('#tenant_email').html(response.email);
                $('#tenant_number').html(response.number);


            }
        });


        });


        /** OnChange Property**/
        $('#property').change(function(e){
            e.preventDefault();

            var property_id = $('#property').val();


            $.ajax({
                url : 'getProperty/'+property_id,
                type : 'GET',
                dataType : 'json',
                success : function(response){

                $('#property_id').html(response.property.id);
                $('#property_name').html(response.property.name);
                $('#property_city').html(response.property.city);
                $('#property_address').html(response.property.address);
                $('#property_type').html(response.property.type);
                $('#property_image').attr('src' , 'propertiesImages/' + response.property.image);


                }


            });
        })
    });

</script>