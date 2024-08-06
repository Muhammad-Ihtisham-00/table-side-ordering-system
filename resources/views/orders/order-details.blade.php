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
            <h1 class="m-0">Orders</h1>
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
                <h3 class="card-title">Order Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="card-body">
                <form>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Tracking #</label>
                        <input disabled type="text" class="form-control" placeholder="{{$order->tracking_no}}">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Table #</label>
                        <input type="text" class="form-control" placeholder="{{$order->table_id}}" disabled>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Total Price</label>
                        <input disabled type="text" class="form-control" placeholder="{{$order->total_price}}">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Created at</label>
                        <input type="text" class="form-control" placeholder="{{$order->created_at}}" disabled="">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <label>Status</label>
                      <div class="input-group input-group mb-3">
                        <div class="input-group-prepend">
                          <button type="button" class="btn btn-warning dropdown-toggle bg-primary" data-toggle="dropdown">
                            Update
                          </button>
                          <ul class="dropdown-menu">
                            <a class="dropdown-item" href="#" onclick="updateStatus({{$order->id}}, 0)">Pending</a>
                            <a class="dropdown-item" href="#" onclick="updateStatus({{$order->id}}, 1)">Approved</a>
                            <a class="dropdown-item" href="#" onclick="updateStatus({{$order->id}}, 2)">Processing</a>
                            <a class="dropdown-item" href="#" onclick="updateStatus({{$order->id}}, 3)">Completed</a>
                          </ul>
                        </div>
                        <!-- /btn-group -->
                        <input disabled @if ($order->status === 0)
                        placeholder="Pending"
                        @elseif ($order->status === 1)
                        placeholder="Approved"
                        @elseif ($order->status === 2)
                        placeholder="Processing"
                        @elseif ($order->status === 3)
                        placeholder="Completed"
                    @endif type="text" class=" form-control">
                      </div>
                    </div>
                    <div class="col-sm-6">
                    
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
                <h3 class="card-title">Order Items</h3>
              </div>
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                  <tr>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Quantity</th>
                    <th>price</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($order->order_items as $item)
                  <tr>
                    <td>{{$item->food_item->name}}</td>
                    <td> 
                      @if ($item->food_item->image != '' && file_exists(public_path().'/assets/images/'.$item->food_item->image))
                      <img src="{{ url('assets/images/'.$item->food_item->image) }}" alt="" width="50" height="50">   
                      @else 
                      <img src="{{ url('assets/images/no-image.png') }}" alt="" width="50" height="50"> 
                      @endif
                    </td>
                    <td>{{ $item->qty }}</td>

                    
                    <td>{{$item->food_item->price}}</td>
                  </tr>
                  @endforeach
                  </tbody>
                  </table>
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

  <script>
    function updateStatus(id, status) {
        var id = id;

        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        method: "POST",
        url: "/update-status",
        data: {
        'id': id,
        'status' : status
        },
        success: function (response){
            window.location.reload();
        }
    });
}



</script>
    
@endsection