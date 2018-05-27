@extends('layouts.admin')
@section('content')
  <div id="page-wrapper">
    <div class="container-fluid">
      <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
          <h4 class="page-title">View TIp {{$tip->id}}</h4>
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
                <dt style="text-align: left; white-space: normal;">Description: </dt> <dd>{{ $tip->description }}</dd> 
                <dt style="text-align: left; white-space: normal;">Amount: </dt> <dd>#{{ $tip->amount }}</dd> 
              </dl>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-5">
          <div class="white-box p-l-20 p-r-20">
            <div class="row">
              <dl class="dl-horizontal">
                <dt style="text-align: left; white-space: normal;">Source Name: </dt> <dd> {{ strtoupper($tip->lastname) }} {{ $tip->lastname }} {{ $tip->othernames }}</dd> <br><br>

                <dt style="text-align: left; white-space: normal;">Source Phone:</dt> <dd>{{ $tip->phone }}</dd> <br><br>

                <dt style="text-align: left; white-space: normal;">Source Email: </dt> <dd>{{ $tip->email }}</dd> <br></br>

              </dl>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->
      <div class="row">
        <div class="col-sm-12 col-md-7">
          <div class="white-box p-l-20 p-r-20">
            <h3 class="box-title m-b-0">Upload More Documents</h3>
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
            <div class="row">
              <a class="popup-youtube btn btn-info" href="{{url("/documents/$tip->id")}}">No of Documents Uploaded:  {{ $noOfDocumentsUploaded }}</a>
              <br><br>

              <!-- <span >No of Documents Uploaded:  {{ $noOfDocumentsUploaded }}</span><br>
              <a class="popup-youtube btn btn-info" href="{{url("/documents/$tip->id")}}">View Documents</a>
              <br><br> -->

              <!-- Preview -->
              <!-- Review Documents -->
              <div class="row">
                <div class="col-sm-4">
                  <div class="button-box">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Approve Documents</button>
                  </div>
                  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title" id="exampleModalLabel1">Approval Message</h4>
                        </div>
                        <div class="modal-body">
                          <form>
                            <div class="form-group">
                              <label for="message-text" class="control-label">Message:</label>
                              <textarea class="form-control" id="message-text1"></textarea>
                            </div>
                          </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary">Send message</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group form-horizontal col-sm-4">
                  <a href="{{url('/message/compose/'.$tip->user_id)}}" type="button" class="btn btn-large btn-danger popup-youtube">Decline Documents</a>
                  <!-- if decline button is pressed a sweetalert or any nice poppup page will popup so as to write message to send to the user as a reason for declination of complaint. The SweetAlert can either send a default message or cutomized message written by tha admin -->
                </div>
              </div>
              <div class="row">
                @if($tip->successful)
                <p class="alert-success">This is Investigation has been marked successful</p>
                @else 
                <form class="form-group form-horizontal col-sm-4" method="post" enctype="multipart/form-data" action="{{url('admin/tip/success')}}">
                  {{csrf_field()}}
                  <input type="hidden" name="id" value="{{$tip->id}}">
                  <button type="submit" class="btn btn-large btn-success">Mark Investigation<br> Successful</button>
                  <!-- if decline button is pressed a sweetalert or any nice poppup page will popup so as to write message to send to the user as a reason for declination of complaint. The SweetAlert can either send a default message or cutomized message written by tha admin -->
                </form>
                <form class="form-group form-horizontal col-sm-4" method="post" enctype="multipart/form-data" action="{{url('admin/tip/redundant')}}">
                  {{csrf_field()}}
                  <input type="hidden" name="id" value="{{$tip->id}}">
                  <button type="submit" class="btn btn-large btn-success">Report Redundancy</button>
                  <!-- if decline button is pressed a sweetalert or any nice poppup page will popup so as to write message to send to the user as a reason for declination of complaint. The SweetAlert can either send a default message or cutomized message written by tha admin -->
                </form>
                @endif
                  
              </div>

            </div>
          </div>
        </div>
      </div>
    <!-- /.container-fluid -->
  </div>
  <!-- /#page-wrapper -->
  @endsection

  @section('other-styles')
    <link href="{{ URL::asset("plugins/bower_components/Magnific-Popup-master/dist/magnific-popup.css") }}" rel="stylesheet">
    <link href="{{ URL::asset("plugins/bower_components/sweetalert/sweetalert.css") }}" rel="stylesheet" type="text/css">
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
  <script src="{{ URL::asset("plugins/bower_components/Magnific-Popup-master/dist/jquery.magnific-popup.min.js") }}"></script>
  <script src="{{ URL::asset("plugins/bower_components/Magnific-Popup-master/dist/jquery.magnific-popup-init.js") }}"></script>


  <!-- Sweet-Alert  -->
  <script src="{{ URL::asset("plugins/bower_components/sweetalert/sweetalert.min.js") }}"></script>
  <script src="{{ URL::asset("plugins/bower_components/sweetalert/jquery.sweet-alert.custom.js") }}"></script>
@endsection