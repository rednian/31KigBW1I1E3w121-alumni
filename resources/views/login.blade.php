
@extends('layouts/alumnus/alumnus-master')

@section('content')

<div class="container">
            
    <div class="row">
        
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
            

            <form method="POST" class="form-horizontal" action="{{ route('loginValidate') }}" style="margin-top:150px;">
                {{ csrf_field() }}
                <div class="form-group">
                    <label class="control-label col-sm-2" for="username">Username:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="username" placeholder="Enter username" name="username" value="{{ old('username') }}" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2" for="password">Password:</label>
                    <div class="col-sm-10">          
                        <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" value="{{ old('password') }}" required>
                    </div>
                </div>

                <div class="form-group">        
                    <div class="col-sm-offset-10 col-sm-2">
                        <button type="submit" class="btn btn-default">Submit</button>
                    </div>
                </div>
            </form>
            
            @include('layouts/alumnus/messages')
                       

        </div>
        <div class="col-lg-3"></div>

    </div>

</div>

<<<<<<< HEAD



=======
>>>>>>> alumnus
@endsection
