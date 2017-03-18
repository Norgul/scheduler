@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Add new user
@endsection
@section('contentheader_title')
    Add new user
@endsection

@section('main-content')
    <div class="container-fluid spark-screen">
        <div class="row">

            @include('vendor.adminlte.layouts.partials.flash_messages')

            <div class="position-center">
                <form role="form" id="tryitForm" class="form-horizontal" enctype="multipart/form-data"
                      method="POST" action="{{route('user.store')}}">
                    {!! Form::token() !!}

                    <div class="cd-block">
                        <div class="cd-content">
                            @include('vendor.adminlte.layouts.partials.form_element',
                            ['form_name' =>'Name', 'form_placeholder' => 'User name', 'request_name'=>'name',
                            'old_value' => null, 'fa_icon' => 'fa-user', 'type' => 'text'])

                            @include('vendor.adminlte.layouts.partials.form_element',
                            ['form_name' =>'Email', 'form_placeholder' => 'User email', 'request_name'=>'email',
                            'old_value' => null, 'fa_icon' => 'fa-envelope','type' => 'email'])
                                    <!-- End of includes -->

                            <!-- Select Role -->
                            <div class="form-group">
                                <label for="category_id" class="col-md-2 control-label">Role</label>

                                <div class="col-md-6">
                                    <select class="form-control " name="role_id"
                                            id="role_id" required="">
                                        @foreach($roles as $role)
                                            <option value="{!! $role->id !!}"
                                                    {{ (!empty($user->role->first()) && ($user->role->id==$role->id)) ? ' selected="selected"' : '' }}>
                                                {{ $role->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('equipment', 'Instruments', ['class' => 'col-lg-2 control-label']) !!}
                                <div class="col-md-6">
                                    {!! Form::select('equipment[]', $equipment, null, ['class' => 'form-control', 'multiple']) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('supervisor', 'Supervisors', ['class' => 'col-lg-2 control-label']) !!}
                                <div class="col-md-6">
                                    {!! Form::select('supervisor[]', $supervisor, null, ['class' => 'form-control', 'multiple']) !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <input name="_method" value="PUT" type="hidden">
                    <input type="hidden" value="{{ csrf_token() }}" name="_token">

                    <div class="cd-block">
                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                <input type="submit" class="btn btn-primary" name="save" value="Save"/>
                                <a href="{{ url('/admin/user') }}" class="btn btn-default"
                                   role="button">Cancel</a>
                            </div>
                        </div>
                    </div>

                </form>
            </div>

        </div>
    </div>
@endsection

@section('extra_scripts')
    @include('vendor.adminlte.layouts.partials.delete_modal', ['title' => 'user', 'body' => 'user'])
@endsection