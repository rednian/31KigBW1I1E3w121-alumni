@extends('layouts.admin-master')
@section('style')
    <link href="{{asset('public/plugins/bootstrap-toggle/toggle-button.min.css')}}" rel="stylesheet">
    <style>
        .toggle-group {

        }
    </style>
@endsection
@section('content')
    <div class="main-content">
        <div class="container" style="min-height: 500px;">
            <div class="row">
                @include('include.admin.account-sidebar')
                <div class="col-xs-10 s-pad">
                    <div class="admin-content bg-white">
                        <div class="head oh border-bot mb-10">
                            <h4 class="pull-left c-bright-green normal">System Administrator</h4>
                        </div>

                        <section class="row">
                            <div class="col-md-12">
                                @include('include.message')
                            </div>
                        </section>

                        <section class="row">
                            <div class="col-md-5 col-sm-5 col-xs-12">
                                <div class="panel panel-success">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Register Administrator Account</h3>
                                    </div>
                                    <div class="panel-body">
                                        <form class="inline-block" method="post" action="{{route('account.store')}}" enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            <section class="row">

                                                <div class="col-xs-4">
                                                    <img id="blah" src="{{url('public/storage/default/user.png')}}" alt="your image"
                                                         class="img img-thumbnail img-responsive mb-5"/>
                                                    <input accept="image/x-png, image/jpeg" type='file' class="border-light block"
                                                           onchange="readURL(this);" name="image" style="cursor: pointer;"/>
                                                </div>
                                                <div class="col-xs-8">

                                                    <div class="form-group {{ $errors->has('fname') ? ' has-error' : '' }}">
                                                        <label>Firstname<code>*</code></label>
                                                        <input type="text" class="form-control input-sm" name="fname" value="{{ old('fname') }}"
                                                               autocomplete="off" autofocus>
                                                        @if ($errors->has('fname'))
                                                            <span class="help-block">
                                                                 <strong>{{ $errors->first('fname') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>

                                                    <div class="form-group {{ $errors->has('midname') ? ' has-error' : '' }}">
                                                        <label>Middlename</label>
                                                        <input type="text" class="form-control input-sm" name="midname" value="{{ old('midname') }}"
                                                               autocomplete="off">
                                                        @if ($errors->has('midname'))
                                                            <span class="help-block">
                                                                 <strong>{{ $errors->first('midname') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>

                                                </div>

                                            </section>
                                            <section class="row">

                                                <div class="col-xs-12">

                                                    <div class="form-group {{ $errors->has('lastname') ? ' has-error' : '' }}">
                                                        <label>Lastname<code>*</code></label>
                                                        <input type="text" class="form-control input-sm" name="lastname" value="{{ old('lastname') }}"
                                                               autocomplete="off">
                                                        @if ($errors->has('lastname'))
                                                            <span class="help-block">
                                                                 <strong>{{ $errors->first('lastname') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>

                                                    <div class="form-group {{ $errors->has('department') ? ' has-error' : '' }}">
                                                        <label>Department<code>*</code></label>
                                                        <input type="text" class="form-control input-sm" name="department"
                                                               value="{{ old('department') }}" autocomplete="off">
                                                        @if ($errors->has('department'))
                                                            <span class="help-block">
                                                                 <strong>{{ $errors->first('department') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>

                                                    <div class="form-group {{ $errors->has('position') ? ' has-error' : '' }}">
                                                        <label>Position<code>*</code></label>
                                                        <input type="text" class="form-control input-sm" name="position" value="{{ old('position') }}"
                                                               autocomplete="off">
                                                        @if ($errors->has('position'))
                                                            <span class="help-block">
                                                                 <strong>{{ $errors->first('position') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>

                                                    <div class="form-group {{ $errors->has('username') ? ' has-error' : '' }}">
                                                        <label>Username<code>*</code></label>
                                                        <input type="text" class="form-control input-sm" name="username" value="{{ old('username') }}"
                                                               autocomplete="off">
                                                        @if ($errors->has('username'))
                                                            <span class="help-block">
                                                                 <strong>{{ $errors->first('username') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>

                                                    <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                                                        <label>Password<code>*</code></label>
                                                        <input type="text" class="form-control input-sm" name="password" value="{{ old('password') }}"
                                                               autocomplete="off">
                                                        @if ($errors->has('password'))
                                                            <span class="help-block">
                                                                 <strong>{{ $errors->first('password') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>

                                                    <div class="form-group {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                                        <label>Confirm Password<code>*</code></label>
                                                        <input type="text" class="form-control input-sm" name="password_confirmation"
                                                               value="{{ old('password_confirmation') }}" autocomplete="off">
                                                        @if ($errors->has('password_confirmation'))
                                                            <span class="help-block">
                                                                 <strong>{{ $errors->first('password_confirmation') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>

                                                    <button type="submit" class="btn btn-success btn-prime pull-right">Save</button>

                                                </div>
                                            </section>
                                        </form>

                                    </div>


                                </div>
                            </div>
                            <div class="col-md-7 col-sm-7 col-xs-12">

                                <div class="panel panel-success">
                                    <div class="panel-heading clearfix">
                                        <section class="row">
                                            <div class="col-xs-7">
                                                <h3 class="panel-title pull-left">List of Administrator</h3>
                                            </div>
                                            <div class="col-xs-5">
                                                <div class="form-group">
                                                    <input type="text" placeholder="Search" class="form-control input-sm pull-right">
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                    <div class="panel-body">

                                        <ul class="ptb-15 border-bot">
                                            <?php  $link = ''; ?>

                                            @if(!empty($users))
                                                @component('include.confirm-delete',['link'=>$link])
                                                Are you sure you want to remove this account?
                                                @endcomponent


                                                @foreach($users as $user)


                                                    <li class="oh mb-24 admin-profile">
                                                        <section class="pull-right clearfix" id="btn-group">
                                                            <a id="btn-edit" href="{{route('account.edit',['user'=>$user])}}"
                                                               class="btn btn-default btn-xs hide"><span class="fa fa-pencil"></span></a>
                                                            @if(Auth::user()->user_id != $user['user_id'])
                                                                <a id="btn-delete" href="{{route('account.destroy', $user['user_id'])}}"
                                                                class="btn btn-default btn-xs hide"><span class="fa fa-trash-o"></span></a>
                                                            @endif
                                                        </section>
                                                        <img src="{{asset('public/storage/'.$user['image_path'])}}" alt=""
                                                             class="pull-left mr-15 img-responsive img-thumbnail" style="max-width:90px;">

                                                        <div style="padding-top:0px;" class="mb-15">
                                                            <h4>{{ucwords($user['fname']).' '.ucwords($user['midname']).' '.ucwords($user['lastname']) }}</h4>
                                                            <h6 class="mt-2 f-11 c-sdark">{{ucwords($user['position'])}}</h6>
                                                            <h5 class="mt-3 c-bright-green f-12">{{ucwords($user['department'])}}</h5>

                                                            <div>
                                                                <input {{$disabled = Auth::user()->user_id == $user['user_id'] ? 'disabled': ''}}
                                                                        name="status" data-user_id="{{$user['user_id']}}"
                                                                        data-status="{{$user['status']}}" {{ $status = $user['status'] == 1 ? 'checked':'' }}
                                                                        class="pull-right" data-size="mini" data-style="slow" data-onstyle="success"
                                                                        data-offstyle="warning" data-toggle="toggle" data-on="Active"
                                                                        data-off="Deactivated"
                                                                        type="checkbox">
                                                            </div>
                                                        </div>
                                                        <div class="oh" style="padding-top:5px;padding-right:15px">
                                                            <strong data-toggle="tooltip"
                                                                    title="{{$user['created_at']->format('F d, Y h:i:s a')}}"
                                                                    class="f-10 c-bright-green pull-left">
                                                                Registered Date: <span
                                                                        class="c-sdark">{{$user['created_at']->format('F d, Y')}}</span>
                                                            </strong>

                                                        </div>
                                                    </li>

                                                @endforeach

                                                <div class="text-center">
                                                    {!! $users->render() !!}
                                                </div>

                                            @else
                                                <div class="alert alert-info alert-dismissible fade in" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                                                aria-hidden="true">&times;</span></button>
                                                    <strong> </strong> No Account Registered.
                                                </div>

                                            @endif

                                        </ul>

                                    </div>
                                </div>
                            </div>
                        </section>


                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('script')
    <script src="{{asset('public/plugins/bootstrap-toggle/toggle-button.min.js')}}"></script>
    <script type="text/javascript">


        $(document).ready(function () {

            get_status();


            $('#btn-delete').click(function (e) {

                e.preventDefault();

                $('#confirm-delete').removeClass('hide');
            });

            $('#btn-group').removeClass('hide');

            $('li.admin-profile').hover(
                    function () {

                        var el = $(this).addClass("bg-gray").find('a');

                        el.removeClass('hide');
                    },
                    function () {

                        var el = $(this).removeClass("bg-gray").find('a');

                        el.addClass('hide');
                    }
            );
        });

        function get_status() {

            $('input[name="status"]').change(function () {

                var status = $(this).attr('data-status') == 1 ? 0 : 1;
                var user_id = $(this).attr('data-user_id');

                $.ajax({
                    url: '{{route('account.status')}}',
                    data: {status: status, user_id: user_id, _token: '{{csrf_token()}}'},
                    dataType: 'json',
                    success: function (data) {
//                        console(data);
                    }
                });


            });

        }

        function readURL(input) {

            $('#blah').attr('src', localStorage.getItem('file'));

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







