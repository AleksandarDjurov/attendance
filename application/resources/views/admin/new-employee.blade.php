@extends('layouts.default')
    @section('meta')
    <title>@lang('empl.title_new')</title>
    <meta name="description" content="smart Control Horario add new employee, delete employee, edit employee">
    @endsection

    @section('styles')
    <link href="{{ asset('/assets/vendor/air-datepicker/dist/css/datepicker.min.css') }}" rel="stylesheet">
    @endsection

    @section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2 class="page-title">@lang('empl.empl_profile')</h2>
            </div>    
        </div>

        <div class="row">
            <form id="add_employee_form" action="{{ url('employee/add') }}" class="ui form custom" method="post" accept-charset="utf-8" enctype="multipart/form-data">
            {{ csrf_field() }}

                <div class="col-md-6 float-left">
                    <div class="box box-success">
                        <div class="box-header with-border">@lang('empl.personal_inform')</div>
                        <div class="box-body">
                            <div class="two fields">
                                <div class="field">
                                    <label>@lang('empl.first_name')</label>
                                    <input type="text" class="uppercase" name="firstname" value="">
                                </div>
                                <div class="field">
                                    <label>@lang('empl.middle_name')</label>
                                    <input type="text" class="uppercase" name="mi" value="">
                                </div>
                            </div>
                            <div class="field">
                                <label>@lang('empl.last_name')</label>
                                <input type="text" class="uppercase" name="lastname" value="">
                            </div>
                            <div class="field">
                                <label>@lang('empl.gender')</label>
                                <select name="gender" class="ui dropdown uppercase">
                                    <option value="">@lang('empl.select_gender')</option>
                                    <option value="MALE">@lang('empl.male')</option>
                                    <option value="FEMALE">@lang('empl.female')</option>
                                </select>
                            </div>
                            <div class="field">
                                <label>@lang('empl.civil_status')</label>
                                <select name="civilstatus" class="ui dropdown uppercase">
                                    <option value="">@lang('empl.select_civil_status')</option>
                                    <option value="SINGLE">@lang('empl.single')</option>
                                    <option value="MARRIED">@lang('empl.married')</option>
                                    <option value="ANULLED">@lang('empl.annulled')</option>
                                    <option value="WIDOWED">@lang('empl.window')</option>
                                    <option value="LEGALLY SEPARATED">@lang('empl.separated')</option>
                                </select>
                            </div>

                            <div class="two fields">
                                <div class="field">
                                    <label>@lang('empl.height') <span class="help">(cm)</span></label>
                                    <input type="number" name="height" value="" placeholder="000">
                                </div>
                                <div class="field">
                                    <label>@lang('empl.weight') <span class="help">(pounds)</span></label>
                                    <input type="number" name="weight" value="" placeholder="000">
                                </div>
                            </div>
                            
                            <div class="two fields">
                            <div class="field">
                                <label>@lang('empl.email_address')</label>
                                <input type="email" name="emailaddress" value="" class="lowercase">
                            </div>
                            <div class="field">
                                <label>@lang('empl.mobile_number')</label>
                                <input type="text" class="" name="mobileno" value="">
                            </div>
                            </div>

                            <div class="two fields">
                                <div class="field">
                                    <label>@lang('empl.age')</label>
                                    <input type="number" name="age" value="" placeholder="00">
                                </div>
                                <div class="field">
                                    <label>@lang('empl.birth')</label>
                                    <input type="text" name="birthday" value="" class="airdatepicker" data-position="top right" placeholder="Date"> 
                                </div>
                            </div>
                            <div class="field">
                                <label>@lang('empl.national')</label>
                                <input type="text" class="uppercase" name="nationalid" value="" placeholder="">
                            </div>
                            <div class="field">
                                <label>@lang('empl.palce_birth')</label>
                                <input type="text" class="uppercase" name="birthplace" value="" placeholder="City, Province, Country">
                            </div>
                            <div class="field">
                                <label>@lang('empl.home_address')</label>
                                <input type="text" class="uppercase" name="homeaddress" value="" placeholder="House/Unit Number, Building, Street, City, Province, Country">
                            </div>
                            <div class="field">
                                <label>@lang('empl.upload_photo')</label>
                                <input class="ui file upload" value="" id="imagefile" name="image" type="file" accept="image/png, image/jpeg, image/jpg" onchange="validateFile()">
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 float-left">
                    <div class="box box-success">
                        <div class="box-header with-border">@lang('empl.empl_detail')</div>
                        <div class="box-body">
                            <h4 class="ui dividing header">@lang('empl.destination')</h4>
                            <div class="field">
                                <label>@lang('empl.company')</label>
                                <select name="company" class="ui search dropdown uppercase">
                                    <option value="">@lang('empl.select_company')</option>
                                    @isset($company)
                                    @foreach ($company as $data)
                                        <option value="{{ $data->company }}"> {{ $data->company }}</option>
                                    @endforeach
                                    @endisset
                                </select>
                            </div>
                            <div class="field">
                                <label>Department</label>
                                <select name="department" class="ui search dropdown uppercase department">
                                    <option value="">@lang('empl.select_deaprt')</option>
                                    @isset($department)
                                    @foreach ($department as $data)
                                        <option value="{{ $data->department }}"> {{ $data->department }}</option>
                                    @endforeach
                                    @endisset
                                </select>
                            </div>
                            <div class="field">
                                <label>@lang('empl.job_title')</label>
                                <div class="ui search dropdown selection uppercase jobposition">
                                    <input type="hidden" name="jobposition">
                                    <i class="dropdown icon" tabindex="1"></i>
                                    <div class="default text">@lang('empl.select_job_title')</div>
                                    <div class="menu">
                                    @isset($jobtitle)
                                    @isset($department)
                                        @foreach ($jobtitle as $data)
                                            @foreach ($department as $dept)
                                                @if($dept->id == $data->dept_code)
                                                    <div class="item" data-value="{{ $data->jobtitle }}" data-dept="{{ $dept->department }}">{{ $data->jobtitle }}</div>
                                                @endif
                                            @endforeach
                                        @endforeach
                                    @endisset
                                    @endisset
                                    </div>
                                </div>
                            </div>
                            <div class="field">
                                <label>@lang('empl.id_number')</label>
                                <input type="text" class="uppercase" name="idno" value="">
                            </div>
                            <div class="field">
                                <label>@lang('empl.email_address_company')</label>
                                <input type="email" name="companyemail" value="" class="lowercase">
                            </div>
                            <div class="field">
                                <label>Leave Group</label>
                                <select name="leaveprivilege" class="ui dropdown uppercase">
                                    <option value="">@lang('empl.select_leave_pri')</option>
                                    @isset($leavegroup) 
                                        @foreach($leavegroup as $lg)
                                            <option value="{{ $lg->id }}">{{ $lg->leavegroup }}</option>
                                        @endforeach
                                    @endisset
                                </select>
                            </div>

                            <h4 class="ui dividing header">@lang('empl.employy_inform')</h4>
                            <div class="field">
                                <label>@lang('empl.emp_type')</label>
                                <select name="employmenttype" class="ui dropdown uppercase">
                                    <option value="">@lang('empl.select_type')</option>
                                    <option value="Regular">@lang('empl.regular')</option>
                                    <option value="Trainee">@lang('empl.train')</option>
                                </select>
                            </div>
                            <div class="field">
                                <label>@lang('empl.emp_status')</label>
                                <select name="employmentstatus" class="ui dropdown uppercase">
                                    <option value="">@lang('empl.select_status')</option>
                                    <option value="Active">@lang('empl.active')</option>
                                    <option value="Archived">@lang('empl.archived')</option>
                                </select>
                            </div>
                            
                            <div class="field">
                                <label>@lang('empl.official_start')</label>
                                <input type="text" name="startdate" value="" class="airdatepicker uppercase" data-position="top right" placeholder="Date">
                            </div>
                            <div class="field">
                                <label>@lang('empl.date_reqular')</label>
                                <input type="text" name="dateregularized" value="" class="airdatepicker uppercase" data-position="top right" placeholder="Date">
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 float-left">
                    <div class="ui error message">
                        <i class="close icon"></i>
                        <div class="header"></div>
                        <ul class="list">
                            <li class=""></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-12 float-left">
                    <div class="action align-right">
                        <button type="submit" name="submit" class="ui green button small"><i class="ui checkmark icon"></i>@lang('empl.save')</button>
                        <a href="{{ url('employees') }}" class="ui grey button small"><i class="ui times icon"></i>@lang('empl.cancel')</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @endsection

    @section('scripts')
    <script src="{{ asset('/assets/vendor/air-datepicker/dist/js/datepicker.min.js') }}"></script>
    <script src="{{ asset('/assets/vendor/air-datepicker/dist/js/i18n/datepicker.en.js') }}"></script>
    <script type="text/javascript">
    $('.airdatepicker').datepicker({ language: 'en', dateFormat: 'yyyy-mm-dd', autoClose: true });
    
    $('.ui.dropdown.department').dropdown({ onChange: function(value, text, $selectedItem) {
        $('.jobposition .menu .item').addClass('hide disabled');
        $('.jobposition .text').text('');
        $('input[name="jobposition"]').val('');
        $('.jobposition .menu .item').each(function() {
            var dept = $(this).attr('data-dept');
            if(dept == value) {$(this).removeClass('hide disabled');};
        });
    }});

    function validateFile() {
        var f = document.getElementById("imagefile").value;
        var d = f.lastIndexOf(".") + 1;
        var ext = f.substr(d, f.length).toLowerCase();
        if (ext == "jpg" || ext == "jpeg" || ext == "png") { } else {
            document.getElementById("imagefile").value="";
            $.notify({
            icon: 'ui icon times',
            message: "Please upload only jpg/jpeg and png image formats."},
            {type: 'danger',timer: 400});
        }
    }
    </script>
    @endsection