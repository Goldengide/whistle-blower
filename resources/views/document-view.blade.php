@extends('layouts.auth')
@section('content')
<section id="wrapper">
    <div class="container-fluid">
      <!-- .row -->
      <div class="row">
        <!-- .col -->
          
          <div class="col-sm-12">
            <div class="white-box">
              <h3 class="box-title m-b-0">Whistle Documents</h3>
              <div class="zoom-gallery m-t-30" > <!-- id="image-popups" -->
              	@foreach($documents as $document)
                  <a href="{{ URL::asset($document->url) }}" title="{{$document->title}}" data-effect="mfp-move-from-top">
                    <img src="{{ URL::asset($document->url) }}" width="{{ $width }}%" />
                  </a>
              	@endforeach
                  
              </div>
            </div>

          </div>
          <!-- /.col -->
      </div>
      
    <!-- /.container-fluid -->
  </div>
</section>
@endsection
@section('other-styles')
<link href="{{ URL::asset("plugins/bower_components/Magnific-Popup-master/dist/magnific-popup.css") }}" rel="stylesheet">

@endsection
@section('other-scripts')
<script src="{{ URL::asset("plugins/bower_components/Magnific-Popup-master/dist/jquery.magnific-popup.min.js") }}"></script>
<script src="{{ URL::asset("plugins/bower_components/Magnific-Popup-master/dist/jquery.magnific-popup-init.js") }}"></script>

@endsection