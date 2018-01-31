@extends('layouts.admin-master')

@section('content')
    <div class="main-content">
        <div class="container" style="min-height: 500px;">
            <div class="row">
                @include('include.admin.account-sidebar')
                <div class="col-xs-10 s-pad">
                    <div class="admin-content bg-white">
                        <div class="head oh border-bot mb-10">
                            <h4 class="pull-left c-bright-green normal">Company</h4>
                        </div>

                        <div>
                            <ul class="inline-block">
                                <li class="oh mb-24 mr-15" data-toggle="modal" data-target="#accountModal" style="max-width:300px;">
                                    <img src="../images/azurelogo.png" alt="" class="pull-left mr-15" style="max-width:90px;">
                                    <div style="padding-top:0px;" class="mb-15 oh">
                                        <h4>AZURE Mindstream Company Incorporated</h4>
                                        <h6 class="mt-3 c-sdark mb-5">Los Angeles California, USA</h6>
                                        <h5 class="mt-3 c-bright-green">Contact Information</h5>
                                        <h6 class="mt-3 c-sdark">Tel#: 225-9568</h6>
                                        <h6 class="mt-3 c-sdark">Cell#: (+63)9096152598</h6>
                                        <h6 class="mt-3 c-sdark">Email: dalecious@gmail.com</h6>
                                    </div>
                                </li>
                                <li class="oh mb-24 mr-15" data-toggle="modal" data-target="#accountModal" style="max-width:300px;">
                                    <img src="../images/mitlogo.png" alt="" class="pull-left mr-15" style="max-width:90px;">
                                    <div style="padding-top:0px;" class="mb-15 oh">
                                        <h4>Mittal Solutions Incorporated</h4>
                                        <h6 class="mt-3 c-sdark mb-5">Los Angeles California, USA</h6>
                                        <h5 class="mt-3 c-bright-green">Contact Information</h5>
                                        <h6 class="mt-3 c-sdark">Tel#: 225-9568</h6>
                                        <h6 class="mt-3 c-sdark">Cell#: (+63)9096152598</h6>
                                        <h6 class="mt-3 c-sdark">Email: dalecious@gmail.com</h6>
                                    </div>
                                </li>
                                <li class="oh mb-24 mr-15" data-toggle="modal" data-target="#accountModal" style="max-width:300px;">
                                    <img src="../images/ibmlogo.png" alt="" class="pull-left mr-15" style="max-width:90px;">
                                    <div style="padding-top:0px;" class="mb-15 oh">
                                        <h4>International Business Machine</h4>
                                        <h6 class="mt-3 c-sdark mb-5">Los Angeles California, USA</h6>
                                        <h5 class="mt-3 c-bright-green">Contact Information</h5>
                                        <h6 class="mt-3 c-sdark">Tel#: 225-9568</h6>
                                        <h6 class="mt-3 c-sdark">Cell#: (+63)9096152598</h6>
                                        <h6 class="mt-3 c-sdark">Email: dalecious@gmail.com</h6>
                                    </div>
                                </li>
                                <li class="oh mb-24 mr-15" data-toggle="modal" data-target="#accountModal" style="max-width:300px;">
                                    <img src="../images/azurelogo.png" alt="" class="pull-left mr-15" style="max-width:90px;">
                                    <div style="padding-top:0px;" class="mb-15 oh">
                                        <h4>AZURE Mindstream Company Incorporated</h4>
                                        <h6 class="mt-3 c-sdark mb-5">Los Angeles California, USA</h6>
                                        <h5 class="mt-3 c-bright-green">Contact Information</h5>
                                        <h6 class="mt-3 c-sdark">Tel#: 225-9568</h6>
                                        <h6 class="mt-3 c-sdark">Cell#: (+63)9096152598</h6>
                                        <h6 class="mt-3 c-sdark">Email: dalecious@gmail.com</h6>
                                    </div>
                                </li>
                                <li class="oh mb-24 mr-15" data-toggle="modal" data-target="#accountModal" style="max-width:300px;">
                                    <img src="../images/mitlogo.png" alt="" class="pull-left mr-15" style="max-width:90px;">
                                    <div style="padding-top:0px;" class="mb-15 oh">
                                        <h4>Mittal Solutions Incorporated</h4>
                                        <h6 class="mt-3 c-sdark mb-5">Los Angeles California, USA</h6>
                                        <h5 class="mt-3 c-bright-green">Contact Information</h5>
                                        <h6 class="mt-3 c-sdark">Tel#: 225-9568</h6>
                                        <h6 class="mt-3 c-sdark">Cell#: (+63)9096152598</h6>
                                        <h6 class="mt-3 c-sdark">Email: dalecious@gmail.com</h6>
                                    </div>
                                </li>
                                <li class="oh mb-24 mr-15" data-toggle="modal" data-target="#accountModal" style="max-width:300px;">
                                    <img src="../images/ibmlogo.png" alt="" class="pull-left mr-15" style="max-width:90px;">
                                    <div style="padding-top:0px;" class="mb-15 oh">
                                        <h4>International Business Machine</h4>
                                        <h6 class="mt-3 c-sdark mb-5">Los Angeles California, USA</h6>
                                        <h5 class="mt-3 c-bright-green">Contact Information</h5>
                                        <h6 class="mt-3 c-sdark">Tel#: 225-9568</h6>
                                        <h6 class="mt-3 c-sdark">Cell#: (+63)9096152598</h6>
                                        <h6 class="mt-3 c-sdark">Email: dalecious@gmail.com</h6>
                                    </div>
                                </li>
                                <li class="oh mb-24 mr-15" data-toggle="modal" data-target="#accountModal" style="max-width:300px;">
                                    <img src="../images/azurelogo.png" alt="" class="pull-left mr-15" style="max-width:90px;">
                                    <div style="padding-top:0px;" class="mb-15 oh">
                                        <h4>AZURE Mindstream Company Incorporated</h4>
                                        <h6 class="mt-3 c-sdark mb-5">Los Angeles California, USA</h6>
                                        <h5 class="mt-3 c-bright-green">Contact Information</h5>
                                        <h6 class="mt-3 c-sdark">Tel#: 225-9568</h6>
                                        <h6 class="mt-3 c-sdark">Cell#: (+63)9096152598</h6>
                                        <h6 class="mt-3 c-sdark">Email: dalecious@gmail.com</h6>
                                    </div>
                                </li>
                                <li class="oh mb-24 mr-15" data-toggle="modal" data-target="#accountModal" style="max-width:300px;">
                                    <img src="../images/mitlogo.png" alt="" class="pull-left mr-15" style="max-width:90px;">
                                    <div style="padding-top:0px;" class="mb-15 oh">
                                        <h4>Mittal Solutions Incorporated</h4>
                                        <h6 class="mt-3 c-sdark mb-5">Los Angeles California, USA</h6>
                                        <h5 class="mt-3 c-bright-green">Contact Information</h5>
                                        <h6 class="mt-3 c-sdark">Tel#: 225-9568</h6>
                                        <h6 class="mt-3 c-sdark">Cell#: (+63)9096152598</h6>
                                        <h6 class="mt-3 c-sdark">Email: dalecious@gmail.com</h6>
                                    </div>
                                </li>
                                <li class="oh mb-24 mr-15" data-toggle="modal" data-target="#accountModal" style="max-width:300px;">
                                    <img src="../images/ibmlogo.png" alt="" class="pull-left mr-15" style="max-width:90px;">
                                    <div style="padding-top:0px;" class="mb-15 oh">
                                        <h4>International Business Machine</h4>
                                        <h6 class="mt-3 c-sdark mb-5">Los Angeles California, USA</h6>
                                        <h5 class="mt-3 c-bright-green">Contact Information</h5>
                                        <h6 class="mt-3 c-sdark">Tel#: 225-9568</h6>
                                        <h6 class="mt-3 c-sdark">Cell#: (+63)9096152598</h6>
                                        <h6 class="mt-3 c-sdark">Email: dalecious@gmail.com</h6>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div id="accountModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-sm smx">
            <!-- Modal content-->
            <div class="modal-content box-edge">
                <div class="modal-body p-25 oh">
                    <h5 class="f-13 c-dark mt-0 mb-5">User Account</h5>
                    <h2 class="c-bright-green mt-0 f-24 mb-3">AZURE Mindstream Company Incorporated</h2>
                    <h5 class="f-13 c-dark mt-0 mb-24">Los Angeles California, USA</h5>


                    <ul class="inline-block mb-15">
                        <li class="mb-7 block">
                            <h6 class="mt-0 f-12 c-sdark mb-3">Username</h6>
                            <input type="text" class="border-light block">
                        </li>
                        <li class="mb-7 block">
                            <h6 class="mt-0 f-12 c-sdark mb-3">Password</h6>
                            <input type="text" class="border-light block">
                        </li>
                    </ul>
                    <button class="btn btn-success btn-prime box-edge pull-right">Save</button>
                </div>
            </div>
        </div>
    </div>




@endsection