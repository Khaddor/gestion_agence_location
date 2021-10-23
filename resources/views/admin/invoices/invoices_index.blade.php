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

    <h3 ><b>Invoices : </b></h3><hr>

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
                <th>Number</th>
                <th>Property</th>
                <th>Tenant</th>
                <th>Date</th>
                <th>Rent Type</th>
                <th>Amount</th>
                <th>Payment Date</th>
                <th>Action</th>

            </tr>
        </thead>

        
            <tbody>
                @foreach ($invoices as $invoice)
                            <tr>
                                <td>{{$invoice->id}}</td>
                                <td>{{$invoice->number}}</td>
                                <td>{{$invoice->property->name}}</td>
                                <td>{{$invoice->tenant->name}}</td>
                                <td>{{$invoice->date}}</td>
                                <td>{{$invoice->rent_type}}</td>
                                <td>{{$invoice->amount}} DH</td>
                                <td>{{$invoice->payment_date}}</td>              
                                    <td> 
                                    <a href="#" class="btn btn-info btn-sm"><i class="fa fa-edit fa-sm"></i> </a>
                                    <a href="# " onclick="return confirm('Are you sure?')"  class="btn btn-danger btn-sm"><i class="fa fa-trash fa-sm"></i> </a>
            
                                    </td>
                            </tr>         
                @endforeach
                    
            </tbody>
            
            
    
</table>

    <div class="float-right">
        {{ $invoices->links() }}
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