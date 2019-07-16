@extends('layouts.default')
    @section('meta')
    <title>@lang('profile.title_update_account')</title>
    <meta name="description" content="smart Control Horario update your profile.">
    @endsection

    @section('content')
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2 class="page-title">@lang('profile.update_account')</h2>
            </div>    
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="box box-success">
                    <div class="box-content">
                       
                        <form action="{{ url('user/update-profile') }}" class="ui form" method="post" accept-charset="utf-8">
                        {{ csrf_field() }}

                        <div class="field">
                            <label>@lang('profile.name')</label>
                            <input type="text" name="name" value="@isset($myuser->name){{ $myuser->name }}@endisset" class="uppercase">
                        </div>

                        <div class="field">
                            <label for="">@lang('profile.email')</label>
                            <input type="email" name="email" value="@isset($myuser->email){{ $myuser->email }}@endisset" class="lowercase">
                        </div>

                        <div class="field">
                            <label for="">@lang('profile.role')</label>
                        <input type="text" class="readonly uppercase" value="@isset($myrole){{ $myrole }}@endisset" readonly="" />
                        </div>

                        <div class="field">
                            <label for="">@lang('profile.status')</label>
                            <input type="text" class="readonly uppercase" value="@isset($myuser->status)@if($myuser->status == 1)Enabled @else Disabled @endif @endisset" readonly="" />
                        </div>
                        
                    </div>
                    <div class="box-footer">
                            <button class="ui positive button" type="submit" name="submit"><i class="ui checkmark icon"></i> @lang('profile.update')</button>
                            <a class="ui grey button" href="{{ url('dashboard') }}"><i class="ui times icon"></i> @lang('profile.cancel')</a>
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