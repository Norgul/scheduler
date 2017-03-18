@if($instrument_reservation != null)
    <span style="color: {{$instrument_reservation->user->highlight_color}};">
    {{$instrument_reservation->user->name}}
    </span>
@else
    &nbsp;
@endif