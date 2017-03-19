@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Add new instrument
@endsection
@section('contentheader_title')
    Add new instrument
@endsection

@section('main-content')
    <div class="container-fluid spark-screen">
        <div class="row">

            <div class="position-center">
                <form role="form" id="tryitForm" class="form-horizontal" enctype="multipart/form-data"
                      method="POST" action="{{route('equipment.store')}}">
                    {!! Form::token() !!}

                    <div class="cd-block">
                        <div class="cd-content">
                            @include('vendor.adminlte.layouts.partials.form_element',
                            ['form_name' =>'Name', 'form_placeholder' => 'Instrument name', 'request_name'=>'name',
                            'old_value' => null, 'fa_icon' => 'fa-briefcase', 'type' => 'text'])
                                    <!-- End of includes -->

                        </div>
                    </div>

                    <!-- Columns -->
                    <div class="form-group">
                        <label for="group" class="col-md-2 control-label">Currently installed column</label>

                        <div class="col-md-6">
                            <select class="form-control " name="method_column_id"
                                    id="method_column_id" required="">
                                <option value="">Select</option>
                                @foreach($columns as $column)
                                    <option value="{{ $column->id }}"
                                            @if($column->id == old('method_column_id'))
                                            selected="selected"
                                            @endif >{{ $column->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('methods', 'Methods', ['class' => 'col-lg-2 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::select('methods[]', $methods, null, ['class' => 'form-control', 'multiple']) !!}
                        </div>
                    </div>

                    <input type="hidden" value="{{ csrf_token() }}" name="_token">

                    <div class="cd-block">
                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                <input type="submit" class="btn btn-primary" name="save" value="Save"/>
                                <a href="{{ url('/admin/equipment') }}" class="btn btn-default"
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