<?php $instrument_reservation = $instrument->reservations->where('reserved_from','<=', $scheduler_start_time)->where('reserved_to','>=', $scheduler_start_time)->first(); ?>
@if($instrument_reservation != null)
    <span style="color: {{$instrument_reservation->user->highlight_color}};">
    {{$instrument_reservation->user->name}}
    </span>
@else
    &nbsp;
@endif