
@extends('layouts/alumnus/alumnus-master')


@section('content')

<!-- <form action="{{ route('loginValidate') }}" method="POST">
	{{ csrf_field() }}
		
	<input type="text" class="username" name="username">
	<input type="password" class="password" name="password">

	<button>Submit</button>

</form>
 -->

<div class="container">
            
    <div class="row">
        
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
            
            <form method="GET" class="form-horizontal" action="{{ route('loginValidate') }}" style="margin-top:150px;">

                <div class="form-group">
                    <label class="control-label col-sm-2" for="username">Email:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="username" placeholder="Enter username" name="username" value="{{ old('username') }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2" for="password">Password:</label>
                    <div class="col-sm-10">          
                        <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" value="{{ old('password') }}">
                    </div>
                </div>

                <div class="form-group">        
                    <div class="col-sm-offset-10 col-sm-2">
                        <button type="submit" class="btn btn-default">Submit</button>
                    </div>
                </div>
            </form>
            
            

        </div>
        <div class="col-lg-3"></div>

    </div>

</div>


er


@endsection

@section('script')
	
	
<script>
	

</script>

@endsection