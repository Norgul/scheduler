<!-- Modal -->
@if(\Illuminate\Support\Facades\Auth::user())
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
    <script>
        $('#confirm-reservation').on('show.bs.modal', function (e) {
            $(this).find('.dropdown-menu li').remove();
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
            var startTime = moment($(e.relatedTarget).data('start-time')).utc();
            var endTime = moment($(e.relatedTarget).data('end-time')).utc();

            while (startTime < endTime) {
                $(this).find('.dropdown-menu').append('<li><a href="#">' + startTime.format("HH:mm") + '</a></li>');
                startTime.add(30, 'minutes');
            }

            $(document).on('click', '#confirm-reservation .dropdown-menu a', function () {
                $('#insert_text').text($(this).text());
                var href = $(e.relatedTarget).data('href');
                var time = moment().year(startTime.format("Y")).month(startTime.format("M")).date(startTime.format("D"))
                        .hour(($(this).text().split(':')[0]) - 2).minutes($(this).text().split(':')[1]).seconds("0");

                console.log(time);

                $('.btn-ok').attr('href', href + '/' + time.unix());
            });
        });


    </script>
@else
    <div class="modal fade" id="confirm-reservation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    Not logged in
                </div>
                <div class="modal-body">
                    You need to be logged in to make a reservation
                </div>
                <div class="modal-footer">
                    <a class="btn btn-primary btn-ok" href="{{url('/login')}}">Login</a>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

@endif
