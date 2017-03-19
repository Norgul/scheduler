@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Edit column: {{$column->name}}
@endsection
@section('contentheader_title')
    Edit column:
@endsection
@section('contentheader_description')
    {{$column->name}}
@endsection

@section('main-content')
    <div class="container-fluid spark-screen">
        <div class="row">

            <div class="position-center">
                <form role="form" id="tryitForm" class="form-horizontal" enctype="multipart/form-data"
                      method="POST" action="{{route('column.update', $column->id)}}">
                    {!! Form::token() !!}

                    <div class="cd-block">
                        <div class="cd-content">
                            @include('vendor.adminlte.layouts.partials.form_element',
                            ['form_name' =>'Name', 'form_placeholder' => 'Column name', 'request_name'=>'name',
                            'old_value' => $column->name, 'fa_icon' => 'fa-briefcase', 'type' => 'text'])
                                    <!-- End of includes -->

                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('methods', 'Methods', ['class' => 'col-lg-2 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::select('methods[]', $methods, $column->methods()->pluck('id')->toArray(), ['class' => 'form-control', 'multiple']) !!}
                        </div>
                    </div>

                    <input name="_method" value="PUT" type="hidden">
                    <input type="hidden" value="{{ csrf_token() }}" name="_token">

                    <div class="cd-block">
                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                <input type="submit" class="btn btn-primary" name="save" value="Save"/>
                                <a href="{{ url('/admin/column') }}" class="btn btn-default"
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