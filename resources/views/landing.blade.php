@extends('layouts.app')

@section('section_id', 'calendar')
@section('content')
    <div class="row centered">
        <div class="col-lg-12">
            <!-- Days navigation button group -->
            <div class="btn-group">
                <a type="button" class="btn btn-primary"
                   href="{{url('date/'. \Carbon\Carbon::createFromTimestamp($time->timestamp)->addDay(-1)->timestamp)}}">
                    <i class="fa fa-arrow-left" aria-hidden="true"></i>
                </a>
                <a type="button" class="btn btn-primary"
                   href="{{url('date/'. \Carbon\Carbon::now()->startOfDay()->timestamp)}}">
                    {{$time->format('d.m.Y')}}
                </a>
                <a type="button" class="btn btn-primary"
                   href="{{url('date/'. \Carbon\Carbon::createFromTimestamp($time->timestamp)->addDay(1)->timestamp)}}">
                    <i class="fa fa-arrow-right" aria-hidden="true"></i>
                </a>
            </div>
            <h2>Scheduler application</h2>

            <p>pick a period for a specific instrument</p>
        </div>
    </div>
    <div class="col-lg-12">
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>Time</th>
                @foreach($equipment as $instrument)
                    <th>{{$instrument->name}}</th>
                @endforeach
            </tr>
            </thead>
            <tbody>
            @while($scheduler_start_time <= $scheduler_end_time)
                <tr>
                    <td>{{$scheduler_start_time->format('H:i:s')}}</td>
                    @foreach($equipment as $instrument)
                        <?php $instrument_reservation = $instrument->reservations->where('reserved_from', '<=', $scheduler_start_time)->where('reserved_to', '>=', $scheduler_start_time)->first(); ?>
                        @if($instrument_reservation != null)
                            <td style="background-color: {{$instrument_reservation->user->highlight_color}}">
                                <a href="#"
                                   data-toggle="modal"
                                   @if(Auth::user() != null &&
                               (Auth::user()->isAdmin() || Auth::user()->id == $instrument_reservation->user->id))
                                   data-target="#unable-to-edit-modal"
                                   @else
                                   data-target="#unable-to-edit-modal"
                                        @endif>
                                    @if($instrument->reservations->where('reserved_from', '=', $scheduler_start_time)->first() != null)
                                        <span style="color: white; display: block;">
                                        {{$instrument_reservation->user->name}}
                                    </span>
                                    @else
                                        <span style="display: block;">&nbsp;</span>
                                    @endif
                                </a>
                            </td>
                        @elseif($user == null)
                            <td>
                                <a href="#" style="display: block;" data-toggle="modal"
                                   data-target="#unauthorized-modal">
                                    @include('landing_partials.calendar_current_booking')
                                </a>
                            </td>
                        @else
                            @if($user->equipment()->where('id', $instrument->id)->first() != null)
                                {{session(['fallback_url' => Request::url()])}}
                                <td>
                                    <a href="{{url('/booking', [$instrument, $scheduler_start_time->timestamp])}}"
                                       style="display: block;">
                                        @include('landing_partials.calendar_current_booking')
                                    </a>
                                </td>
                            @else
                                <td class="danger">
                                    <a href="#" style="display: block;" data-toggle="modal"
                                       data-target="#unable-to-use-modal">
                                        @include('landing_partials.calendar_current_booking')
                                    </a>
                                </td>
                            @endif
                        @endif
                    @endforeach
                    <?php $scheduler_start_time->addMinutes(30) ?>
                </tr>
            @endwhile
            </tbody>
        </table>
        <br><br><br>
    </div>
@endsection

@section('modals')
    @include('landing_partials.modals', ['time' => $scheduler_start_time])
@endsection