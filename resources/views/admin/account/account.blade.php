
@extends('layouts.admin-master')
@section('style')
    <link href="{{asset('public/plugins/bootstrap-toggle/toggle-button.min.css')}}" rel="stylesheet">
    <style>
        .toggle-group{

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
                            <input type="text" placeholder="Search" class="border-light pull-right">
                        </div>
                        <div class="row">
                            <div class="col-xs-7">
                                @include('include.message')

                                <div class="row">
                                    <form class="inline-block" method="post" action="{{route('account.store')}}"
                                          enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="col-xs-4">

                                            <img id="blah" src="{{url('public/storage/default/user.png')}}" alt="your image" class="img img-thumbnail img-responsive mb-5"/>
                                            <input type='file' class="border-light block" onchange="readURL(this);"
                                                   name="image" style="
                                                   /*border: 1px solid #008C8C;*/
                                                   /*background-color: #008C8C;*/
                                                   /*color: transparent;*/
                                                   /*display: inline-block;*/
                                                   /*padding: 6px 12px;*/
                                                   cursor: pointer;"/>
                                            {{--<img src="{{url('public/images/profile/kk.png')}}" alt=""--}}
                                            {{--class="img img-responsive mb-5">--}}
                                            {{--<button class="btn btn-success btn-prime block">Upload</button>--}}
                                        </div>
                                        <div class="col-xs-8">
                                            <li class="mb-7 block">
                                                <h6 class="mt-0 f-11 c-sdark mb-3">Firstname</h6>
                                                <input type="text" class="border-light block" name="fname"
                                                       value="{{ old('fname') }}" autocomplete="off">
                                            </li>
                                            <li class="mb-7 block">
                                                <h6 class="mt-0 f-11 c-sdark mb-3">Middlename</h6>
                                                <input type="text" class="border-light block" name="midname"
                                                       value="{{ old('midname') }}" autocomplete="off">
                                            </li>
                                            <li class="mb-7 block">
                                                <h6 class="mt-0 f-11 c-sdark mb-3">Lastname</h6>
                                                <input type="text" class="border-light block" name="lastname"
                                                       value="{{ old('lastname') }}" autocomplete="off">
                                            </li>
                                            <li class="mb-7 mr-5">
                                                <h6 class="mt-0 f-11 c-sdark mb-3">Department</h6>
                                                <input type="text" class="border-light" style="width:181px;"
                                                       name="department" value="{{ old('department') }}"
                                                       autocomplete="off">
                                            </li>
                                            <li class="mb-7">
                                                <h6 class="mt-0 f-11 c-sdark mb-3">Position</h6>
                                                <input type="text" class="border-light" style="width:181px;"
                                                       name="position" value="{{ old('position') }}" autocomplete="off">
                                            </li>
                                            <li class="mb-7 mr-5">
                                                <h6 class="mt-0 f-11 c-sdark mb-3">Username</h6>
                                                <input type="text" class="border-light" style="width:181px;"
                                                       name="username" value="{{ old('username') }}" autocomplete="off">
                                            </li>
                                            <li class="mb-7">
                                                <h6 class="mt-0 f-11 c-sdark mb-3">Password</h6>
                                                <input type="text" class="border-light" style="width:181px;"
                                                       name="password" value="{{ old('password') }}" autocomplete="off">
                                            </li>
                                            <li class="mb-7">
                                                <h6 class="mt-0 f-11 c-sdark mb-3">Confirm Password</h6>
                                                <input type="text" class="border-light" style="width:181px;"
                                                       name="password_confirmation"
                                                       value="{{ old('password_confirmation') }}" autocomplete="off">
                                            </li>
                                            <input type="submit" class="btn btn-success btn-prime pull-right"
                                                   value="Save">

                                    </form>

                                </div>

                            </div>

                        </div>
                        <div class="col-xs-5">
                            <ul class="ptb-15 border-bot">
                                <?php  $link  = ''; ?>

                                @if(!empty($users))
                                    @component('include.confirm-delete',['link'=>$link])
                                        Are you sure you want to remove this account?
                                    @endcomponent


                                @foreach($users as $user)

                                        <li class="oh mb-24 admin-profile">
                                            <section class="pull-right clearfix" id="btn-group">

                                                <input {{ $status = $user['status'] == 1 ? 'checked':'' }} class="pull-right" data-size="mini" data-style="slow" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="Inactive" type="checkbox">
                                                <a id="btn-edit" href="{{route('account.destroy', $user['user_id'])}}" class="btn btn-default btn-xs"><span class="fa fa-pencil"></span></a>
                                                <a id="btn-delete" href="{{route('account.destroy', $user['user_id'])}}" class="btn btn-default btn-xs"><span class="fa fa-trash-o"></span></a>
                                            </section>
                                            <img src="{{asset('public/storage/'.$user['image_path'])}}" alt=""
                                                 class="pull-left mr-15 img-responsive img-thumbnail" style="max-width:90px;">

                                            <div style="padding-top:0px;" class="mb-15">
                                                <h4>{{ucwords($user['fname']).' '.ucwords($user['midname']).' '.ucwords($user['lastname']) }}</h4>
                                                <h6 class="mt-2 f-11 c-sdark">{{ucwords($user['position'])}}</h6>
                                                <h5 class="mt-3 c-bright-green f-12">{{ucwords($user['department'])}}</h5>
                                            </div>
                                            <div class="oh" style="padding-top:5px;padding-right:15px">
                                                <a href="" data-toggle="tooltip"
                                                   title="{{$user['created_at']->format('F d, Y h:i:s a')}}"
                                                   class="f-10 c-bright-green pull-left">
                                                    Registered Date: <span
                                                            class="c-sdark">{{$user['created_at']->format('F d, Y')}}</span>
                                                </a>

                                            </div>
                                        </li>

                                    @endforeach

                                    <div class="text-center">
                                        {!! $users->render() !!}
                                    </div>

                                @else
                                    <div class="alert alert-info alert-dismissible fade in" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <strong> </strong> No Account Registered.
                                    </div>

                                @endif

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
    <script src="{{asset('public/plugins/bootstrap-toggle/toggle-button.min.js')}}"></script>
    <script type="text/javascript">


        $(document).ready(function(){



            $('#btn-delete').click(function(e){
                e.preventDefault();

                $('#confirm-delete').removeClass('hide');


            });

            $('#btn-group').removeClass('hide');

            $( ".admin-profile" ).hover(
                    function() {
                        $( this ).addClass( "bg-gray");
                    }, function() {
                        $( this ).removeClass( "bg-gray");
                    }
            );

            get_status();

        });

        function get_status(){

            $('#btn-status').click(function(){

                var status =  $(this).attr('data-status');

                $.ajax({
                    url:'{{route('account.status')}}',
                    data: {status:  status},
                    dataType:'html',
                    success: function (data) {

                        if(data == 0){

                            $(this).html('Activate');
                        }
                        else{
                            $(this).html('Deactivate');
                        }
                    }
                });

            });
        }

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







