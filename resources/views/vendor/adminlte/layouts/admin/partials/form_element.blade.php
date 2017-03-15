<!-- {{$form_name}} -->
<div class="form-group">
    <label class="col-lg-2 control-label" for="{{$request_name}}">{{$form_name}}</label>
    <div class="col-lg-6">
        <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-fw {{$fa_icon}} text-primary"></i>
                                </span>
            <input type="{{$type}}" placeholder="{{$form_placeholder}}" name="{{$request_name}}"
                   id="{{$request_name}}" class="form-control" required
                   value="{!! old($request_name , $old_value) !!}"/>
        </div>
    </div>
</div>
<!-- END {{$form_name}} -->