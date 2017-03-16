<!DOCTYPE html>
<html lang="en">
<head>
@include('landing_partials.head')
</head>

<body data-spy="scroll" data-target="#navigation" data-offset="50">

<div id="app">
    @include('landing_partials.navigation')
    @include('landing_partials.calendar')
    @include('landing_partials.footer')
</div>

@include('landing_partials.scripts')
@include('landing_partials.modals', ['time' => $scheduler_start_time])

</body>
</html>
