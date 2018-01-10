
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
            

            <form action="POST" id="loginForm" style="margin-top:150px;box-shadow: 1px 1px 1px 1px #999999;  padding:50px;" >

                <input type="text" class="form-control" required="required" placeholder="Student ID"><br>
                <!-- <input type="password" class="form-control hidden" placeholder="Password"> -->
                
                <br>
                <button type="button" id="next" class="btn btn-primary pull-right">Next</button>
                


            </form>



        </div>
        <div class="col-lg-3"></div>

    </div>

</div>



@endsection

@section('script')
	
	
<script>
	
	$("#next").click(function(event) {
		alert();
	});

</script>

@endsection