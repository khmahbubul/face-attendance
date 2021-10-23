<!-- The Modal -->
<div class="modal" id="deleteModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">@lang('Alert')</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <h5>@lang('Are you sure?')</h5>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <form id="d-form" action="" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-success">@lang('Yes')</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">@lang('No')</button>
                </form>
            </div>

        </div>
    </div>
</div>

@push('footer')
<script>
    $(document).ready(function () {
        $(document).on('click', '.d-url', function () {
            $('#d-form').attr('action', $(this).data('url'));
        });
    });
</script>
@endpush
