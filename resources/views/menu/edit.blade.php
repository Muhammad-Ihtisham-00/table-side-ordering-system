@extends('layouts.app')

@section('content')



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add Category</h1>
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
                <h3 class="card-title">Quick Example</h3>
                </div>
                
                
                <form action="{{route('fooditems.update',$fooditem->id)}}" method="post" enctype="multipart/form-data">
                  @csrf
                  @method('put')
                <div class="card-body">

                <div class="form-group">
                <label>Name</label>
                <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter Name" value="{{old('name', $fooditem->name)}}">
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                </div>

                <div class="form-group">
                    <label>Select Category</label>
                    <select name="category_name" class="form-control @error('category_name') is-invalid @enderror">
                      <option value="">Select</option>
                      @foreach ($categories as $category)

                      <option value="{{$category->id}}" {{$fooditem->category_id == $category->id ? 'selected':''}}>{{$category->name}}</option>
                          
                      @endforeach
                    </select>
                    @error('category_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
               


                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file  @error('image') is-invalid @enderror">
                        <input name="image" type="file" class="custom-file-input">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mt-3">
                      @if ($fooditem->image != '' && file_exists(public_path().'/assets/images/'.$fooditem->image))
                      <img src="{{ url('assets/images/'.$fooditem->image) }}" alt="" width="100" height="100" >
                      @endif
                    </div>
                  </div>


                <div class="form-group">
                  <label>Description</label>
                  <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="3" placeholder="Enter ...">{{old('description', $fooditem->description)}}</textarea>
                  @error('description')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="price">Price</label>
                  <input name="price" type="text" class="form-control @error('price') is-invalid @enderror" id="price" placeholder="Enter Price" value="{{old('price', $fooditem->price)}}">
                  @error('price')
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