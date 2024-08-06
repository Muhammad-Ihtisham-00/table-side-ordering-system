@extends('layouts.app')

@section('content')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    



  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">

          @if (Session::has('success'))
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Alert!</h5>
                {{Session::get('success')}}
              </div>
              @endif
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Tables</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>
              <div class="card-body">
                <a href="{{route('tables.create')}}" class="btn btn-success mb-2">Add Table</a>
                <table class="table table-bordered">
                  <thead>
                  <tr>
                    <th>Table id</th>
                    <th>Table #</th>
                    <th>Created at</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @if ($tables->isNotEmpty())
                  @foreach ($tables as $table)
                  <tr>
                    <td>{{$table->id}}</td>
                    <td>{{$table->table_no}}</td>
                    <td>{{$table->created_at}}</td>
                    <td><a href="{{route('tables.details',$table->id)}}" class="btn btn-primary btn-sm">View</a>
                      <a href="{{route('tables.destroy',$table->id)}}" class="btn btn-danger btn-sm">Delete</a></td>
                  </tr>
                  @endforeach
    
                  @else
                    <tr>
                      <td colspan="6">Record Not Found</td>
                    </tr>
                    @endif
                  </tbody>
                  </table>
              </div>
              <!-- /.card-body -->

              
            </form>
          </div>
          <!-- /.card -->

 
          <!-- /.card -->

        </div>
        <!--/.col (left) -->
        <!-- right column -->
        
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
    <!-- Content Header (Page header) -->
    {{-- <div class="content-header">
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
    <div class="content">
      
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">

            <div class="col-md-12">

              @if (Session::has('success'))
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Alert!</h5>
                {{Session::get('success')}}
              </div>
                  
              @endif
              <div class="card">
              <div class="card-header">
              <h3 class="card-title"></h3>
              </div>
             
              <div class="card-body">
               
   
                
              <table class="table table-bordered">
              <thead>
              <tr>
                <th>Tracking #</th>
                <th>Table #</th>
                <th>Total Price</th>
                <th>Status</th>
                <th>Created at</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>
              @if ($orders->isNotEmpty())
              @foreach ($orders as $order)
              <tr>
                <td>{{$order->tracking_no}}</td>
                <td>{{$order->table_id}}</td>
                <td>{{$order->total_price}}</td>
                <td>@if ($order->status === 0)
                  <span class="badge bg-danger">Pending</span>
                  @elseif ($order->status === 1)
                  <span class="badge badge-primary">Approved</span>
                  @elseif ($order->status === 2)
                  <span class="badge badge-warning">Processing</span>
                  @elseif ($order->status === 3)
                  <span class="badge badge-success">Completed</span>
              @endif
              <div class="btn-group ">
                <button type="button" class="btn btn-default">Update</button>
                <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                  <span class="sr-only">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu" role="menu">
                  <a class="dropdown-item" href="#" onclick="updateStatus({{$order->id}}, 0)">Pending</a>
                  <a class="dropdown-item" href="#" onclick="updateStatus({{$order->id}}, 1)">Approved</a>
                  <a class="dropdown-item" href="#" onclick="updateStatus({{$order->id}}, 2)">Processing</a>
                  <a class="dropdown-item" href="#" onclick="updateStatus({{$order->id}}, 3)">Completed</a>
                </div>
              </div></td>
              <td>{{$order->created_at}}</td>
                <td><a href="{{route('adminOrder.details',$order->id)}}" class="btn btn-primary">view</a></td>
              </tr>
              @endforeach

              @else
                <tr>
                  <td colspan="6">Record Not Found</td>
                </tr>
                @endif
              </tbody>
              </table>
              </div>
              
              
              
              </div>
              
              </div>

              <div>{{ $orders->links()}}</div>
           
          </div>
         
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper --> --}}
    
@endsection