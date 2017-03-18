@extends('adminlte::layouts.app')

@section('htmlheader_title')
	Methods
@endsection
@section('contentheader_title')
	Methods
@endsection
@section('contentheader_description')
	List of all methods
@endsection

@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">

			<table class="table table-striped">
				<thead>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Action</th>
				</tr>
				</thead>
				<tbody>
				@foreach($methods as $method)
				<tr>
					<td>{{$method->id}}</td>
					<td>{{$method->name}}</td>
					<td>
						<div class="btn-group" role="group" aria-label="...">
							<a class="btn btn-primary btn-sm" href="{{ route('method.edit', $method) }}">
								<i class="fa fa-fw fa-pencil"></i>
							</a>
							<a href="#" class="btn btn-danger btn-sm"
							   data-href="{{route('method.destroyMe', $method->id)}}"
							   data-toggle="modal" data-target="#confirm-delete">
								<i class="fa fa-times"></i>
							</a>
						</div>
					</td>
				</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection

@section('extra_scripts')
	@include('vendor.adminlte.layouts.partials.delete_modal', ['title' => 'method', 'body' => 'method'])
@endsection