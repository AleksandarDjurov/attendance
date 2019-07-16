@extends('layouts.personal')
    @section('meta')
    <title>@lang('pe_profile_edit.title')</title>
    <meta name="description" content="smart Control Horario edit my information.">
    @endsection

    @section('styles')
    <link href="{{ asset('/assets/vendor/air-datepicker/dist/css/datepicker.min.css') }}" rel="stylesheet">
    @endsection

    @section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2 class="page-title">@lang('pe_profile_edit.page_title')
                    <a href="{{ url('personal/profile/view') }}" class="ui basic blue button mini offsettop5 float-right"><i class="ui icon chevron left"></i>@lang('pe_profile_edit.return')</a>
                </h2>
            </div>    
        </div>

        <div class="row">
            <form id="edit_personal_info_form" action="{{ url('personal/profile/update') }}" class="ui form custom" method="post" accept-charset="utf-8">
            {{ csrf_field() }}

                <div class="col-md-12 float-left">
                    <div class="box box-success">
                        <div class="box-header with-border">@lang('pe_profile_edit.personal_info')</div>
                        <div class="box-body">
                            <div class="two fields">
                                <div class="field">
                                    <label>@lang('pe_profile_edit.first_name')</label>
                                    <input type="text" class="uppercase" name="firstname" value="@isset($person_details->firstname){{ $person_details->firstname }}@endisset">
                                </div>
                                <div class="field">
                                    <label>@lang('pe_profile_edit.middle_name')</label>
                                    <input type="text" class="uppercase" name="mi" value="@isset($person_details->mi){{ $person_details->mi }}@endisset">
                                </div>
                            </div>
                            <div class="field">
                                <label>@lang('pe_profile_edit.last_name')</label>
                                <input type="text" class="uppercase" name="lastname" value="@isset($person_details->lastname){{ $person_details->lastname }}@endisset">
                            </div>
                            <div class="field">
                                <label>@lang('pe_profile_edit.gender')</label>
                                <select name="gender" class="ui dropdown uppercase">
                                    <option value="">@lang('pe_profile_edit.select_gender')</option>
                                    <option value="MALE" @isset($person_details->gender) @if($person_details->gender == 'MALE') selected @endif @endisset>@lang('pe_profile_edit.male')</option>
                                    <option value="FEMALE" @isset($person_details->gender) @if($person_details->gender == 'FEMALE') selected @endif @endisset>@lang('pe_profile_edit.female')</option>
                                </select>
                            </div>
                            <div class="field">
                                <label>@lang('pe_profile_edit.civil_status')</label>
                                <select name="civilstatus" class="ui dropdown uppercase">
                                    <option value="">@lang('pe_profile_edit.select_status')</option>
                                    <option value="SINGLE" @isset($person_details->civilstatus) @if($person_details->civilstatus == 'SINGLE') selected @endif @endisset>@lang('pe_profile_edit.single')</option>
                                    <option value="MARRIED" @isset($person_details->civilstatus) @if($person_details->civilstatus == 'MARRIED') selected @endif @endisset>@lang('pe_profile_edit.married')</option>
                                    <option value="ANULLED" @isset($person_details->civilstatus) @if($person_details->civilstatus == 'ANULLED') selected @endif @endisset>@lang('pe_profile_edit.anulled')</option>
                                    <option value="WIDOWED" @isset($person_details->civilstatus) @if($person_details->civilstatus == 'WIDOWED') selected @endif @endisset>@lang('pe_profile_edit.widowed')</option>
                                    <option value="LEGALLY SEPARATED" @isset($person_details->civilstatus) @if($person_details->civilstatus == 'LEGALLY SEPARATED') selected @endif @endisset>@lang('pe_profile_edit.seperated')</option>
                                </select>
                            </div>

                            <div class="two fields">
                                <div class="field">
                                    <label>@lang('pe_profile_edit.height') <span class="help">(cm)</span></label>
                                    <input type="text" name="height" value="@isset($person_details->height){{ $person_details->height }}@endisset" placeholder="000">
                                </div>
                                <div class="field">
                                    <label>@lang('pe_profile_edit.weight') <span class="help">(pounds)</span></label>
                                    <input type="text" name="weight" value="@isset($person_details->weight){{ $person_details->weight }}@endisset" placeholder="000">
                                </div>
                            </div>
                            
                            <div class="two fields">
                            <div class="field">
                                <label>@lang('pe_profile_edit.email')</label>
                                <input type="email" name="emailaddress" value="@isset($person_details->emailaddress){{ $person_details->emailaddress }}@endisset"  class="lowercase">
                            </div>
                            <div class="field">
                                <label>@lang('pe_profile_edit.mobile')</label>
                                <input type="text" class="uppercase" name="mobileno" value="@isset($person_details->mobileno){{ $person_details->mobileno }}@endisset">
                            </div>
                            </div>
                            <div class="two fields">
                            <div class="field">
                                <label>@lang('pe_profile_edit.age')</label>
                                <input type="text" name="age" value="@isset($person_details->age){{ $person_details->age }}@endisset" placeholder="00">
                            </div>
                            <div class="field">
                                <label>@lang('pe_profile_edit.dob')</label>
                                <input type="text" name="birthday" value="@isset($person_details->birthday){{ $person_details->birthday }}@endisset" class="airdatepicker" placeholder="Date">
                            </div>
                            </div>
                            <div class="field">
                                <label>@lang('pe_profile_edit.pob')</label>
                                <input type="text" class="uppercase" name="birthplace" value="@isset($person_details->birthplace){{ $person_details->birthplace }}@endisset" placeholder="City, Province, Country">
                            </div>
                            <div class="field">
                                <label>@lang('pe_profile_edit.address')</label>
                                <input type="text" class="uppercase" name="homeaddress" value="@isset($person_details->homeaddress){{ $person_details->homeaddress }}@endisset" placeholder="House/Unit Number, Building, Street, City, Province, Country">
                            </div>
                            <div class="field">
                                <div class="ui error message">
                                <i class="close icon"></i>
                                    <div class="header"></div>
                                    <ul class="list">
                                        <li class=""></li>
                                    </ul>
                                </div>
                            </div>
                            <br>
                            
                        </div>
                    </div>
                </div>
                
                <div class="col-md-12 float-left">
                    <div class="action align-right">
                        <button type="submit" name="submit" class="ui green button small"><i class="ui checkmark icon"></i> @lang('update')</button>
                        <a href="{{ url('personal/dashboard') }}" class="ui grey small button cancel"><i class="ui times icon"></i> @lang('cancel')</a>
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
    </script>
    @endsection