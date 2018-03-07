<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', '') }}</title>

    <!-- Styles -->
    <link href="{{ asset('public/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/fontawesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/fontawesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/fontawesome/css/custom.css') }}" rel="stylesheet">

    <link href="{{ asset('public/css/applications.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/help.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/inbox.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/jobs.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/profile.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/tor.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/visit.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/custom.css') }}" rel="stylesheet">

    <link href="{{ asset('public/plugins/owl_carousel/dist/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/plugins/owl_carousel/dist/assets/owl.theme.default.css') }}" rel="stylesheet">

    @yield('links')

    <style>
        .pad-bot-5 {
            padding-bottom: 5px;
        }
        .pad-bot-10 {
            padding-bottom: 10px;
        }
        .pad-top-5 {
            padding-top: 5px;
        }
        .pad-top-10 {
            padding-top: 10px;
        }
        .box-shadow:hover {
            box-shadow: 0px 0px 1px 1px #ccc;
        }
    </style>

</head>
<body>
    
    @if(Request::segment(1) == '' )
        
        @yield('content')

    @else

        @include('layouts/alumnus/header')
        @include('layouts/alumnus/nav')
        <!-- @include('layouts/alumnus/sidebar') -->
        @yield('content')
    
    @endif
            

       <!--  <div class="main-content">
            <div class="container">
                <div class="row">
                    
                    <div class="col-xs-3 s-pad bg-white no-padding">
                        <div class="profile-area">
                            <div class="profile-head">
                                <img src="{{url('public/images/don.jpg')}}">
                                <h5>Don J. Del Rosario</h5>
                                <h6>Bachelor of Science in Computer Science</h6>
                            </div>
                        </div>
                        <div class="profile-nav">
                            <ul>
                                <li>
                                    <i class="fa fa-fw fa-user f-20 c-lighter pull-left"></i>
                                    <a href="profile.html">Profile</a>
                                </li>
                                <li>
                                    <i class="fa fa-fw fa-briefcase f-20 c-lighter pull-left"></i>
                                    <a href="jobs.html">Jobs</a>
                                </li>
                                <li>
                                    <i class="fa fa-fw fa-envelope f-20 c-lighter pull-left"></i>
                                    <a href="inbox.html">Inbox</a>
                                </li>
                                <li>
                                    <i class="fa fa-fw fa-space-shuttle f-20 c-lighter pull-left"></i>
                                    <a href="application.html">Applications</a>
                                </li>
                                <li>
                                    <i class="fa fa-fw fa-lock f-20 c-lighter pull-left"></i>
                                    <a href="myaccount.html">Accounts</a>
                                </li>
                                <li>
                                    <i class="fa fa-fw fa-pencil-square f-20 c-lighter pull-left"></i>
                                    <a href="#">Post</a>
                                </li>
                                <li>
                                    <i class="fa fa-fw fa-mortar-board f-20 c-lighter pull-left"></i>
                                    <a href="batch.html">Batch</a>
                                </li>
                                <li>
                                    <i class="fa fa-fw fa-file-text f-20 c-lighter pull-left"></i>
                                    <a href="tor.html">TOR</a>
                                </li>
                                <li>
                                    <i class="fa fa-fw fa-group f-20 c-lighter pull-left"></i>
                                    <a href="about.html">About Us</a>
                                </li>
                                <li>
                                    <i class="fa fa-fw fa-question-circle f-20 c-lighter pull-left"></i>
                                    <a href="help.html">Help</a>
                                </li>
                            </ul>
                            <div class="profile-social">
                                <img src="images/facebook-ico.png">
                                <img src="images/twitter-ico.png">
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6 s-pad">

                    </div>

                </div>
            </div>
        </div> -->


    <footer>
        <div class="container">
            <div class="row">
                <div class="col-xs-3 s-pad">
                    <a href="#"><span class="c-green">Virtual Information Tracer for Alumnus</span> <span class="c-dark">VITA&trade;</span></a>
                    <p class="f-10 c-light" style="margin-top:2px;">Developed and Manufactured by Engtech Global Solutions Inc.</p>
                </div>
                <div class="col-xs-9 s-pad">
                    <ul class="pull-left">
                        <li><a href="#">User Agreement</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Copyright Policy</a></li>
                        <li><a href="#">Feedback</a></li>
                        <li><a href="#">Account</a></li>
                    </ul>
                    <div class="f-socials pull-right">
                        <a href="#"><i class="fa fa-facebook-square"></i></a>
                        <a href="#"><i class="fa fa-twitter-square"></i></a>
                    </div>
                    <br><p class="all-rights">All rights reserve 2017</p>
                </div>
            </div>
        </div>
    </footer>
    
        
