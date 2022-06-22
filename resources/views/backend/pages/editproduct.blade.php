@extends('backend/template/master')

@section('content')
<h1 class="mt-4">Edit Product</h1>
<ol class="breadcrumb mb-4">
  	<li class="breadcrumb-item active">Edit Product</li>
</ol>
<form action="{{ Route('update', $product->id) }}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="row">
    <div class="col-lg-6">
      <div class="mb-3">
        <label for="name" class="form-label">Product Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Product Name" value="{{ $product->name }}">
        <span class="text-danger">
          @error('name')
            {{ $message }}
          @enderror
        </span>
      </div>
      <div class="mb-3">
        <label for="description" class="form-label">Product Description</label>
        <textarea class="form-control" id="description" name="description" placeholder="Enter Product Description" rows="3">{{ $product->description }}</textarea>
        <span class="text-danger">
          @error('description')
            {{ $message }}
          @enderror
        </span>
      </div>
      <div class="mb-3">
        <label for="image" class="form-label">Upload Image</label>
        <input class="form-control form-control-lg" type="file" id="image" name="image" value="{{ $product->image }}">
        <span class="text-danger">
          @error('image')
            {{ $message }}
          @enderror
        </span>
      </div>
    </div>
    <div class="col-lg-6">
      <div class="mb-3">
        <label for="catname" class="form-label">Category Name</label>
        <input type="text" class="form-control" id="catname" name="catname" placeholder="Enter Category Name" value="{{ $product->category_name }}">
        <span class="text-danger">
          @error('catname')
            {{ $message }}
          @enderror
        </span>
      </div>
      <div class="mb-3">
        <label for="brandname" class="form-label">Brand Name</label>
        <input type="text" class="form-control" id="brandname" name="brandname" placeholder="Enter Brand Name"  value="{{ $product->brand_name }}">
        <span class="text-danger">
          @error('brandname')
            {{ $message }}
          @enderror
        </span>
      </div>
      <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <select class="form-control" name="status" id="status">
          <option value="0" @if ($product->status == 0)
							selected
					@endif>----Select Status----</option>
          <option value="1" @if ($product->status == 1)
							selected
					@endif>Active</option>
          <option value="2" @if ($product->status == 2)
							selected
					@endif>Inactive</option>
        </select>
      </div>
      <div class="mb-3">
        <button class="form-control btn btn-info">Add Product</button>
      </div>
    </div>
  </div>
</form> 
@endsection