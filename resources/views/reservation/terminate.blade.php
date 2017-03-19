@extends('layouts.app')

@section('section_id', 'reservation')
@section('content')

    <div class="position-center">
        <form role="form" id="tryitForm" class="form-horizontal" enctype="multipart/form-data"
              method="POST" action="{{ route('reservation.update', $reservation)  }}">
            {!! Form::token() !!}
            {!! Form::hidden('cancelled', 1) !!}

            <div class="cd-block">
                <div class="cd-content">

                    @include('vendor.adminlte.layouts.partials.form_element',
                            ['form_name' =>'Termination reason', 'form_placeholder' => 'Description', 'request_name'=>'cancellation_reason',
                            'old_value' => null, 'fa_icon' => 'fa-ban', 'type' => 'text'])

                </div>
            </div>

            <input name="_method" value="PUT" type="hidden">
            <input type="hidden" value="{{ csrf_token() }}" name="_token">

            <div class="cd-block">
                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                        <input type="submit" class="btn btn-primary" name="terminate" value="Terminate"/>
                        <a href="{{url('/')}}" class="btn btn-default"
                           role="button">Cancel</a>
                    </div>
                </div>
            </div>


        </form>
    </div>



@endsection