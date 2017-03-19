<div class="modal fade" id="confirm-reservation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                New reservation
            </div>
            <div class="modal-body">
                Are you sure you want to add this reservation?
                <br><br>

                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Reserve
                        until <span class="caret"></span></button>
                    &nbsp; &nbsp; <span id="insert_text"></span>
                    <ul class="dropdown-menu">
                    </ul>
                </div>
            </div>
            <div class="modal-footer">
                <a class="btn btn-primary btn-ok">Yes</a>
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>

@include('landing_partials.generic_modal', [
'modal_id' => 'unauthorized-modal',
'title' => 'Not logged in',
'body' => 'You need to be logged in to make a reservation',
'route' => '/login',
'confirm_message' => 'Login',
'cancel_message' => 'Cancel',
'has_ok_button' => true
])

@include('landing_partials.generic_modal', [
'modal_id' => 'unable-to-use-modal',
'title' => 'Not allowed' ,
'body' => 'You are not allowed to use this instrument without supervision',
'cancel_message' => 'Ok',
'has_ok_button' => false
])

@include('landing_partials.generic_modal', [
'modal_id' => 'unable-to-edit-modal',
'title' => 'Not allowed' ,
'body' => 'You are not allowed to start, edit or terminate this reservation',
'cancel_message' => 'Ok',
'has_ok_button' => false
])

<div class="modal fade" id="booking-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                Choose an option
            </div>
            <div class="modal-body">
                Would you like to run, edit or terminate this booking?
            </div>
            <div class="modal-footer">
                <a class="btn btn-primary btn-run">Run</a>
                <a class="btn btn-info btn-edit">Edit</a>
                <a class="btn btn-danger btn-terminate">Terminate</a>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<script>
    $('#booking-modal').on('show.bs.modal', function (e) {
        $('.btn-run').attr('href', '../reservation/' + $(e.relatedTarget).data('reservation-id') + '/run');
        $('.btn-edit').attr('href', '../reservation/' + $(e.relatedTarget).data('reservation-id') + '/edit');
        $('.btn-terminate').attr('href', '../reservation/' + $(e.relatedTarget).data('reservation-id') + '/terminate');
    });
</script>