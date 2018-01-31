<div id="confirm-delete" class="alert alert-danger alert-dismissible fade in hide" role="alert">
    {{--<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>--}}
    <h4>Confirm Delete</h4>

    <p> {{ $slot }}</p>

        <button type="button" class="btn btn-danger">Yes</button>
        <button type="button" class="btn btn-default">Cancel</button>
    </p>
</div>

