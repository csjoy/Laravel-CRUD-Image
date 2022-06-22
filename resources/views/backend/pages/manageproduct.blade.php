@extends('backend/template/master')

@section('content')
<h1 class="mt-4">Manage Product</h1>
<ol class="breadcrumb mb-4">
  	<li class="breadcrumb-item active">Manage Product</li>
</ol>
<div class="row">
	<div class="col">
		<div class="card p-3 shadow-base">
			<table class="table">
				<thead>
					<tr>
						<th>SL</th>
						<th>Name</th>
						<th>Description</th>
						<th>Brand</th>
						<th>Category</th>
						<th>Image</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@php
							$sl=1;
					@endphp
					@foreach ($products as $data)
						<tr>
							<td>{{ $sl }}</td>
							<td>{{ $data->name }}</td>
							<td>{{ $data->description }}</td>
							<td>{{ $data->brand_name }}</td>
							<td>{{ $data->category_name }}</td>
							<td>
								<img height="80" src="{{ asset('backend/img/'.$data->image) }}" alt="Product Image">
							</td>
							<td>
								@if ($data->status=='1')
									<span class="badge bg-info text-dark">Active</span>
								@else
									<span class="badge bg-danger">Inactive</span>
								@endif
							</td>
							<td>
								<a href="{{ Route('edit', $data->id) }}" class="btn btn-sm btn-info"><i class="fa-solid fa-pen-to-square"></i></a>
								<button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#delete{{ $data->id }}"><i class="fa-solid fa-trash-can"></i></button>
							</td>
						</tr>

						<!-- Modal -->
						<div class="modal fade" id="delete{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Confirmation Message</h5>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
									<div class="modal-body">
										Are you sure want to delete this product?
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
										<a href="{{ Route('delete', $data->id) }}" type="button" class="btn btn-primary">Confirm</a>
									</div>
								</div>
							</div>
						</div>
						@php
								$sl++;
						@endphp					
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection