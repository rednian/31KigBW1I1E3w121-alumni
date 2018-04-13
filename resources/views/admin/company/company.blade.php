@extends('layouts.admin-master')
@section('content')
    <div class="main-content">
        <div class="container" style="min-height: 500px;">
            <div class="row">
                @include('include.admin.company-sidebar')
                <div class="col-xs-10 s-pad">
                    <div class="admin-content bg-white">
                        <div class="head oh border-bot mb-10">
                            <h4 class="pull-left c-bright-green normal">Company</h4>
                        </div>
                        <div class="row">
                            <div class="col-xs-3 s-pad" style="padding-left:15px!important;">
                                <div class="bg-white company-left-inner-pane">
                                    <ul class="f-12">
                                        <li class="active"><a href="company_company.html" class="c-bright-green"><i class="fa fa-bank fa-fw mr-5"></i> Business Overview</a></li>
                                        <li><a href="company_address.html" class="c-bright-green"><i class="fa fa-map-marker fa-fw mr-5 f-14"></i> Address</a></li>
                                        <li><a href="company_mission.html" class="c-bright-green"><i class="fa fa-cubes fa-fw mr-5"></i> Mission, Vision, Goals</a></li>
                                        <li><a href="company_jobpost.html" class="c-bright-green"><i class="fa fa-briefcase fa-fw mr-5"></i> Job Posts</a></li>
                                        <li><a href="company_applicant.html" class="c-bright-green"><i class="fa fa-group fa-fw mr-5"></i> Applicants/Invites</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xs-9 s-pad">
                                <div class="company-main">
                                    <div class="head border-bot oh mb-15">
                                        <img src="../images/azurelogo.png" alt="" class="pull-left mr-10 mb-15">
                                        <h4 class="mt-0">AZURE Mindstream Company Incorporated</h4>
                                        <h6 class="mt-3 mb-5">Los Angeles California, USA</h6>
                                        <label for="" class="mb-0 c-bright-green">Contact Information</label>
                                        <ul class="contact-info pl-10 oh c-sdark">
                                            <li>Tel#: 342-4542</li>
                                            <li>Mobile#: (+63)9278565254</li>
                                            <li>Email: dondondon@gmail.com</li>
                                        </ul>
                                    </div>
                                    <div class="body c-sdark f-14" style="padding-right:15px;">
                                        <p class="lh-17">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem nostrum sapiente perspiciatis ea unde architecto. Tempora accusantium quis atque error autem repudiandae, illum, ipsam laudantium eaque sit possimus. Saepe, eligendi. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque modi voluptatibus officia ipsam quos laboriosam vitae assumenda fugiat quo voluptatum, in sunt, voluptas quaerat illo laborum! Similique, rem veritatis rerum. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero veritatis, quis nostrum. Magnam animi corrupti voluptates, asperiores commodi id explicabo! Ad quisquam molestiae doloribus nihil repellendus deleniti aliquid consequatur earum!</p><br>

                                        <p class="lh-17">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem nostrum sapiente perspiciatis ea unde architecto. Tempora accusantium quis atque error autem repudiandae, illum, ipsam laudantium eaque sit possimus. Saepe, eligendi. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque modi voluptatibus officia ipsam quos laboriosam vitae assumenda fugiat quo voluptatum, in sunt, voluptas quaerat illo laborum! Similique, rem veritatis rerum. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero veritatis, quis nostrum. Magnam animi corrupti voluptates, asperiores commodi id explicabo! Ad quisquam molestiae doloribus nihil repellendus deleniti aliquid consequatur earum!</p><br>

                                        <p class="lh-17">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem nostrum sapiente perspiciatis ea unde architecto. Tempora accusantium quis atque error autem repudiandae, illum, ipsam laudantium eaque sit possimus. Saepe, eligendi. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque modi voluptatibus officia ipsam quos laboriosam vitae assumenda fugiat quo voluptatum, in sunt, voluptas quaerat illo laborum! Similique, rem veritatis rerum. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero veritatis, quis nostrum. Magnam animi corrupti voluptates, asperiores commodi id explicabo! Ad quisquam molestiae doloribus nihil repellendus deleniti aliquid consequatur earum!</p><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection