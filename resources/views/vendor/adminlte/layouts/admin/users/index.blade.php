@extends('adminlte::layouts.app')

@section('htmlheader_title')
	Users
@endsection
@section('contentheader_title')
	Users
@endsection
@section('contentheader_description')
	List of all registered users
@endsection

@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">

			<table class="table table-striped">
				<thead>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Email</th>
					<th>Role</th>
					<th>Action</th>
				</tr>
				</thead>
				<tbody>
				@foreach($users as $user)
				<tr>
					<td>{{$user->id}}</td>
					<td>{{$user->name}}</td>
					<td>{{$user->email}}</td>
					<td>{{$user->role->name}}</td>
					<td>
						<div class="btn-group" role="group" aria-label="...">
							<a class="btn btn-primary btn-sm" href="{{ route('user.edit', $user) }}">
								<i class="fa fa-fw fa-pencil"></i>
							</a>
							@if($user->role->name != "Admin")
							<a href="#" class="btn btn-danger btn-sm"
							   data-href="{{route('user.destroyMe', $user->id)}}"
							   data-toggle="modal" data-target="#confirm-delete">
								<i class="fa fa-times"></i>
							</a>
							@endif
						</div>
					</td>
				</tr>
				@endforeach
				</tbody>
			</table>
			{{ $users->links() }}
		</div>
	</div>
@endsection

@section('extra_scripts')
	@include('vendor.adminlte.partials.delete_modal', ['title' => 'user', 'body' => 'user'])
@endsection