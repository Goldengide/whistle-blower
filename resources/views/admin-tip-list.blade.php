@extends('layouts.admin')
@section('content')
  <!-- Page Content -->
  <div id="page-wrapper">
    <div class="container-fluid">
      <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
          <h4 class="page-title">...</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
          <!-- <a href="https://themeforest.net/item/elite-admin-responsive-dashboard-web-app-kit-/16750820" target="_blank" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Buy Now</a> -->
          <ol class="breadcrumb">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Tips</a></li>
          </ol>
        </div>
        <!-- /.col-lg-12 -->
      </div>
      <!-- /row -->
      <div class="row">
        <div class="col-sm-12">
          <div class="white-box">
            <h3 class="box-title m-b-0">Whistle Blowers</h3>
            <p class="text-muted m-b-30">Tips</p>
            <!-- <a href="#" class="btn btn-primary m-b-10">Add Partners</a> -->
            <div class="table-responsive">
            <table id="myTable" class="table table-striped">
              <thead>
                <tr>
                  <th>Company</th>
                  <th>Type of Tips</th>
                  <th>Orgnization Name</th>
                  <th>Phone</th>
                  <!-- <th>Created at</th> -->
                  <!-- <th>Updated at</th> -->
                  <th>Action<!-- <br><span style="font-weight:bold;" class="text-info">edit view delete</span> --></th>
                </tr>
              </thead>
              <tbody>
                @foreach($tips as $tip)
                <tr>
                  <td>{{$tip->company}}</td>
                  <td>{{$tip->type_of_tips}}</td>
                  <td>{{$tip->organization_name}}</td>
                  <td>{{$tip->phone}}</td>
                  <!-- <td>{{$tip->created_at}}</td> -->
                  <!-- <td>{{$tip->updated_at}}</td> -->
                  <td>
                   <a href="{{url('admin/tip/view/'.$tip->id)}}"><span class="icon icon-eye-open text-info"> Details</span></a>
                  </td>
                </tr>
                @endforeach
              </tbody>
              <thead>
                <tr>
                  <th>Company</th>
                  <th>Type of Tips</th>
                  <th>Orgnization Name</th>
                  <th>Phone</th>
                  <!-- <th>Created at</th> -->
                  <!-- <th>Updated at</th> -->
                  <th>Action<!-- <br><span style="font-weight:bold;" class="text-info">edit view delete</span> --></th>
                </tr>
              </thead>
            </table>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->
@endsection

@section('other-scripts')
<script src="{{ URL::asset("plugins/bower_components/datatables/jquery.dataTables.min.js") }}"></script>

<!-- start - This is for export functionality only -->
<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
<script>
    $(document).ready(function(){
      $('#myTable').DataTable();
      $(document).ready(function() {
        var table = $('#example').DataTable({
          "columnDefs": [
          { "visible": false, "targets": 2 }
          ],
          "order": [[ 2, 'asc' ]],
          "displayLength": 25,
          "drawCallback": function ( settings ) {
            var api = this.api();
            var rows = api.rows( {page:'current'} ).nodes();
            var last=null;

            api.column(2, {page:'current'} ).data().each( function ( group, i ) {
              if ( last !== group ) {
                $(rows).eq( i ).before(
                  '<tr class="group"><td colspan="5">'+group+'</td></tr>'
                  );

                last = group;
              }
            } );
          }
        } );

    // Order by the grouping
    $('#example tbody').on( 'click', 'tr.group', function () {
      var currentOrder = table.order()[0];
      if ( currentOrder[0] === 2 && currentOrder[1] === 'asc' ) {
        table.order( [ 2, 'desc' ] ).draw();
      }
      else {
        table.order( [ 2, 'asc' ] ).draw();
      }
    });
  });
    });
    $('#example23').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
  </script>
  @endsection