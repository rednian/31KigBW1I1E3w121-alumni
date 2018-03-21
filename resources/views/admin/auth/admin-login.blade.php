<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>VITA | Administrator Login</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('public/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <style>

        @-ms-viewport {
            width: device-width;
        }

        @-o-viewport {
            width: device-width;
        }

        @viewport {
            width: device-width
        ;
        }

        body {
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #eee;
        }

        .form-signin {
            max-width: 330px;
            padding: 15px;
            margin: 0 auto;
        }

        .form-signin .form-signin-heading,
        .form-signin .checkbox {
            margin-bottom: 10px;
        }

        .form-signin .checkbox {
            font-weight: normal;
        }

        .form-signin .form-control {
            position: relative;
            height: auto;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            padding: 10px;
            font-size: 16px;
        }

        .form-signin .form-control:focus {
            z-index: 2;
        }

        .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }

    </style>
    <script>
        (function () {
            'use strict';

            function emulatedIEMajorVersion() {
                var groups = /MSIE ([0-9.]+)/.exec(window.navigator.userAgent)
                if (groups === null) {
                    return null
                }
                var ieVersionNum = parseInt(groups[1], 10)
                var ieMajorVersion = Math.floor(ieVersionNum)
                return ieMajorVersion
            }

            function actualNonEmulatedIEMajorVersion() {
                // Detects the actual version of IE in use, even if it's in an older-IE emulation mode.
                // IE JavaScript conditional compilation docs: https://msdn.microsoft.com/library/121hztk3%28v=vs.94%29.aspx
                // @cc_on docs: https://msdn.microsoft.com/library/8ka90k2e%28v=vs.94%29.aspx
                var jscriptVersion = new Function('/*@cc_on return @_jscript_version; @*/')() // jshint ignore:line
                if (jscriptVersion === undefined) {
                    return 11 // IE11+ not in emulation mode
                }
                if (jscriptVersion < 9) {
                    return 8 // IE8 (or lower; haven't tested on IE<8)
                }
                return jscriptVersion // IE9 or IE10 in any mode, or IE11 in non-IE11 mode
            }

            var ua = window.navigator.userAgent
            if (ua.indexOf('Opera') > -1 || ua.indexOf('Presto') > -1) {
                return // Opera, which might pretend to be IE
            }
            var emulated = emulatedIEMajorVersion()
            if (emulated === null) {
                return // Not IE
            }
            var nonEmulated = actualNonEmulatedIEMajorVersion()

            if (emulated !== nonEmulated) {
                window.alert('WARNING: You appear to be using IE' + nonEmulated + ' in IE' + emulated + ' emulation mode.\nIE emulation modes can behave significantly differently from ACTUAL older versions of IE.\nPLEASE DON\'T FILE BOOTSTRAP BUGS based on testing in IE emulation modes!')
            }
        })();
    </script>

</head>

<body>

<div class="container">
    <section class="row">
        <div class="col-md-4 col-md-offset-4">
            <section class="panel panel-default">
                <div class="panel-heading">
                    <h3>Please sign in</h3>
                </div>
                <div class="panel-body">
                    <form class="form" method="post" action="{{route('admin.login.submit')}}">
                        <div class="form-group {{ $errors->has('username') ? ' has-error' : '' }}">
                            {{csrf_field()}}
                            <label for="inputEmail" class="sr-only">Username</label>
                            <input value="{{old('username')}}" type="text" name="username" id="inputEmail" autocomplete="off" class="form-control" placeholder="Username" autofocus>
                            @if ($errors->has('username'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="inputPassword" class="sr-only">Password</label>
                            <input type="password" value="{{old('password')}}" name="password" id="inputPassword" class="form-control" placeholder="Password">
                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" value="remember-me"> Remember me
                            </label>
                        </div>
                        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                    </form>
                </div>
            </section>

        </div>
    </section>


</div>


</body>
</html>
