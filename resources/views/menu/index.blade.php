@extends('layouts.app')

@section('content')



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Menu</h1>
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
                <a href="{{route('fooditems.create')}}" class="btn btn-success mb-2">Add Menu Item</a>
   
                
              <table class="table table-bordered">
              <thead>
              <tr>
                <th style="width: ">#</th>
                <th>Name</th>
                <th>Image</th>
                <th>Price</th>
                <th>Category</th>
                <th>Description</th>
                <th style="width: ">Action</th>
              </tr>
              </thead>
              <tbody>
              @if ($fooditems->isNotEmpty())
              @foreach ($fooditems as $item)
              <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td> 
                  @if ($item->image != '' && file_exists(public_path().'/assets/images/'.$item->image))
                  <img src="{{ url('assets/images/'.$item->image) }}" alt="" width="50" height="50">   
                  @else 
                  <img src="{{ url('assets/images/no-image.png') }}" alt="" width="50" height="50"> 
                  @endif
                </td>
                <td>{{ $item->price }}</td>
                <td>{{ $item->category->name }}</td>
                <td>{{ Str::limit($item->description, 20, '...')}}</td>
                <td class="text-center"><a href="{{ route('fooditems.edit',$item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                  <a href="#" onclick="deleteItem({{ $item->id }})"  class="btn btn-danger btn-sm">Delete</a>
                  <form id="item-edit-action-{{ $item->id}}" action="{{ route('fooditems.destroy',$item->id) }}" method="post">
                    @csrf
                    @method('delete')
                  </form>
                </td>
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

              <div>{{ $fooditems->links()}}</div>
           
          </div>
         
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <script>
    function deleteItem(id) {
      if (confirm("Are you sure you want to delete?")){
        document.getElementById('item-edit-action-'+id).submit();
      }
    }
  </script>
    
@endsection