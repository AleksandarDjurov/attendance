@extends('layouts.personal')
    @section('meta')
    <title>@lang('pe_update_pwd.title')</title>
    <meta name="description" content="smart Control Horario update personal password.">
    @endsection

    @section('content')
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2 class="page-title">@lang('pe_update_pwd.page_title')</h2>
            </div>    
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="box box-success">
                    <div class="box-content">
                       
                        <form id="edit_personal_password_form" action="{{ url('personal/update/password') }}" class="ui form" method="post" accept-charset="utf-8">
                        {{ csrf_field() }}

                        <div class="field">
                            <label>@lang('pe_update_pwd.pwd')</label>
                            <input type="password" name="currentpassword" value="" placeholder="Enter Current Password">
                        </div>

                        <div class="field">
                            <label for="">@lang('pe_update_pwd.new_pwd1')</label>
                            <input type="password" name="newpassword" value="" placeholder="Enter Password">
                        </div>

                        <div class="field">
                            <label for="">@lang('pe_update_pwd.new_pwd2')</label>
                            <input type="password" name="confirmpassword" value="" placeholder="Enter Password Confirmation">
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
                        </form>
                    </div>
                    <div class="box-footer">
                        <button class="ui positive small button" type="submit" name="submit"><i class="ui checkmark icon"></i> @lang('pe_update_pwd.update')</button>
                        <a class="ui grey small button" href="{{ url('personal/dashboard') }}"><i class="ui times icon"></i> @lang('pe_update_pwd.cancel')Cancel</a>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @endsection
    
    @section('scripts')
    <script type="text/javascript">

    </script>
    @endsection 