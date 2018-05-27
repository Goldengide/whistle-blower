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
                <dt style="text-align: left; white-space: normal;">Organization Type: </dt> <dd> {{ $tip->type_of_organization }}</dd> 
                <br><br>

                <dt style="text-align: left; white-space: normal;">Organization Name:</dt> <dd>{{ $tip->organization_name }}</dd> 
                <br><br>

                <dt style="text-align: left; white-space: normal;">Complaint type: </dt> <dd>{{ $tip->type_of_tips }}</dd> 
                <br></br>

                <dt style="text-align: left; white-space: normal;">Organization Date: </dt> <dd>{{ $tip->organization_date }}</dd> 
                <br></br>

                <dt style="text-align: left; white-space: normal;">Description: </dt> <dd>{{ $tip->description }}</dd> <br><br>

                <dt style="text-align: left; white-space: normal;">Amount: </dt> <dd>#{{ $tip->amount }}</dd> 
              </dl>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-5">
          <div class="white-box p-l-20 p-r-20" >
            <div class="row">
              <dl class="dl-horizontal">
                <dt style="text-align: left; white-space: normal;">Source Name: </dt> <dd> {{ strtoupper($user->lastname) }}  {{ $user->firstname }}</dd> <br><br>

                <dt style="text-align: left; white-space: normal;">Source Phone:</dt> <dd>{{ $user->phone }}</dd> <br><br>

                <dt style="text-align: left; white-space: normal;">Source Email: </dt> <dd>{{ $user->email }}</dd> <br></br>

              </dl>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->
      
      <div class="row">
        <div class="col-sm-12 col-md-7">
          <div class="white-box p-l-20 p-r-20">
            <a class="popup-youtube btn btn-danger" href="{{url("/documents/$tip->id")}}">No of Documents Uploaded:  {{ $noOfDocumentsUploaded }}</a><br><br>
            @if($noOfDocumentsUploaded < 5)
            <h3 class="box-title m-b-0">Upload More Documents</h3>
            <span class="help">Maximum of 5 document upload is allowed</span>
            @endif
              
            @if(count($errors) > 0)

              <ul class="alert alert-danger">

                  @foreach($errors->all() as $error)

                      <li>{{$error}}</li>

                  @endforeach
              </ul>

            @endif

            @if(Session::has('message'))
            <p class="alert-{{session('style')}}">{{session('message')}}</p>
            @endif
            @if($noOfDocumentsUploaded < 5)
            <div class="row">
              <!-- Preview -->
              <!-- Add More Documents -->
              <form action="{{url('tip/document/upload')}}" class="form-group form-horizontal" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <input type="hidden" name="tip_id" value="{{$tip->id}}">
                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                <div class="form-horizontal">
                   <div class="form-group col-xs-4">
                     <input class="form-control" type="text" name="title" placeholder="Title of Document" required>
                   </div><br>
                  <div class="form-group">
                    <input type="file" name="document">
                  </div>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-large btn-primary">Upload Document</button>
                </div>

              </form>

            </div>
            @endif
          </div>
        </div>
      </div>
    <!-- /.container-fluid -->
  </div>
  <!-- /#page-wrapper -->

  @endsection

  @section('other-scripts')
  <script src="{{URL::asset("plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js")}}"></script>
  <!-- Date range Plugin JavaScript -->
            
  <script type="text/javascript">
    jQuery('.mydatepicker, #datepicker').datepicker();
    jQuery('#datepicker-autoclose').datepicker({
        autoclose: true,
        todayHighlight: true
      });
      
    jQuery('#date-range').datepicker({
        toggleActive: true
      });
    jQuery('#datepicker-inline').datepicker({
        
        todayHighlight: true
      });
  </script>

  @endsection