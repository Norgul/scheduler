<!-- Flash message -->
<div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if(Session::has('alert-' . $msg))
            <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close"
                                                                                     data-dismiss="alert"
                                                                                     aria-label="close">&times;</a></p>
        @endif
    @endforeach

    @if ($errors->any())
            <p class="alert alert-danger">{{ implode('', $errors->all()) }}<a href="#" class="close"
                                                                                     data-dismiss="alert"
                                                                                     aria-label="close">&times;</a></p>

    @endif
</div>
<!-- END Flash message -->