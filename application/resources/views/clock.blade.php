@extends('layouts.clock')

    @section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="container-fluid">

        <div class="fixedcenter">
            <div class="clockwrapper">
                <div class="clockinout">
                    <button class="btnclock timein active" data-type="timein">@lang('pe_clock.intime')</button>
                    <button class="btnclock timeout" data-type="timeout">@lang('pe_clock.outtime')</button>
                </div>
            </div>

            <div class="clockwrapper">
                <div class="timeclock">
                    <span id="daytoday" class="clock-text"></span>
                    <span id="timetoday" class="clock-time"></span>
                    <span id="datetoday" class="clock-day"></span>
                </div>
            </div>
            
            <div class="clockwrapper">
                <div class="userinput">
                    <form action="" method="get" accept-charset="utf-8" class="ui form">
                        @isset($clock_comment)
                            @if($clock_comment == 1) 
                                <div class="inline field comment">
                                    <textarea name="comment" class="uppercase lightblue" rows="1" placeholder="Enter comment" value=""></textarea>
                                </div> 
                            @endif
                        @endisset
                        <!--add luser information-->
                        {{ csrf_field() }}
                            <div class="fields">
                                <div class="sixteen wide field {{ $errors->has('email') ? ' has-error' : '' }}">
                                    <input id="email" type="email" class="enter_idno uppercase" name="email" value="{{ old('email') }}" placeholder="{{trans('login.email')}}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="fields">
                                <div class="sixteen wide field {{ $errors->has('password') ? ' has-error' : '' }}">
                                    <input id="password" type="password" class="enter_idno uppercase" name="password" placeholder="{{trans('login.pass')}}" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="fields">
								<div class="sixteen wide field">
									<div class="ui checkbox" style="display:inline">
										<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
										<label class="" style="line-height:1; color:dodgerblue" >@lang('login.remember')</label>
									</div>
								</div>
							</div>
                        <!--end user information-->
                        <div class="inline field">
                            <input class="enter_idno uppercase" name="idno" value="" type="text" placeholder="{{trans('pe_clock.enter_your_id')}}" required="">
                            <button id="btnclockin" type="button" class="ui positive large icon button">@lang('pe_clock.confirm')</button>
                            <input type="hidden" id="_url" value="{{url('/')}}">
                        </div>
                    </form>

                </div>
            </div>

            <div class="message-after">
                <p> 
                    <span id="greetings">@lang('pe_clock.welcome')</span>
                    <span id="fullname"></span>
                </p>

                <p id="messagewrap">
                    <span id="type"></span>
                    <span id="message"></span> 
                    <span id="time"></span>
                </p>
            </div>
        </div>

    </div>

    @endsection

    @section('scripts')
    
    <script type="text/javascript">    
	$('.ui.checkbox').checkbox('uncheck', 'toggle');
	
    function date_time(timetoday) {
            date = new Date();
            h = date.getHours();
            hours = ((h + 11) % 12 + 1);
            var ampm = h >= 12 ? 'PM' : 'AM';
            if(hours<10) { hours = "0"+hours; }
            m = date.getMinutes();
            if(m<10) { m = "0"+m; }
            s = date.getSeconds();
            if(s<10) { s = "0"+s; }
            timecurrent = hours+':'+m+':'+s+' '+ampm;
            document.getElementById(timetoday).innerHTML = timecurrent;
            setTimeout('date_time("'+timetoday+'");','1000');
            return true;
    }

    function date_today(datetoday) {
            date = new Date;
            year = date.getFullYear();
            month = date.getMonth();
            months = new Array('{{trans("pe_clock.january")}}', '{{trans("pe_clock.february")}}', '{{trans("pe_clock.march")}}', '{{trans("pe_clock.april")}}', '{{trans("pe_clock.may")}}', '{{trans("pe_clock.june")}}', '{{trans("pe_clock.july")}}', '{{trans("pe_clock.agust")}}', '{{trans("pe_clock.september")}}', '{{trans("pe_clock.october")}}', '{{trans("pe_clock.november")}}', '{{trans("pe_clock.december")}}');
            d = date.getDate();
            day = date.getDay();
            days = new Array('{{trans("pe_clock.sunday")}}', '{{trans("pe_clock.monday")}}', '{{trans("pe_clock.tuesday")}}', '{{trans("pe_clock.wednesday")}}', '{{trans("pe_clock.wednesday")}}', '{{trans("pe_clock.friday")}}', '{{trans("pe_clock.saturday")}}');
            datecurrent = months[month]+' '+d+', '+year;
            document.getElementById(datetoday).innerHTML = datecurrent;
            return true;
    }

    function day_today(daytoday) {
            date = new Date;
            year = date.getFullYear();
            month = date.getMonth();
            months = new Array('{{trans("pe_clock.january")}}', '{{trans("pe_clock.february")}}', '{{trans("pe_clock.march")}}', '{{trans("pe_clock.april")}}', '{{trans("pe_clock.may")}}', '{{trans("pe_clock.june")}}', '{{trans("pe_clock.july")}}', '{{trans("pe_clock.agust")}}', '{{trans("pe_clock.september")}}', '{{trans("pe_clock.october")}}', '{{trans("pe_clock.november")}}', '{{trans("pe_clock.december")}}');
            d = date.getDate();
            day = date.getDay();
            days = new Array('{{trans("pe_clock.sunday")}}', '{{trans("pe_clock.monday")}}', '{{trans("pe_clock.tuesday")}}', '{{trans("pe_clock.wednesday")}}', '{{trans("pe_clock.wednesday")}}', '{{trans("pe_clock.friday")}}', '{{trans("pe_clock.saturday")}}');
            daycurrent = days[day];
            document.getElementById(daytoday).innerHTML = daycurrent;
            return true;
    }

    window.onload = day_today('daytoday');
    window.onload = date_time('timetoday');
    window.onload = date_today('datetoday');

    $('.btnclock').click(function(event) {
        var is_comment = $(this).text();
        if (is_comment == "{{trans('pe_clock.intime')}}") {
            $('.comment').slideDown('200').show();
        } else {
            $('.comment').slideUp('200');
        }
        $('.btnclock').removeClass('active animated fadeIn')
        $(this).toggleClass('active animated fadeIn');
    });

    $('#btnclockin').click(function(event) {
        
        var url, type, idno, comment, email, pass, time_error;
        url = $("#_url").val();
        type = $('.btnclock.active').text();
        idno = $('input[name="idno"]').val();        
        idno.toUpperCase();
        comment = $('textarea[name="comment"]').val();
        email = $('input[name="email"]').val();
        email.toLowerCase();
        pass   = $('input[name="password"]').val();
        pass.toLowerCase();
        time_error = '404';
        $.ajax({
            url: url + '/attendance/add',
            type: 'post',
            async : false,
            dataType: 'json',
            data: {idno: idno, type: type, clock_comment: comment,email: email, pass: pass},
            headers: { 'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content') },           
            error: function (jqXHR, textStatus, errorThrown) {
                    console.log(errorThrown);  
                },
            success: function(response) {
                if(response['error'] != null) {
                    function prefix() {
                        var gender = response['gender'];
                        var civilstatus = response['civilstatus'];
                        if (gender == "{{trans('pe_clock.male')}}") { if(civilstatus == "{{trans('pe_clock.single')}}") { return "{{trans('pe_clock.mr')}}";  } else if(civilstatus == "{{trans('pe_clock.marrid')}}") { return "{{trans('pe_clock.sir')}}"; } else if(civilstatus == "{{trans('pe_clock.annulled')}}") { return "{{trans('pe_clock.mr')}}"; } else if(civilstatus == "{{trans('pe_clock.regally')}}") { return "{{trans('pe_clock.mr')}}"; } else { return ''; } }
                        if (gender == "{{trans('pe_clock.female')}}") { if(civilstatus == "{{trans('pe_clock.single')}}") {return "{{trans('pe_clock.miss')}}"; } else if(civilstatus == "{{trans('pe_clock.marrid')}}") {return "{{trans('pe_clock.mrs')}}";} else if(civilstatus == "{{trans('pe_clock.annulled')}}") {return "{{trans('pe_clock.ms')}}";} else if(civilstatus == "{{trans('pe_clock.regally')}}") {return "{{trans('pe_clock.ms')}}";} else {return '';} }
                    }

                    $('.message-after').addClass('notok').hide()
                    $('#type, #fullname').text("").hide();
                    $('#time').html("").hide();
                    $('.message-after').removeClass("ok");
                    
                    $('#message').text(response['error']);
                    $('#fullname').text(prefix() + ' ' + response['employee']);
                    $('.message-after').slideToggle().slideDown('400');
                    if(response['employee'] != null) time_error = '200';
                } else {
                    $('.message-after').addClass('ok').hide();
                    $('.message-after').removeClass("notok");
                    $('#type, #fullname, #message').text("").show();
                    $('#time').html("").show();

                    $('#type').text(response['type']);
                    $('#fullname').text(response['firstname'] + ' ' + response['lastname']);
                    $('#time').html('at ' + '<span id=clocktime>' + response['time'] + '</span>' + '.' + '<span id=clockstatus> Success!</span>');
                    $('.message-after').slideToggle().slideDown('400');     
                    time_error = '200';               
                }                                              
            }
        });

        /*if(time_error == '200') {
            //ksk_code: login function
            var url, email, password, remember, _token;
            url = $("#_url").val();        
            email = $('input[name="email"]').val();
            email.toLowerCase();
            password   = $('input[name="password"]').val();
            password.toLowerCase();
            remember = $('input[name="remember"]').val();
            _token = $('input[name="_token"]').val();
            
            if(localStorage.getItem('login_code') != '200' ) {
                $.ajax({
                    url: url+'/login',
                    type: 'post',
                    dataType: 'json',
                    async : false,
                    data: {email: email, password: password, remember: remember, _token: _token,},            
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(errorThrown);  
                    },
                    success: function(response) {                                 
                        localStorage.setItem('login_code', response.code); 
                        localStorage.setItem('user_type', response.user_type);                          
                    }
                });
            }

            if (localStorage.getItem('user_type') == '1') {                                
                window.location= url + "/personal/dashboard";
            } 
            if(localStorage.getItem('user_type') == '2') {
                window.location= url + "/dashboard";
            } 
            if(localStorage.getItem('user_type') == null || localStorage.getItem('user_type') == 0) {
                window.location= url + "/logout";                                         
            }
            
            if(localStorage.getItem('login_code') != '200') {
                        $('.message-after').addClass('notok').hide()
                        $('#type, #fullname').text("").hide();
                        $('#time').html("").hide();
                        $('.message-after').removeClass("ok");
                        
                        $('#message').text("{{trans('auth.login_error')}}");                   
                        $('.message-after').slideToggle().slideDown('400');
                return;
            } 
        }*/

    });

    </script> 

    @endsection