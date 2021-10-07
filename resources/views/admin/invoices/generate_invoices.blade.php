@extends('adminlte::page')


@section('content_header')

    <h1><b>  Generate Invoices</b></h1><hr>
@stop

@section('content')

    <div class="container">
        
        <h3>Select Property</h3><hr><br>
        <div class="form-group">
            <div class="row" id="contractDiv">
                <label class=" col-lg-2 mt-2 "> Select Property :</label>
                <select id="property" class="form-select form-control col-lg-4 " aria-label="Default select example">
                    <option selected>Open this select menu</option>
                        @foreach ($contracts as $contract)
                             <option value="{{$contract->id}} ">{{$contract->property->name}}</option>
                        @endforeach
                  </select>

            </div><br>
           

          
        </div>
    <div id="tableDiv" style="display: none">
        <h4><b>Contract Info : </b></h4><br>
            <table class="table table-bordered table-striped text-center"  id="table">

                <thead>
                    <tr>
                        <th>#</th>
                        <th>Property</th>
                        <th>Tenant</th>
                        <th>Date</th>
                        <th>Amount</th>

                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table><br><br>

            <h3>Select Invoice's Date</h3><hr><br>
            <form action="{{route('generate_pdf')}} " method="POST">
                @csrf
                
                 <div class="row" id="dateDiv" style="display: none;">
              
                    <label class="form-label mt-2 col-2">Invoice's Date : </label>
                    <input class="form-select form-control col-4"
                    type="date" id="date" name="date"  required> 
                    <input type="hidden" name="contract_id" id="contract_id">
                    <button class="btn btn-success ml-3" id="generateBtn" type="submit">Generate Invoice</button>
                </div>
    
            </form>
               

    </div>
     
    </div>

@stop
<meta name="csrf-token" content="{{ csrf_token() }}" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script type="text/javascript">

$(document).ready(function(){
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');


    $('#property').change(function(e){
        e.preventDefault();
        $('#tableDiv').fadeIn();
        $('#dateDiv').fadeIn();
        $('#contractDiv').fadeOut();

        var id = $('#property').val();
        $.ajax({
            url : '/generate_invoices/'+id,
            type : 'GET',
            dataType : 'json',
            success : function(response){
                row = " <tr><td>"+response.contract.id+"</td><td>"+response.pName+"</td><td>"+response.tName+"</td><td>--------</td><td>"+response.amount+"</td></tr> ";
                $('#table').append(row);
                 $('#contract_id').val(response.contract.id);
            }
        });
        

    });

   /* $('#generateBtn').submit(function(){
        var date = $('#date').val();
        var property_id = $('#property').val();
        var x = '5';
        $.ajax({
            url : '{{route('generate_pdf')}}',
            type : 'POST',
            data : {property_id},
            dataType : 'json',
            success : function(response){
                console.log('success');
            }
        });
     

    });*/

});

</script>