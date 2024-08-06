@extends('layouts.app')

@section('content')
<h1>admin order</h1>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Table</h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Table Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="card-body">
                <form>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Table #</label>
                        <input type="text" class="form-control" placeholder="{{$table->table_no}}" disabled>
                      </div>
                    </div>
                  </div>
                  

                 
                  

          
                </form>
              </div>
                  
                </div>
                <!-- /.card-body -->

                
    
            </div>
            <!-- /.card -->

            
          
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">
            <!-- Form Element sizes -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">QR Code</h3>
              </div>
              <div class="card-body">
                @php
                    $e = 'talha';
                    
                @endphp
                <p hidden id="test">http://127.0.0.1:8000/menu/{{$table->table_no}}</p>
                <div id="qrcode"></div>
                
                {{-- {{QrCode::format('eps')->generate($e)}} --}}
                
                  
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script> 
  
  <script>
   $(window).on("load", function () {
          var x = $("#test").text();
        $("#qrcode").qrcode(x);
      });
  </script>
  
    
@endsection