@if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Success! </strong> {!!session()->get('success'); !!}.
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Opps! You have an error.</strong>
        @foreach($errors->all() as $error)
            <li><strong>{!! $error; !!}</strong></li>
        @endforeach
    </div>
@endif