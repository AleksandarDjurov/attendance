<!doctype html>
<!--
* Smart Control Horario: Time and Attendance Management System
* Email: official.smartControl Horario@gmail.com
* Version: 3.0
* Author: Brian Luna
* Copyright 2018 Brian Luna
* Website: https://github.com/brianluna/smartControl Horario
-->
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        
        @yield('meta')

        <link rel="stylesheet" type="text/css" href="{{ asset('/assets/vendor/bootstrap/css/bootstrap.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('/assets/vendor/semantic-ui/semantic.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('/assets/vendor/DataTables/datatables.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/style.css') }}">
        
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="{{ asset('/assets/js/html5shiv.js') }}></script>
            <script src="{{ asset('/assets/js/respond.min.js') }}"></script>
        <![endif]-->

        @yield('styles')
    </head>
    <body>

        <div class="wrapper">
        
        <nav id="sidebar" class="active">
            <div class="sidebar-header bg-lightblue">
                <div class="logo">
                <a href="/" class="simple-text">
                    <img src="{{ asset('/assets/images/img/logo-small.png') }}">
                </a>
                </div>
            </div>

            <ul class="list-unstyled components">
                <li class="">
                    <a href="{{ url('personal/dashboard') }}">
                        <i class="ui icon sliders horizontal"></i>
                        <p>@lang('personal.dashboard')</p>
                    </a>
                </li>
                <li class="">
                    <a href="{{ url('personal/attendance/view') }}">
                        <i class="ui icon clock outline"></i>
                        <p>@lang('personal.my_attendence')</p>
                    </a>
                </li>
                <li class="">
                    <a href="{{ url('personal/schedules/view') }}">
                        <i class="ui icon calendar alternate outline"></i>
                        <p>@lang('personal.my_schedule')</p>
                    </a>
                </li>
                <li class="">
                    <a href="{{ url('personal/leaves/view') }}">
                        <i class="ui icon calendar plus outline"></i>
                        <p>@lang('personal.my_leave')</p>
                    </a>
                </li>
                <li>
                    <a href="{{ url('personal/settings') }}">
                        <i class="ui icon cog"></i>
                        <p>@lang('personal.setting')</p>
                    </a>
                </li>
            </ul>
        </nav>

        <div id="body" class="active">
            <nav class="navbar navbar-expand-lg navbar-light bg-lightblue">
                <div class="container-fluid">

                    <button type="button" id="slidesidebar" class="ui icon button btn-light-outline">
                        <i class="ui icon bars"></i> @lang('personal.menu')
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto navmenu">
                            <li class="nav-item">
                                <div class="ui pointing link dropdown item" tabindex="0">
                                    <i class="ui icon th"></i> <span class="navmenutext">@lang('default.lang')</span>
                                    <i class="dropdown icon"></i>
                                    <div class="menu" tabindex="-1">
                                        <a href="{{ url('lang/en') }}" class="item"> @lang('default.en')</a>
                                        <a href="{{ url('lang/es') }}" class="item"> @lang('default.es')</a>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item">
                                <div class="ui pointing link dropdown item" tabindex="0">
                                    <i class="ui icon th"></i> <span class="navmenutext">@lang('personal.quick_access')</span>
                                    <i class="dropdown icon"></i>
                                    <div class="menu" tabindex="-1">
                                      <a href="{{ url('clock') }}" target="_blank" class="item"><i class="ui icon clock outline"></i> @lang('personal.clock_in_out')</a>
                                      <div class="divider"></div>
                                      <a href="{{ url('personal/profile/view') }}" target="_blank" class="item"><i class="ui icon user outline"></i> @lang('personal.my_profile')</a>
                                    </div>
                              </div>
                            </li>
                            <li class="nav-item">
                               <div class="ui pointing link dropdown item" tabindex="0">
                                    <i class="ui icon user outline"></i><span class="navmenutext">@isset(Auth::user()->name) {{ Auth::user()->name }} @endisset</span>
                                    <i class="dropdown icon"></i>
                                    <div class="menu" tabindex="-1">
                                      <a href="{{ url('personal/update-user') }}" class="item"><i class="ui icon user"></i> @lang('personal.update_user')</a>
                                      <a href="{{ url('personal/update-password') }}" class="item"><i class="ui icon lock"></i>  @lang('personal.change_password')</a>
                                      <div class="divider"></div>
                                      <a href="{{ url('logout') }}" class="item"><i class="ui icon power"></i> @lang('personal.logout')</a>
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>
            </nav>

            <div class="content">
                @yield('content')
            </div>

            <input type="hidden" id="_url" value="{{url('/')}}">
            <!--
            <script>
                var rv = '@isset($var){{$var}}@endisset';
                var dc = {"mh":"Activation required!","mt":"You need to activate this app otherwise you can't use some features.","mm":"You only have 30 days trial to use this app."}
            </script>
            -->
        </div>
    </div>

    <script src="{{ asset('/assets/vendor/jquery/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('/assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/assets/vendor/semantic-ui/semantic.min.js') }}"></script>
    <script src="{{ asset('/assets/js/bootstrap-notify.js') }}"></script>
    <script src="{{ asset('/assets/vendor/DataTables/datatables.min.js') }}"></script>
    <script src="{{ asset('/assets/js/script.js') }}"></script>
    @if ($success = Session::get('success'))
    <!--
    <script>
        $(document).ready(function() {
            $.notify({icon: 'ti-check',message: "{{ $success }}"},{type: 'success',timer: 600});
        });
    </script>
    -->
    @endif

    @if ($error = Session::get('error'))
    <script>
        $(document).ready(function() {
            $.notify({icon: 'ti-close',message: "{{ $error }}"},{type: 'danger',timer: 600});
        });
    </script>
    @endif

    @yield('scripts')

    </body>
</html>