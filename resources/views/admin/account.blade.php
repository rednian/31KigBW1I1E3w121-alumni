@extends('layouts.admin-master')

@section('content')
    <div class="main-content">
        <div class="container" style="min-height: 500px;">
            <div class="row">
                @include('include.admin.account-sidebar')
                <div class="col-xs-10 s-pad">
                    <div class="admin-content bg-white">
                        <div class="head oh border-bot mb-10">
                            <h4 class="pull-left c-bright-green normal">System Administrator</h4>
                            <input type="text" placeholder="Search" class="border-light pull-right">
                        </div>
                        <div class="row">
                            <div class="col-xs-7">
                                @include('include.message')
                                <div class="row">
                                    <form class="inline-block" method="post"  action="{{route('account.store')}}">
                                        {{csrf_field()}}
                                        <div class="col-xs-4">

                                            <img id="blah" src="#" alt="your image" class="img img-responsive mb-5" />
                                            <input type='file' onchange="readURL(this);" />
                                            {{--<img src="{{url('public/images/profile/kk.png')}}" alt=""--}}
                                                 {{--class="img img-responsive mb-5">--}}
                                            {{--<button class="btn btn-success btn-prime block">Upload</button>--}}
                                        </div>
                                        <div class="col-xs-8">
                                            <li class="mb-7 block">
                                                <h6 class="mt-0 f-11 c-sdark mb-3">Firstname</h6>
                                                <input type="text" class="border-light block" name="fname" value="{{ old('fname') }}" autocomplete="off">
                                            </li>
                                            <li class="mb-7 block">
                                                <h6 class="mt-0 f-11 c-sdark mb-3">Middlename</h6>
                                                <input type="text" class="border-light block" name="midname" value="{{ old('midname') }}" autocomplete="off">
                                            </li>
                                            <li class="mb-7 block">
                                                <h6 class="mt-0 f-11 c-sdark mb-3">Lastname</h6>
                                                <input type="text" class="border-light block" name="lastname" value="{{ old('lastname') }}" autocomplete="off">
                                            </li>
                                            <li class="mb-7 mr-5">
                                                <h6 class="mt-0 f-11 c-sdark mb-3">Department</h6>
                                                <input type="text" class="border-light" style="width:181px;" name="department" value="{{ old('department') }}" autocomplete="off">
                                            </li>
                                            <li class="mb-7">
                                                <h6 class="mt-0 f-11 c-sdark mb-3">Position</h6>
                                                <input type="text" class="border-light" style="width:181px;" name="position" value="{{ old('position') }}" autocomplete="off">
                                            </li>
                                            <li class="mb-7 mr-5">
                                                <h6 class="mt-0 f-11 c-sdark mb-3">Username</h6>
                                                <input type="text" class="border-light" style="width:181px;" name="username" value="{{ old('username') }}" autocomplete="off">
                                            </li>
                                            <li class="mb-7">
                                                <h6 class="mt-0 f-11 c-sdark mb-3">Password</h6>
                                                <input type="text" class="border-light" style="width:181px;" name="password" value="{{ old('password') }}" autocomplete="off">
                                            </li>
                                            <li class="mb-7">
                                                <h6 class="mt-0 f-11 c-sdark mb-3">Confirm Password</h6>
                                                <input type="text" class="border-light" style="width:181px;" name="password_confirmation" value="{{ old('password_confirmation') }}" autocomplete="off">
                                            </li>
                                            <input type="submit" class="btn btn-success btn-prime pull-right"
                                                   value="Save">

                                    </form>

                                </div>

                            </div>

                        </div>
                        <div class="col-xs-5">
                            <ul class="ptb-15 border-bot">
                                @foreach($admin_user as $user)
                                    <?php $carbon = new \Carbon\Carbon($user['created_at']); ?>
                                    <li class="oh mb-24">
                                        <img src="{{url('public/images/batchmates/don.png')}}" alt=""
                                             class="pull-left mr-15" style="max-width:90px;">

                                        <div style="padding-top:0px;" class="mb-15">
                                            <h4>{{ucwords($user['fname']).' '.ucwords($user['midname']).' '.ucwords($user['lastname']) }}</h4>
                                            <h6 class="mt-2 f-11 c-sdark">{{ucwords($user['position'])}}</h6>
                                            <h5 class="mt-3 c-bright-green f-12">{{ucwords($user['department'])}}</h5>
                                        </div>
                                        <div class="oh" style="padding-top:5px;padding-right:15px">
                                            <a href="" data-toggle="tooltip" title="{{$carbon->format('M d, Y h:i:s a')}}" class="f-10 c-bright-green pull-left">
                                                Registered Date: <span  class="c-sdark">{{$carbon->format('M d, Y')}}</span>
                                            </a>
                                            <a href="" class="f-10 c-bright-green pull-right btn btn-default box-edge" style="padding:0px 7px">Deactivate</a>
                                            <a href="" class="f-10 pull-right btn btn-success btn-prime box-edge mr-5"
                                               style="padding:0px 7px;">Activate</a>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

    </script>

@endsection







