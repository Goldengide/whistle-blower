@extends('layouts.auth')

@section('content')
  <!-- Page Content -->
  <section id="wrapper">
    <div class="container-fluid">
      <!-- row -->
      <div class="row text-center" style="margin: 4em; margin-top: 20em; font-family:tresbuchet; font-size: larger;">
        <!-- Left sidebar -->
        @if(Session::has('message'))
          <h4 class="{{Session::get('style')}}" >{{Session::get('message')}}</h4>
        @else
          <h4 class="text-success">Nothing here for now</h4>
        @endif
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