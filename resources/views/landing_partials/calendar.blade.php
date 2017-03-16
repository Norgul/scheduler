<section id="calendar" name="calendar">
    <div id="intro">
        <div class="container">
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
                            @if($user == null)
                                    <!-- Unauthorized user -->
                            <?php $modal = "#unauthorized-modal"; $coloring_class = ""?>
                            @else
                                    <!-- Authorized user -->
                            @if($user->equipment()->where('id', $instrument->id)->first() != null)
                                    <!-- Can use equipment -->
                            <?php $modal = "#confirm-reservation"; $coloring_class = ""?>
                            @else
                                    <!-- Can't use equipment -->
                            <?php $modal = "#unable-to-use-modal"; $coloring_class = "danger" ?>
                            @endif
                            @endif

                            <td class="{{$coloring_class}}">
                                <a href="#" style="display: block;"
                                   data-href="{{route('reserve-me', [$instrument->id, $scheduler_start_time->timestamp])}}"
                                   data-toggle="modal"
                                   data-target="{{$modal}}"
                                   data-start-time="{{$scheduler_start_time->toW3cString()}}"
                                   data-end-time="{{$scheduler_end_time->toW3cString()}}"
                                >
                                    @if($instrument->reservations
                                    ->where('reserved_from','<=', $scheduler_start_time)
                                    ->where('reserved_to','>=', $scheduler_start_time)->first() != null)

                                        HERE

                                    @else
                                        &nbsp;
                                    @endif
                                </a>
                            </td>

                            @endforeach
                            <?php $scheduler_start_time->addMinutes(30) ?>
                        </tr>
                    @endwhile
                    </tbody>
                </table>

                <br><br><br>
            </div>
        </div>
    </div>
</section>