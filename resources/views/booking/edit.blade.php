@extends('layouts.app')

@section('section_id', 'booking')
@section('content')

    <div class="position-center">
        <form role="form" id="tryitForm" class="form-horizontal" enctype="multipart/form-data"
              method="POST" action="{{ route('booking.update', [$reservation])  }}">
            {!! Form::token() !!}

            <div class="cd-block">
                <div class="cd-content">

                    <!-- Users -->
                    <div class="form-group">
                        {!! Form::label('users', 'Users:', ['class' => 'col-lg-2 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::select('users[]', $users, null, ['class' => 'form-control', 'multiple']) !!}
                        </div>
                    </div>


                    <!-- Number of samples -->
                    <div class="form-group">
                        <label class="col-lg-2 control-label">No. of samples</label>

                        <div class="col-lg-6">
                            <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-fw fa-eyedropper text-primary"></i>
                                                    </span>
                                <input type="number" placeholder="No. of samples" id="samples" name="samples"
                                       class="form-control" value="{!! old('samples') !!}"/>
                            </div>
                            @if ($errors->has('number_of_samples'))
                                <span class="help-block"
                                      style="color: red"><strong>{{ $errors->first('number_of_samples') }}</strong></span>
                            @endif
                        </div>
                    </div>

                    <!-- Methods -->
                    <div class="form-group">
                        <label for="group" class="col-md-2 control-label">Method</label>

                        <div class="col-md-6">
                            <select class="form-control " name="group"
                                    id="group" required="">
                                <option value="">Select</option>
                                @foreach($methods as $method)
                                    <option value="{{ $method->id }}"
                                            @if($method->id == old('group'))
                                            selected="selected"
                                            @endif >{{ $method->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="cd-block">
                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                        <input type="submit" class="btn btn-primary" name="book" value="Book"/>
                        <a href="{{url('/')}}" class="btn btn-default"
                           role="button">Cancel</a>
                    </div>
                </div>
            </div>


        </form>
    </div>



@endsection