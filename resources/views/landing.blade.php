<!DOCTYPE html>
<html lang="en">
<head>
@include('vendor.adminlte.layouts.landing_partials.head')
</head>

<body data-spy="scroll" data-target="#navigation" data-offset="50">

<div id="app">
    @include('vendor.adminlte.layouts.landing_partials.navigation')
    @include('vendor.adminlte.layouts.landing_partials.calendar')
    @include('vendor.adminlte.layouts.landing_partials.footer')
</div>

@include('vendor.adminlte.layouts.landing_partials.scripts')
@include('vendor.adminlte.layouts.partials.reserve_modal', ['time' => $scheduler_start_time])

</body>
</html>
