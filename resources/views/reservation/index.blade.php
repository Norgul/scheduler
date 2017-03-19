@extends('layouts.app')

@section('section_id', 'reservation')
@section('content')

    <div class="position-center">
        <form role="form" id="tryitForm" class="form-horizontal" enctype="multipart/form-data"
              method="POST" action="{{ route('reserve-me', [$equipment, $time])  }}">
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
                                <input type="number" placeholder="No. of samples" id="number_of_samples"
                                       name="number_of_samples" min="0"
                                       class="form-control" value="{!! old('number_of_samples') !!}"/>
                            </div>
                            @if ($errors->has('number_of_samples'))
                                <span class="help-block"
                                      style="color: red"><strong>{{ $errors->first('number_of_samples') }}</strong></span>
                            @endif
                        </div>
                    </div>

                    <!-- Number of samples -->
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Current column</label>

                        <div class="col-lg-6">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-fw fa-columns text-primary"></i>
                                </span>
                                <input type="text" disabled
                                       class="form-control" value="{{$equipment->column->name}}"/>
                            </div>
                        </div>
                    </div>

                    <!-- Methods -->
                    <div class="form-group">
                        <label for="group" class="col-md-2 control-label">Method</label>

                        <div class="col-md-6">
                            <select class="form-control" name="method_id"
                                    data-equipment-method-column-id={{$equipment->method_column_id}}
                                            id="method_id" required="">
                                <option id="option_id_0" value="0">Select</option>
                                @foreach($equipment->equipment_methods as $method)
                                    <?php $method_column = $method->columns->where('pivot.method_column_id', $equipment->method_column_id)->first() ?>
                                    <option id="option_id_{{ $method->id }}" value="{{ $method->cost }}"
                                            data-method-column-id="@if($method_column != null) {{$method_column->id}} @else 0 @endif"
                                            data-method-price="{{$method->cost}}"
                                            @if($method->id == old('method_id'))
                                            selected="selected"
                                            @endif >{{ $method->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- Total cost -->
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Total</label>

                        <div class="col-lg-6">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-fw fa-money text-primary"></i>
                                </span>
                                <input id="total_price" type="number" disabled
                                       class="form-control" value="0"/>
                            </div>
                        </div>
                    </div>
                    <!-- Warning message -->
                    <div class="form-group">
                        <label for="group" class="col-md-2 control-label"></label>
                        <div id="column_message" class="col-md-6">
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

@section('scripts')
    <script>
        $('#method_id').on('change', function (e) {
            var price = $('#number_of_samples').val() * $('#method_id').val();
            $("#total_price").val(price);

            if ($(e.currentTarget).data('equipment-method-column-id') != $('#option').data('method-column-id')) {
                $('.form-group').find('#column_message')
                        .replaceWith('<div class="alert alert-danger"><strong>Warning!</strong> Installed column and method do not match</div>');
            } else {
                console.log('here')
            }
        });

        $('#number_of_samples').on('change', function (e) {
            var price = $(this).val() * $('#method_id').val();
            $("#total_price").val(price);
        });


    </script>
@endsection