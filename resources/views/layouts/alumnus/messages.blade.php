
<!-- ERRORS -->


@if(!empty($errors) && count($errors) > 0)
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Opps! You have an error.</strong>
        @foreach($errors->all() as $error)
            <li><strong>{!! $error; !!}</strong></li>
        @endforeach
    </div>
@endif


<!-- CUSTOM MESSAGES -->


@if (session('invalidAccount'))
    <div class="alert alert-danger">
        {{ session('invalidAccount') }}
    </div>
@endif

