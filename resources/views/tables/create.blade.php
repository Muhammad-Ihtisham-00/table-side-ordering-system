@extends('layouts.app')

@section('content')



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add Table</h1>
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
              <div class="card card-primary">
                <div class="card-header">
                <h3 class="card-title">Add Table</h3>
                </div>
                
                
                <form action="{{route('tables.store')}}" method="post">
                  @csrf
                <div class="card-body">
                <div class="form-group">
                <label for="name">Table_no</label>
                <input name="table_no" type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter Name" value="{{old('name')}}">
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                </div>
                </div>
                
                <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
                </div>
              
              </div>
           
          </div>
         
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
    
@endsection