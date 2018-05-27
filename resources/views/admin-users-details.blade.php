@extends('layouts.whistle-guys')
@section('content')
  <div id="page-wrapper">
    <div class="container-fluid">
      <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
          <h4 class="page-title">Add Tip</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
          <ol class="breadcrumb">
            <li><a href="#">Whistle</a></li>
            <li><a href="#">Dashboard</a></li>
            <li class="active">View Tip {{$tip->id}}</li>
          </ol>
        </div>
        <!-- /.col-lg-12 -->
      </div>
      <!-- .row -->
      <div class="row">
        <div class="col-sm-12 col-md-7">
          <div class="white-box p-l-20 p-r-20">
            <div class="row">
              <dl class="dl-horizontal">
                <dt style="text-align: left; white-space: normal;">First Name: </dt> <dd> {{ $user->firstname }}</dd> 
                <br><br>

                <dt style="text-align: left; white-space: normal;">Last Name:</dt> <dd>{{ $user->organization_name }}</dd> 
                <br><br>

                <dt style="text-align: left; white-space: normal;">Other Names: </dt> <dd>{{ $user->type_of_tips }}</dd> 
                <br></br>

              </dl>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-5">
          <div class="white-box p-l-20 p-r-20">
            <div class="row">
              <dl class="dl-horizontal">

                <dt style="text-align: left; white-space: normal;">Phone:</dt> <dd>{{ $user->phone }}</dd> <br><br>

                <dt style="text-align: left; white-space: normal;">Email: </dt> <dd>{{ $user->email }}</dd> <br></br>

              </dl>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->
      
      
    <!-- /.container-fluid -->
  </div>
  <!-- /#page-wrapper -->

  @endsection 