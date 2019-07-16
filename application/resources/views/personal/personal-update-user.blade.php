@extends('layouts.personal')
    @section('meta')
    <title>@lang('pe_update_user.title')</title>
    <meta name="description" content="smart Control Horario update personal account.">
    @endsection

    @section('content')
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2 class="page-title">@lang('pe_update_user.page_title')</h2>
            </div>    
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="box box-success">
                    <div class="box-content">
                       
                        <form id="edit_personal_user_form" action="{{ url('personal/update/user') }}" class="ui form" method="post" accept-charset="utf-8">
                        {{ csrf_field() }}

                        <div class="field">
                            <label>@lang('pe_update_user.name')</label>
                            <input type="text" name="name" value="@isset($myuser->name){{ $myuser->name }}@endisset" class="uppercase">
                        </div>

                        <div class="field">
                            <label for="">@lang('pe_update_user.email')</label>
                            <input type="email" name="email" value="@isset($myuser->email){{ $myuser->email }}@endisset" class="lowercase">
                        </div>

                        <div class="field">
                            <label for="">@lang('pe_update_user.role')</label>
                            <input type="text" class="readonly uppercase" value="@isset($myrole){{ $myrole }}@endisset" readonly=""/>
                        </div>

                        <div class="field">
                            <label for="">@lang('pe_update_user.status')</label>
                            <input type="text" class="readonly uppercase" value="@isset($myuser->status)@if($myuser->status == 1)Enabled @else Disabled @endif @endisset" readonly="" />
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
                    <div class="box-footer">
                        <button class="ui positive small button" type="submit" name="submit"><i class="ui checkmark icon"></i> @lang('pe_update_user.update')</button>
                        <a class="ui grey small button" href="{{ url('personal/dashboard') }}"><i class="ui times icon"></i> @lang('pe_update_user.cancel')</a>
                    </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>

    @endsection
    
    @section('scripts')
    <script type="text/javascript">

    </script>
    @endsection 