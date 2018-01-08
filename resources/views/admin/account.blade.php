@extends('layouts.admin-master')

@section('content')
    <div class="main-content">
        <div class="container" style="min-height: 500px;">
            <div class="row">
                <div class="col-xs-2 s-pad">
                    <div class="bg-white admin-left-pane" style="padding:0 15px;">
                        <ul class="f-12">
                            <li class="active"><a href="account_sysad.html" class="c-bright-green">System Administrator</a></li>
                            <li><a href="account_alumnus.html" class="c-bright-green">Alumnus</a></li>
                            <li><a href="account_partners.html" class="c-bright-green">Partners</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-xs-10 s-pad">
                    <div class="admin-content bg-white">
                        <div class="head oh border-bot mb-10">
                            <h4 class="pull-left c-bright-green normal">System Administrator</h4>
                            <input type="text" placeholder="Search" class="border-light pull-right">
                        </div>
                        <div class="row">
                            <div class="col-xs-7">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <img src="{{url('public/images/profile/kk.png')}}" alt="" class="img img-responsive mb-5">
                                        <button class="btn btn-success btn-prime block">Upload</button>
                                    </div>
                                    <div class="col-xs-8">
                                        <ul class="inline-block">
                                            <li class="mb-7 block">
                                                <h6 class="mt-0 f-11 c-sdark mb-3">Firstname</h6>
                                                <input type="text" class="border-light block">
                                            </li>
                                            <li class="mb-7 block">
                                                <h6 class="mt-0 f-11 c-sdark mb-3">Middlename</h6>
                                                <input type="text" class="border-light block">
                                            </li>
                                            <li class="mb-7 block">
                                                <h6 class="mt-0 f-11 c-sdark mb-3">Lastname</h6>
                                                <input type="text" class="border-light block">
                                            </li>
                                            <li class="mb-7 mr-5">
                                                <h6 class="mt-0 f-11 c-sdark mb-3">Department</h6>
                                                <input type="text" class="border-light" style="width:181px;">
                                            </li>
                                            <li class="mb-7">
                                                <h6 class="mt-0 f-11 c-sdark mb-3">Position</h6>
                                                <input type="text" class="border-light" style="width:181px;">
                                            </li>
                                            <li class="mb-7 mr-5">
                                                <h6 class="mt-0 f-11 c-sdark mb-3">Username</h6>
                                                <input type="text" class="border-light" style="width:181px;">
                                            </li>
                                            <li class="mb-7">
                                                <h6 class="mt-0 f-11 c-sdark mb-3">Password</h6>
                                                <input type="text" class="border-light" style="width:181px;">
                                            </li>
                                        </ul>
                                        <button class="btn btn-success btn-prime pull-right">Save</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-5">
                                <ul class="ptb-15 border-bot">
                                    @for($x = 0; $x < 6; $x++)
                                    <li class="oh mb-24">
                                        <img src="{{url('public/images/batchmates/don.png')}}" alt="" class="pull-left mr-15" style="max-width:90px;">
                                        <div style="padding-top:0px;" class="mb-15">
                                            <h4>Don J. Del Rosario</h4>
                                            <h6 class="mt-2 f-11 c-sdark">Department Head</h6>
                                            <h5 class="mt-3 c-bright-green f-12">Office of the Student Affairs and Services</h5>
                                        </div>
                                        <div class="oh" style="padding-top:5px;padding-right:15px">
                                            <a href="" class="f-10 c-bright-green pull-left">Registered Date: <span class="c-sdark">07/25/2017</span></a>
                                            <a href="" class="f-10 c-bright-green pull-right btn btn-default box-edge" style="padding:0px 7px">Deactivate</a>
                                            <a href="" class="f-10 pull-right btn btn-success btn-prime box-edge mr-5" style="padding:0px 7px;">Activate</a>
                                        </div>
                                    </li>
                                    @endfor
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

