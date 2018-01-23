@extends('layouts.admin-master')
@section('content')
    <div class="main-content">
        <div class="container" style="min-height: 500px;">
            <div class="row">

                @include('include.admin.account-sidebar')

                <div class="col-xs-10 s-pad">
                    <div class="admin-content bg-white">
                        <div class="head oh border-bot mb-10">
                            <h4 class="pull-left c-bright-green normal">Alumnus Account</h4>
                            <input type="text" placeholder="Search" class="border-light pull-right">
                        </div>
                        <div>
                            <ul class="inline-block">
                                <li class="oh mb-24" data-toggle="modal" data-target="#accountModal">
                                    <img src="../images/batchmates/dale.png" alt="" class="pull-left mr-15" style="max-width:90px;">
                                    <div style="padding-top:0px;" class="mb-15" class="mb-15">
                                        <h4>Dale B. Blanco</h4>
                                        <h5 class="mt-3 c-bright-green">Graduate: <span class="c-sdark">Bachelor of Science in Computer Science</span></h5>
                                        <h6 class="mt-3 c-sdark">Batch 2014-2015</h6>
                                        <h6 class="mt-3 c-sdark">Date Graduated: March 30, 2015</h6>
                                    </div>
                                    <div class="oh" style="padding-top:5px;padding-right:15px">
                                        <a href="" class="f-11 c-bright-green pull-right">View Full Information</a>
                                    </div>
                                </li>
                                <li class="oh mb-24" data-toggle="modal" data-target="#accountModal">
                                    <img src="../images/batchmates/don.png" alt="" class="pull-left mr-15" style="max-width:90px;">
                                    <div style="padding-top:0px;" class="mb-15">
                                        <h4>Don J. Del Rosario</h4>
                                        <h5 class="mt-3 c-bright-green">Graduate: <span class="c-sdark">Bachelor of Science in Computer Science</span></h5>
                                        <h6 class="mt-3 c-sdark">Batch 2014-2015</h6>
                                        <h6 class="mt-3 c-sdark">Date Graduated: March 30, 2015</h6>
                                    </div>
                                    <div class="oh" style="padding-top:5px;padding-right:15px">
                                        <a href="" class="f-11 c-bright-green pull-right">View Full Information</a>
                                    </div>
                                </li>
                                <li class="oh mb-24" data-toggle="modal" data-target="#accountModal">
                                    <img src="../images/batchmates/gian.png" alt="" class="pull-left mr-15" style="max-width:90px;">
                                    <div style="padding-top:0px;" class="mb-15">
                                        <h4>Gian G. Anduyan</h4>
                                        <h5 class="mt-3 c-bright-green">Graduate: <span class="c-sdark">Bachelor of Science in Computer Science</span></h5>
                                        <h6 class="mt-3 c-sdark">Batch 2014-2015</h6>
                                        <h6 class="mt-3 c-sdark">Date Graduated: March 30, 2015</h6>
                                    </div>
                                    <div class="oh" style="padding-top:5px;padding-right:15px">
                                        <a href="" class="f-11 c-bright-green pull-right">View Full Information</a>
                                    </div>
                                </li>
                                <li class="oh mb-24" data-toggle="modal" data-target="#accountModal">
                                    <img src="../images/batchmates/chris.png" alt="" class="pull-left mr-15" style="max-width:90px;">
                                    <div style="padding-top:0px;" class="mb-15">
                                        <h4>Chris B. Olivo</h4>
                                        <h5 class="mt-3 c-bright-green">Graduate: <span class="c-sdark">Bachelor of Science in Computer Science</span></h5>
                                        <h6 class="mt-3 c-sdark">Batch 2014-2015</h6>
                                        <h6 class="mt-3 c-sdark">Date Graduated: March 30, 2015</h6>
                                    </div>
                                    <div class="oh" style="padding-top:5px;padding-right:15px">
                                        <a href="" class="f-11 c-bright-green pull-right">View Full Information</a>
                                    </div>
                                </li>
                                <li class="oh mb-24" data-toggle="modal" data-target="#accountModal">
                                    <img src="../images/batchmates/naks.png" alt="" class="pull-left mr-15" style="max-width:90px;">
                                    <div style="padding-top:0px;" class="mb-15">
                                        <h4>Karl Irvin B. Monteadora</h4>
                                        <h5 class="mt-3 c-bright-green">Graduate: <span class="c-sdark">Bachelor of Science in Computer Science</span></h5>
                                        <h6 class="mt-3 c-sdark">Batch 2014-2015</h6>
                                        <h6 class="mt-3 c-sdark">Date Graduated: March 30, 2015</h6>
                                    </div>
                                    <div class="oh" style="padding-top:5px;padding-right:15px">
                                        <a href="" class="f-11 c-bright-green pull-right">View Full Information</a>
                                    </div>
                                </li>
                                <li class="oh mb-24" data-toggle="modal" data-target="#accountModal">
                                    <img src="../images/batchmates/yoyo.png" alt="" class="pull-left mr-15" style="max-width:90px;">
                                    <div style="padding-top:0px;" class="mb-15">
                                        <h4>Bryan Jecie P. Bahala</h4>
                                        <h5 class="mt-3 c-bright-green">Graduate: <span class="c-sdark">Bachelor of Science in Computer Science</span></h5>
                                        <h6 class="mt-3 c-sdark">Batch 2014-2015</h6>
                                        <h6 class="mt-3 c-sdark">Date Graduated: March 30, 2015</h6>
                                    </div>
                                    <div class="oh" style="padding-top:5px;padding-right:15px">
                                        <a href="" class="f-11 c-bright-green pull-right">View Full Information</a>
                                    </div>
                                </li>
                                <li class="oh mb-24" data-toggle="modal" data-target="#accountModal">
                                    <img src="../images/batchmates/ryan.png" alt="" class="pull-left mr-15" style="max-width:90px;">
                                    <div style="padding-top:0px;" class="mb-15">
                                        <h4>Ryan M. Pastoriza</h4>
                                        <h5 class="mt-3 c-bright-green">Graduate: <span class="c-sdark">Bachelor of Science in Computer Science</span></h5>
                                        <h6 class="mt-3 c-sdark">Batch 2014-2015</h6>
                                        <h6 class="mt-3 c-sdark">Date Graduated: March 30, 2015</h6>
                                    </div>
                                    <div class="oh" style="padding-top:5px;padding-right:15px">
                                        <a href="" class="f-11 c-bright-green pull-right">View Full Information</a>
                                    </div>
                                </li>
                                <li class="oh mb-24" data-toggle="modal" data-target="#accountModal">
                                    <img src="../images/batchmates/leo.png" alt="" class="pull-left mr-15" style="max-width:90px;">
                                    <div style="padding-top:0px;" class="mb-15">
                                        <h4>Leonardo L. Empuesto</h4>
                                        <h5 class="mt-3 c-bright-green">Graduate: <span class="c-sdark">Bachelor of Science in Computer Science</span></h5>
                                        <h6 class="mt-3 c-sdark">Batch 2014-2015</h6>
                                        <h6 class="mt-3 c-sdark">Date Graduated: March 30, 2015</h6>
                                    </div>
                                    <div class="oh" style="padding-top:5px;padding-right:15px">
                                        <a href="" class="f-11 c-bright-green pull-right">View Full Information</a>
                                    </div>
                                </li>
                                <li class="oh mb-24" data-toggle="modal" data-target="#accountModal">
                                    <img src="../images/batchmates/rustom.png" alt="" class="pull-left mr-15" style="max-width:90px;">
                                    <div style="padding-top:0px;" class="mb-15">
                                        <h4>Rustom C. Pedales</h4>
                                        <h5 class="mt-3 c-bright-green">Graduate: <span class="c-sdark">Bachelor of Science in Computer Science</span></h5>
                                        <h6 class="mt-3 c-sdark">Batch 2014-2015</h6>
                                        <h6 class="mt-3 c-sdark">Date Graduated: March 30, 2015</h6>
                                    </div>
                                    <div class="oh" style="padding-top:5px;padding-right:15px">
                                        <a href="" class="f-11 c-bright-green pull-right">View Full Information</a>
                                    </div>
                                </li>
                                <li class="oh mb-15">
                                    <img src="../images/batchmates/kate.png" alt="" class="pull-left mr-15" style="max-width:90px;">
                                    <div style="padding-top:0px;" class="mb-15">
                                        <h4>Karen Kate B. Seronay</h4>
                                        <h5 class="mt-3 c-bright-green">Graduate: <span class="c-sdark">Bachelor of Science in Computer Science</span></h5>
                                        <h6 class="mt-3 c-sdark">Batch 2014-2015</h6>
                                        <h6 class="mt-3 c-sdark">Date Graduated: March 30, 2015</h6>
                                    </div>
                                    <div class="oh" style="padding-top:5px;padding-right:15px">
                                        <a href="" class="f-11 c-bright-green pull-right">View Full Information</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
