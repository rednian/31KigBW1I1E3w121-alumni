@extends('layouts.admin-master')
@section('content')
    <div class="main-content">
        <div class="container" style="min-height: 500px;">
            <div class="row">
                <div class="col-xs-2 s-pad">
                    <div class="bg-white admin-left-pane" style="padding:0 15px;">
                        <ul class="f-12">
                            <li class="active"><a href="company_visitor.html" class="c-bright-green">Visitor</a></li>
                            <li><a href="company_company.html" class="c-bright-green">Company</a></li>
                            <li><a href="company_updates.html" class="c-bright-green">Updates Monitor</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-xs-10 s-pad">
                    <div class="admin-content bg-white">
                        <div class="head oh border-bot mb-10">
                            <h4 class="pull-left c-bright-green normal">Visitor</h4>
                            <div class="right-element pull-right c-bright-green">
                                <input type="text" placeholder="Search" class="border-light">
                            </div>
                        </div>
                        <ul>
                            <li class="oh border-bot ptb-10">
                                <div>
                                    <div class="pull-left mr-45 c-dark">
                                        <h4 class="f-14 bold mb-3 mt-0" style="width:300px;">AZURE Mindsteream Company Incorporated</h4>
                                        <div class="f-10">
                                            <span>Los Angeles, California USA</span>
                                            <span class="pull-right c-bright-green">08/22/2017 <span class="ml-15 c-bright-green">12:00 PM</span></span>
                                        </div>
                                    </div>
                                    <button class="mr-24 btn-admin c-bright-green">more information</button>
                                    <button button class="mr-24 btn-admin c-bright-green">send message</button>
                                </div>
                            </li>
                            <li class="oh border-bot ptb-10">
                                <div>
                                    <div class="pull-left mr-45 c-dark">
                                        <h4 class="f-14 bold mb-3 mt-0" style="width:300px;">AZURE Mindsteream Company Incorporated</h4>
                                        <div class="f-10">
                                            <span>Los Angeles, California USA</span>
                                            <span class="pull-right c-bright-green">08/22/2017 <span class="ml-15 c-bright-green">12:00 PM</span></span>
                                        </div>
                                    </div>
                                    <button class="mr-24 btn-admin c-bright-green">more information</button>
                                    <button button class="mr-24 btn-admin c-bright-green">send message</button>
                                </div>
                            </li>
                            <li class="oh border-bot ptb-10">
                                <div>
                                    <div class="pull-left mr-45 c-dark">
                                        <h4 class="f-14 bold mb-3 mt-0" style="width:300px;">AZURE Mindsteream Company Incorporated</h4>
                                        <div class="f-10">
                                            <span>Los Angeles, California USA</span>
                                            <span class="pull-right c-bright-green">08/22/2017 <span class="ml-15 c-bright-green">12:00 PM</span></span>
                                        </div>
                                    </div>
                                    <button class="mr-24 btn-admin c-bright-green">more information</button>
                                    <button button class="mr-24 btn-admin c-bright-green">send message</button>
                                </div>
                            </li>
                            <li class="oh border-bot ptb-10">
                                <div>
                                    <div class="pull-left mr-45 c-dark">
                                        <h4 class="f-14 bold mb-3 mt-0" style="width:300px;">AZURE Mindsteream Company Incorporated</h4>
                                        <div class="f-10">
                                            <span>Los Angeles, California USA</span>
                                            <span class="pull-right c-bright-green">08/22/2017 <span class="ml-15 c-bright-green">12:00 PM</span></span>
                                        </div>
                                    </div>
                                    <button class="mr-24 btn-admin c-bright-green">more information</button>
                                    <button button class="mr-24 btn-admin c-bright-green">send message</button>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection