@extends('layouts.admin-master')

@section('content')
    <div class="main-content">
        <div class="container" style="min-height: 500px;">
            <div class="row">
                @include('include.admin.account-sidebar')
                <div class="col-xs-10 s-pad">
                    <div class="admin-content bg-white">
                        <div class="head oh border-bot mb-10">
                              @include('include.message')
                            <h4 class="pull-left c-bright-green normal">Company</h4>
                        </div>

                            <section class="row">

                                <div class="col-md-3">
                                    <section class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Register New Company</h3>
                                        </div>
                                        <div class="panel-body">
                                            <form class="form" method="post" action="{{route('company.store')}}">
                                               {{csrf_field()}}
                                                <div class="form-group">
                                                    <label>Company Name</label>
                                                    <input type="text" name="company_name" value="{{old('company_name')}}" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="email" name="email" class="form-control" value="{{old('email')}}" placeholder="Company Email">
                                                </div>
                                                 <div class="form-group">
                                                </div>
                                                 <button type="submit" class="btn btn-success btn-prime box-edge pull-right">Register</button>
                                            </form>
                                        </div>
                                    </section>
                                </div>
                                <div class="col-md-9">
                                    
                                    <ul class="inline-block">
                                        <li class="oh mb-24 mr-15" style="max-width:300px;">
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
                            </section>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection