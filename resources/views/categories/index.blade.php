@extends('layouts.app')

@section('content')



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Categories</h1>
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
              <h3 class="card-title">Categories</h3>
              </div>
              
              <div class="card-body">
                <a href="{{route('categories.create')}}" class="btn btn-success mb-2">Add Category</a>
              <table class="table table-bordered">
              <thead>
              <tr>
                <th style="width: ">#</th>
                <th>Name</th>
                <th>Description</th>
                <th>Created at</th>
                <th>Updated at</th>
                <th style="width: ">Action</th>
              </tr>
              </thead>
              <tbody>
              @if ($categories->isNotEmpty())
              @foreach ($categories as $category)
              <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ Str::limit($category->description, 20, '...')}}</td>
                <td>{{ $category->created_at }}</td>
                <td>{{ $category->updated_at }}</td>
                <td class="text-center"><a href="{{ route('categories.edit',$category->id) }}" class="btn btn-primary btn-sm">Edit</a>
                  <a href="#" onclick="deleteCategory({{ $category->id }})"  class="btn btn-danger btn-sm">Delete</a>
                  <form id="category-edit-action-{{ $category->id}}" action="{{ route('categories.destroy',$category->id) }}" method="post">
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

              <div>{{ $categories->links()}}</div>
           
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
    function deleteCategory(id) {
      if (confirm("Are you sure you want to delete?")){
        document.getElementById('category-edit-action-'+id).submit();
      }
    }
  </script>
    
@endsection