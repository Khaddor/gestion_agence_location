@extends('adminlte::page')


@section('content_header')
    <h1>Dashboard</h1><hr>
@stop

@section('content')



<div class="container p-2">
    <div class="row">
        <div class="info-box col-lg-3 ml-5">
            <!-- Apply any bg-* class to to the icon to color it -->
            <span class="info-box-icon bg-blue"><i class="fa fa-users"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Tenants</span>
              <span class="info-box-number">{{$tenant_count}} </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          
          <!-- /.info-box -->
          <!-- Apply any bg-* class to to the icon to color it -->
          <div class="info-box col-lg-3 ml-5" >
            <span class="info-box-icon bg-green"><i class="fa fa-building"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Properties Vaccant</span>
              <span class="info-box-number">{{$property_vaccant_count}} </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->

          <div class="info-box col-lg-3 ml-5">
            <!-- Apply any bg-* class to to the icon to color it -->
            <span class="info-box-icon bg-red"><i class="fa fa-building"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Properties Occupied</span>
              <span class="info-box-number">{{$property_occupied_count}} </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
     </div>
    </div>

    




@stop

