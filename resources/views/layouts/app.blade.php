<!DOCTYPE html>
<html lang="en">
<head>
    @include('landing_partials.head')
</head>

<body data-spy="scroll" data-target="#navigation" data-offset="50">

<div id="app">
    @include('landing_partials.navigation')

    <section id="@yield('section_id')">
        <div id="intro">
            <div class="container">
                @yield('content')
            </div>
        </div>
    </section>

    @include('landing_partials.footer')
</div>

@include('landing_partials.scripts')
@yield('scripts')
@yield('modals')

</body>
</html>