<script src="{{ asset('public/js/jquery.min.js') }}"></script>
<script src="{{ asset('public/js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('public/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('public/js/moment.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('public/plugins/owl_carousel/dist/owl.carousel.min.js') }}"></script>
@yield('script')

<script>
    
    function log(a){
        console.log(a)
    }

    $(document).ready(function(){

        $.get('<?php echo route("get_image") ?>', function(data) {

            var file_name = data.image_name + "." + data.type;

            $('.auth_image').attr('src', "{{url('public/storage/alumnus_images')}}/"+file_name);

        });

    });

</script>

<!-- hiding/minimizing long contents/texts -->
<script>
    (function(){
        var measurer = $('<span>', {
                                    style: "display:inline-block;word-break:break-word;visibility:hidden;white-space:pre-wrap;"})
           .appendTo('body');
        function initMeasurerFor(textarea){
          if(!textarea[0].originalOverflowY){
            textarea[0].originalOverflowY = textarea.css("overflow-y");    
          }  
          var maxWidth = textarea.css("max-width");
          measurer.text(textarea.text())
              .css("max-width", maxWidth == "none" ? textarea.width() + "px" : maxWidth)
              .css('font',textarea.css('font'))
              .css('overflow-y', textarea.css('overflow-y'))
              .css("max-height", textarea.css("max-height"))
              .css("min-height", textarea.css("min-height"))
              .css("min-width", textarea.css("min-width"))
              .css("padding", textarea.css("padding"))
              .css("border", textarea.css("border"))
              .css("box-sizing", textarea.css("box-sizing"))
        }
        function updateTextAreaSize(textarea){
            textarea.height(measurer.height());
          var w = measurer.width();
          if(textarea[0].originalOverflowY == "auto"){
                var mw = textarea.css("max-width");
              if(mw != "none"){
                    if(w == parseInt(mw)){
                    textarea.css("overflow-y", "auto");
                    } else {
                    textarea.css("overflow-y", "hidden");
                    }
              }
           }
           textarea.width(w + 2);
        }
        $('textarea.autofit').on({
            input: function(){      
                var text = $(this).val();  
                if($(this).attr("preventEnter") == undefined){
                   text = text.replace(/[\n]/g, "<br>&#8203;");
                }
                measurer.html(text);                       
                updateTextAreaSize($(this));       
            },
            focus: function(){
             initMeasurerFor($(this));
            },
            keypress: function(e){
                if(e.which == 13 && $(this).attr("preventEnter") != undefined){
                e.preventDefault();
              }
            }
        });
    })();
</script>

<!-- carousel -->
<script>

    // CAROUSEL 
    $(document).ready(function(){
        $('.owl-carousel').owlCarousel({
            loop:true,
            margin:-40,
            // nav:true,  
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:5
                }
            }, 
        })
    });

    $(".cnav-next").click(function(){
        let nextbtn = document.getElementsByClassName('owl-next')[0];
        nextbtn.click();
    });

    $(".cnav-prev").click(function(){
        let prevbtn = document.getElementsByClassName('owl-prev')[0];
        prevbtn.click();
    });

    // HIDE LONG TEXTS

    jQuery(function(){

        var minimized_elements = $('p.minimize');
        
        minimized_elements.each(function(){    
            var t = $(this).text();        
            if(t.length < 300) return;
            
            $(this).html(
                t.slice(0,300)+'<span>... </span><a href="#" class="more c-green"><small>more</small></a>'+
                '<span style="display:none;">'+ t.slice(300,t.length)+' <a href="#" class="less c-green"><small>less</small></a></span>'
            );
            
        }); 
        
        $('a.more', minimized_elements).click(function(event){
            event.preventDefault();
            $(this).hide().prev().hide();
            $(this).next().show();        
        });
        
        $('a.less', minimized_elements).click(function(event){
            event.preventDefault();
            $(this).parent().hide().prev().show().prev().show();    
        });
    });
</script>


</body>
</html>