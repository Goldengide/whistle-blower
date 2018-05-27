@extends('layouts.auth')

@section('content')
  <!-- Page Content -->
  <section id="wrapper">
    <div class="container-fluid">
      <!-- row -->
      <div class="row">
        <!-- Left sidebar -->
        <div class="col-md-12">
          <div class="white-box">
            <div class="row">
              <div class="col-xs-12 mail_listing">
                <h3 class="box-title">Compose New Message</h3>
                <form action="{{url('/message/send')}}" method="post">
                  {{csrf_field()}}
                  <div class="form-group">
                    <label>From:</label>
                    <input class="form-control" placeholder="From:" name="from" value="{{ $from }}" >
                  </div>
                  <label>To:</label>
                  <div class="form-group">
                    <input class="form-control" placeholder="To:" name="to" value="{{ $to }}" required>
                  </div>
                  <div class="form-group">
                    <input class="form-control" placeholder="Subject:" name="subject" value="{{ $subject }}" required>
                  </div>
                  <div class="form-group">
                    <textarea class="textarea_editor form-control" rows="15" placeholder="Enter text ..." name="text"></textarea>
                  </div>
                  <hr>
                  <button type="submit" class="btn btn-primary" id="send"><i class="fa fa-envelope-o"></i> Send</button>
                  <!-- <button class="btn btn-default"><i class="fa fa-times"></i> Discard</button> -->
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
@endsection

@section('other-styles')
<!-- wysihtml5 CSS -->
<link rel="stylesheet" href="{{ URL::asset("plugins/bower_components/html5-editor/bootstrap-wysihtml5.css") }}" />
<!-- Dropzone css -->
<link href="{{ URL::asset("plugins/bower_components/dropzone-master/dist/dropzone.css") }}" rel="stylesheet" type="text/css" />
@endsection

@section('other-scripts')
<script src="{{ URL::asset("plugins/bower_components/html5-editor/wysihtml5-0.3.0.js") }}"></script>
<script src="{{ URL::asset("plugins/bower_components/html5-editor/bootstrap-wysihtml5.js") }}"></script>
<script src="{{ URL::asset("plugins/bower_components/dropzone-master/dist/dropzone.js") }}"></script>
<script>
$(document).ready(function () {
   
  $('.textarea_editor').wysihtml5();
  // $('#send').click(function() {

    // window.close();
    // get ajax to work
    // find out the js code for closing a web page
    // Write out all things left to do in the SOHDatabase App so as to do it quickly
    // Text David if he could help download the Sunday 11th of February livestream and feb 14 Livestream as well. 
    // Also, I'm thinking of going to conference center one of this days to download. talk to Joel&David
    // Text Sunkanmi about the genotype issue, also the law lady that sells ewa agoyin I need his number.
    // 
  // });
   
});
</script>
@endsection