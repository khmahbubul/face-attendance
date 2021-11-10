<!-- The Modal -->
<div class="modal" id="logModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">@lang('Attendance Logs')</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body" id="log-body">
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">@lang('Close')</button>
            </div>
        </div>
    </div>
</div>

@push('footer')
<script>
    $(document).ready(function(){
        $(document).on('click', '.log-url', function(){
            let url = $(this).data('url');
            $.get(url, function(data, status){
                $('#log-body').html(data);
            });
        });
    });
</script>
@endpush
