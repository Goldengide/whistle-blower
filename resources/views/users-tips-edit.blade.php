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
            <li class="active">Add Tip</li>
          </ol>
        </div>
        <!-- /.col-lg-12 -->
      </div>
      <!-- .row -->
      <div class="row">
        <div class="col-sm-12">
          <div class="white-box p-l-20 p-r-20">
            <h3 class="box-title m-b-0">Edit Tip</h3>
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
              <div class="col-md-12">
                <form class="form-material form-horizontal" method="post" action="{{url('tip/update')}}" enctype="multipart/form-data">
                  {{csrf_field()}}
                  <input type="hidden" name="id" value="{{$tip->id}}">
                  <div class="form-group">
                    <label class="col-md-12">Type of Organization<span class="help"> e.g. Finance Ay edit this place oo</span></label>
                    <div class="col-md-12">
                      <input type="text" class="form-control form-control-line" name="type_of_organization" value="{{$tip->type_of_organization}}">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-12">Organization Name<span class="help"> e.g. Microsoft Corp.</span></label>
                    <div class="col-md-12">
                      <input type="text" class="form-control form-control-line" name="organization_name" value="{{$tip->organization_name}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-12">Type of Tip<span class="help"> e.g. Money Laundering</span></label>
                    <div class="col-md-12">
                      <input type="text" class="form-control form-control-line" name="type_of_tips" value="{{$tip->type_of_tips}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-12">Organization Address<span class="help"> e.g. Organization Address</span></label>
                    <div class="col-md-12">
                      <input type="text" class="form-control form-control-line" name="organization_address" value="{{$tip->organization_address}}">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-12">Organization Date</label>
                    <div class="col-md-12">
                      <input type="text" class="form-control form-control-line mydatepicker" value="{{$tip->organization_date}}" name="organization_date">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-12">Description</label>
                    <div class="col-md-12">
                      <input type="text" class="form-control form-control-line" value="{{$tip->description}}" name="description">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-12">Conduct</label>
                    <div class="col-md-12">
                      <input type="text" class="form-control form-control-line" value="{{$tip->conduct}}" name="conduct">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-12">Amount</label>
                    <div class="col-md-12">
                      <input type="number" class="form-control form-control-line" value="{{$tip->amount}}" name="amount">
                    </div>
                  </div>

                  <!-- <div class="form-group">
                    <div class="col-sm-6 ol-md-6 col-xs-12">
                      <div class="white-box">
                        <h3 class="box-title">Document</h3>
                        <label for="input-file-now">Upload Document <span class="help">Please document should be in JPG|PNG|PSD format and should not be than 1900KB</span></label>
                        <input type="file" name="document" />
                      </div>
                    </div>
                  </div> -->

                  
                  <div class="form-group">
                    <label class="col-md-12" for="example-email">Company</label>
                    <div class="col-md-12">
                      <input type="text" name="company" class="form-control" value="{{$tip->company}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-12">Address</label>
                    <div class="col-md-12">
                      <input type="text" class="form-control" value="{{$tip->address}}" name="address">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-12">Code</label>
                    <div class="col-md-12">
                      <input type="text" class="form-control" name="code" value="{{$tip->code}}">
                    </div>
                  </div>
                  <br>
                  <div class="form-group">
                    <div class="col-md-12">
                      <button type="submit" class="btn btn-lg btn-success">Submit</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->
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