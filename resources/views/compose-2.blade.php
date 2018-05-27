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
                <div class="form-group">
                  <input class="form-control" placeholder="To:" value="j">
                </div>
                <div class="form-group">
                  <input class="form-control" placeholder="Subject:">
                </div>
                <div class="form-group">
                  <textarea class="textarea_editor form-control" rows="15" placeholder="Enter text ..."></textarea>
                </div>
                <h4><i class="ti-link"></i> Attachment</h4>
                <form action="#" class="dropzone" enctype="multi">
                  <div class="fallback">
                    <input name="file" type="file" multiple />
                  </div>
                </form>
                <hr>
                <button type="submit" class="btn btn-primary" id="send"><i class="fa fa-envelope-o"></i> Send</button>
                <button class="btn btn-default"><i class="fa fa-times"></i> Discard</button>
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
  $('#send').click(function() {
    var subject;
    var to;
    var from;
    var message;
    var file;
    alert("Hi");
  })
   
});
</script>
@endsection
