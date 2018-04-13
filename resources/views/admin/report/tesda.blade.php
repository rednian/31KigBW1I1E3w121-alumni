@extends('layouts.admin-master')
@section('content')
    <div class="main-content">
        <div class="container" style="min-height: 500px;">
            <div class="row">
                @include('include.admin.report-sidebar')
                <div class="col-xs-10 s-pad">
                    <div class="admin-content bg-white">
                        <div class="head">
                            <div class="head oh border-bot mb-10">
                                <h4 class="pull-left c-bright-green normal">Tesda Report Portal </h4>
                                <input type="text" placeholder="Search" class="border-light pull-right">
                            </div>
                            <div>
                                <div class="tesda-report-h1 pull-left mr-7">
                                    <span class="c-white f-14 mr-10">Short Courses</span>
                                    <input type="text">
                                </div>
                                <div class="tesda-report-h2 pull-left">
                                    <input type="text" class="mr-5">
                                    <input type="text">
                                </div>
                            </div>
                        </div>
                        <div class="tesda-body">
                            <table class="table c-sdark">
                                <tbody>
                                <tr>
                                    <td>1yr Basic Course Interior Design</td>
                                    <td>Marta Lynch</td>
                                    <td>200540221</td>
                                    <td>(+63)9095856254</td>
                                    <td>(+63)9095856254</td>
                                </tr>
                                <tr>
                                    <td>1yr Advance Course Interior Design</td>
                                    <td>Marta Lynch</td>
                                    <td>200540221</td>
                                    <td>(+63)9095856254</td>
                                    <td>(+63)9095856254</td>
                                </tr>
                                <tr>
                                    <td>1yr Associate Degree in Animation</td>
                                    <td>Marta Lynch</td>
                                    <td>200540221</td>
                                    <td>(+63)9095856254</td>
                                    <td>(+63)9095856254</td>
                                </tr>
                                <tr>
                                    <td>100 Hours Caretaker Course</td>
                                    <td>Marta Lynch</td>
                                    <td>200540221</td>
                                    <td>(+63)9095856254</td>
                                    <td>(+63)9095856254</td>
                                </tr>
                                <tr>
                                    <td>60 Hours Nihonggo Language Course</td>
                                    <td>Marta Lynch</td>
                                    <td>200540221</td>
                                    <td>(+63)9095856254</td>
                                    <td>(+63)9095856254</td>
                                </tr>
                                <tr>
                                    <td>2 Days Gallery and Provision Management Course</td>
                                    <td>Marta Lynch</td>
                                    <td>200540221</td>
                                    <td>(+63)9095856254</td>
                                    <td>(+63)9095856254</td>
                                </tr>
                                <tr>
                                    <td>2 Year Dip Computer Based Accountancy</td>
                                    <td>Marta Lynch</td>
                                    <td>200540221</td>
                                    <td>(+63)9095856254</td>
                                    <td>(+63)9095856254</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection