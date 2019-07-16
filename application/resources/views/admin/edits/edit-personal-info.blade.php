@extends('layouts.default')
    @section('meta')
    <title>@lang('personal.title_edit')</title>
    <meta name="description" content="smart Control Horario edit employee profile.">
    @endsection 

    @section('styles')
    <link href="{{ asset('/assets/vendor/air-datepicker/dist/css/datepicker.min.css') }}" rel="stylesheet">
    @endsection

    @section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2 class="page-title">@lang('personal.edit_profile')
                    <a href="{{ url('employees') }}" class="ui basic blue button mini offsettop5 float-right"><i class="ui icon chevron left"></i>Return</a>
                </h2>
            </div>    
        </div>

        <div class="row">
                <form id="edit_employee_form" action="{{ url('profile/update') }}" class="ui form custom" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                {{ csrf_field() }}

                    <div class="col-md-6 float-left">
                        <div class="box box-success">
                            <div class="box-header with-border">@lang('personal.personal_inform')</div>
                            <div class="box-body">
                                <div class="two fields">
                                    <div class="field">
                                        <label>@lang('personal.first_name')</label>
                                        <input type="text" class="uppercase" name="firstname" value="@isset($person_details->firstname){{ $person_details->firstname }}@endisset">
                                    </div>
                                    <div class="field">
                                        <label>@lang('personal.middle_name')</label>
                                        <input type="text" class="uppercase" name="mi" value="@isset($person_details->mi){{ $person_details->mi }}@endisset">
                                    </div>
                                </div>
                                <div class="field">
                                    <label>@lang('personal.last_name')</label>
                                    <input type="text" class="uppercase" name="lastname" value="@isset($person_details->lastname){{ $person_details->lastname }}@endisset">
                                </div>
                                <div class="field">
                                    <label>@lang('personal.gender')</label>
                                    <select name="gender" class="ui dropdown uppercase">
                                        <option value="">Select Gender</option>
                                        <option value="MALE" @isset($person_details->gender) @if($person_details->gender == 'MALE') selected @endif @endisset>MALE</option>
                                        <option value="FEMALE" @isset($person_details->gender) @if($person_details->gender == 'FEMALE') selected @endif @endisset>FEMALE</option>
                                    </select>
                                </div>
                                <div class="field">
                                    <label>@lang('personal.civil_status')</label>
                                    <select name="civilstatus" class="ui dropdown uppercase">
                                        <option value="">Select Civil Status</option>
                                        <option value="SINGLE" @isset($person_details->civilstatus) @if($person_details->civilstatus == 'SINGLE') selected @endif @endisset>SINGLE</option>
                                        <option value="MARRIED" @isset($person_details->civilstatus) @if($person_details->civilstatus == 'MARRIED') selected @endif @endisset>MARRIED</option>
                                        <option value="ANULLED" @isset($person_details->civilstatus) @if($person_details->civilstatus == 'ANULLED') selected @endif @endisset>ANULLED</option>
                                        <option value="WIDOWED" @isset($person_details->civilstatus) @if($person_details->civilstatus == 'WIDOWED') selected @endif @endisset>WIDOWED</option>
                                        <option value="LEGALLY SEPARATED" @isset($person_details->civilstatus) @if($person_details->civilstatus == 'LEGALLY SEPARATED') selected @endif @endisset>LEGALLY SEPARATED</option>
                                    </select>
                                </div>

                                <div class="two fields">
                                    <div class="field">
                                        <label>@lang('personal.height') <span class="help">(cm)</span></label>
                                        <input type="text" name="height" value="@isset($person_details->height){{ $person_details->height }}@endisset" placeholder="000">
                                    </div>
                                    <div class="field">
                                        <label>@lang('personal.weight') <span class="help">(pounds)</span></label>
                                        <input type="text" name="weight" value="@isset($person_details->weight){{ $person_details->weight }}@endisset" placeholder="000">
                                    </div>
                                </div>
                                
                                <div class="two fields">
                                <div class="field">
                                    <label>@lang('personal.email_address')</label>
                                    <input type="email" name="emailaddress" value="@isset($person_details->emailaddress){{ $person_details->emailaddress }}@endisset" class="lowercase">
                                </div>
                                <div class="field">
                                    <label>@lang('personal.mobile_number')</label>
                                    <input type="text" class="uppercase" name="mobileno" value="@isset($person_details->mobileno){{ $person_details->mobileno }}@endisset">
                                </div>
                                </div>
                                <div class="two fields">
                                    <div class="field">
                                        <label>@lang('personal.age')</label>
                                        <input type="text" name="age" value="@isset($person_details->age){{ $person_details->age }}@endisset" placeholder="00">
                                    </div>
                                    <div class="field">
                                        <label>@lang('personal.date_birth')</label>
                                        <input type="text" name="birthday" value="@isset($person_details->birthday){{ $person_details->birthday }}@endisset" class="airdatepicker" placeholder="Date">
                                    </div>
                                </div>
                                <div class="field">
                                    <label>@lang('personal.national_id')</label>
                                    <input type="text" class="uppercase" name="nationalid" value="@isset($person_details->nationalid){{ $person_details->nationalid }}@endisset" placeholder="">
                                </div>
                                <div class="field">
                                    <label>@lang('personal.place_of_birth')</label>
                                    <input type="text" class="uppercase" name="birthplace" value="@isset($person_details->birthplace){{ $person_details->birthplace }}@endisset" placeholder="City, Province, Country">
                                </div>
                                <div class="field">
                                    <label>@lang('personal.home_address')</label>
                                    <input type="text" class="uppercase" name="homeaddress" value="@isset($person_details->homeaddress){{ $person_details->homeaddress }}@endisset" placeholder="House/Unit Number, Building, Street, City, Province, Country">
                                </div>
                                <div class="field">
                                    <label>@lang('personal.profile_photo')</label>
                                    <input class="ui file upload" value="" id="imagefile" name="image" type="file" accept="image/png, image/jpeg, image/jpg" onchange="validateFile()">
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="box box-success">
                            <div class="box-header with-border">@lang('personal.employee_detail')</div>
                            <div class="box-body">
                                <h4 class="ui dividing header">@lang('personal.destination')</h4>
                                <div class="field">
                                    <label>@lang('paesonal.company')</label>
                                    <select name="company" class="ui search dropdown uppercase">
                                        <option value="">@lang('personal.select_company')</option>
                                        @isset($company)
                                        @foreach ($company as $data)
                                            <option value="{{ $data->company }}" @if($data->company == $company_details->company) selected @endif> {{ $data->company }}</option>
                                        @endforeach
                                        @endisset
                                    </select>
                                </div>
                                <div class="field">
                                    <label>@lang('personal.department')</label>
                                    <select name="department" class="ui search dropdown uppercase department">
                                        <option value="">@lang('personal.select_department')</option>
                                        @isset($department)
                                        @foreach ($department as $data)
                                            <option value="{{ $data->department }}" @if($data->department == $company_details->department) selected @endif> {{ $data->department }}</option>
                                        @endforeach
                                        @endisset
                                    </select>
                                </div>
                                <div class="field">
                                    <label>@lang('personal.job_title')</label>
                                    <div class="ui search dropdown selection uppercase jobposition">
                                        <input type="hidden" name="jobposition" value="{{$company_details->jobposition}}">
                                        <i class="dropdown icon"></i>
                                        <div class="text">{{$company_details->jobposition}}</div>
                                        <div class="menu">
                                        @isset($jobtitle)
                                        @isset($department)
                                            @foreach ($jobtitle as $data)
                                                @foreach ($department as $dept)
                                                    @if($dept->id == $data->dept_code)
                                                        <div class="item" data-value="{{ $data->jobtitle }}" data-dept="{{ $dept->department }}" @if($data->jobtitle == $company_details->jobposition) selected @endif>{{ $data->jobtitle }}</div>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        @endisset
                                        @endisset
                                        </div>
                                    </div>
                                </div>
                                <div class="field">
                                    <label>@lang('personal.id_number')</label>
                                    <input type="text" class="uppercase" name="idno" value="@isset($company_details->idno){{ $company_details->idno }}@endisset">
                                </div>
                                <div class="field">
                                    <label>@lang('personal.email_address_company')</label>
                                    <input type="email" name="companyemail" value="@isset($company_details->companyemail){{ $company_details->companyemail }}@endisset" class="lowercase">
                                </div>
                                <div class="field">
                                    <label>@lang('personal.leave_pri')</label>
                                    <select name="leaveprivilege" class="ui dropdown uppercase">
                                        <option value="">@lang('personal.select_leave')</option>
                                        @isset($leavegroup) 
                                            @foreach($leavegroup as $lg)
                                                <option value="{{ $lg->id }}" @isset($company_details->leaveprivilege) @if($lg->id == $company_details->leaveprivilege) selected @endif @endisset>{{ $lg->leavegroup }}</option>
                                            @endforeach
                                        @endisset
                                    </select>
                                </div>
                                <h4 class="ui dividing header">@lang('personal.employ_inform')</h4>
                                <div class="field">
                                    <label>@lang('personal.employ_type')</label>
                                    <select name="employmenttype" class="ui dropdown uppercase">
                                        <option value="">@lang('personal.select_type')</option>
                                        <option value="Regular" @isset($person_details->employmenttype) @if($person_details->employmenttype == 'Regular') selected @endif @endisset>Regular</option>
                                        <option value="Trainee" @isset($person_details->employmenttype) @if($person_details->employmenttype == 'Trainee') selected @endif @endisset>Trainee</option>
                                    </select>
                                </div>
                                <div class="field">
                                    <label>@lang('personal.employ_status')</label>
                                    <select name="employmentstatus" class="ui dropdown uppercase">
                                        <option value="">Select Status</option>
                                        <option value="Active" @isset($person_details->employmentstatus) @if($person_details->employmentstatus == 'Active') selected @endif @endisset>Active</option>
                                        <option value="Archived" @isset($person_details->employmentstatus) @if($person_details->employmentstatus == 'Archived') selected @endif @endisset>Archived</option>
                                    </select>
                                </div>
                                <div class="field">
                                    <label>@lang('personal.officeial_start')</label>
                                    <input type="text" name="startdate" value="@isset($company_details->startdate){{ $company_details->startdate }}@endisset" class="airdatepicker" placeholder="Date">
                                </div>
                                <div class="field">
                                    <label>@lang('personal.date_regular')</label>
                                    <input type="text" name="dateregularized" value="@isset($company_details->dateregularized){{ $company_details->dateregularized }}@endisset" class="airdatepicker" placeholder="Date">
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
                            <input type="hidden" name="id" value="@isset($person_details->id){{ $person_details->id }}@endisset">
                            <button type="submit" name="submit" class="ui green button small"><i class="ui checkmark icon"></i> @lang('personal.update')</button>
                            <a href="{{ url('employees') }}" class="ui grey button small"><i class="ui times icon"></i> @lang('personal.cancel')</a>
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
        $('.airdatepicker').datepicker({ language: 'en', dateFormat: 'yyyy-mm-dd' });
        $('.ui.dropdown.department').dropdown({ onChange: function(value, text, $selectedItem) {
            $('.jobposition .menu .item').addClass('hide');
            $('.jobposition .text').text('');
            $('input[name="jobposition"]').val('');
            $('.jobposition .menu .item').each(function() {
                var dept = $(this).attr('data-dept');
                if(dept == value) {$(this).removeClass('hide');};
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

        var selected = "@isset($company_details->leaveprivilege){{ $company_details->leaveprivilege }}@endisset";
        var items = selected.split(',');
        $('.ui.dropdown.multiple.leaves').dropdown('set selected', items);
    </script>
    @endsection