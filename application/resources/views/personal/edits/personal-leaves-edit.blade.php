@extends('layouts.personal')
    @section('meta')
    <title>@lang('pe_leave_edit.title')</title>
    <meta name="description" content="smart Control Horario edit pending leave of absence.">
    @endsection

    @section('styles')
    <link href="{{ asset('/assets/vendor/air-datepicker/dist/css/datepicker.min.css') }}" rel="stylesheet">
    @endsection

    @section('content')

    <div class="container-fluid">
        <div class="row">
            <h2 class="page-title">@lang('pe_leave_edit.page_title')</h2>
        </div>

        <div class="row">
            <div class="box box-success">
                <div class="box-body">

                <form id="edit_request_personal_leave_form" action="{{ url('personal/leaves/update') }}" class="ui form" method="post" accept-charset="utf-8">
                    {{ csrf_field() }}
                        
                        <div class="field">
                            <label>@lang('pe_leave_edit.leave_type')</label>
                            <select class="ui dropdown uppercase" name="type">
                                @isset($lt))
                                @foreach ($lt as $data)
                                    <option value="{{ $data->leavetype }}" @if($data->leavetype == $type) selected @endif>{{ $data->leavetype }}</option>
                                @endforeach
                                @endisset
                            </select>
                        </div>
                        <div class="two fields">
                            <div class="field">
                                <label for="">@lang('pe_leave_edit.leave_from')</label>
                                <input id="leavefrom" type="text" placeholder="Date" name="leavefrom" class="airdatepicker" value="@isset($l->leavefrom){{ $l->leavefrom }}@endisset"/>
                            </div>
                            <div class="field">
                                <label for="">@lang('pe_leave_edit.leave_to')</label>
                                <input id="leaveto" type="text" placeholder="Date" name="leaveto" class="airdatepicker" value="@isset($l->leaveto){{ $l->leaveto }}@endisset"/>
                            </div>
                        </div>
                        <div class="field">
                            <label for="">@lang('pe_leave_edit.return_date')</label>
                            <input id="returndate" type="text" placeholder="Enter Return date" name="returndate" class="airdatepicker uppercase" value="@isset($l->returndate){{ $l->returndate }}@endisset"/>
                        </div>
                        <div class="field">
                            <label>@lang('pe_leave_edit.return_reason')</label>
                            <textarea class="uppercase" rows="5" name="reason" value="@isset($l->reason){{ $l->reason }}@endisset">@isset($l->reason){{ $l->reason }}@endisset</textarea>
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
                        <div class="actions">
                            <input type="hidden" name="id" value="@isset($id){{ $id }}@endisset">
                            <button class="ui positive small button" type="submit" name="submit"><i class="ui checkmark icon"></i> @lang('pe_leave_edit.update')</button>
                            <a href="{{ url('personal/leaves/view') }}" class="ui grey small button cancel"><i class="ui times icon"></i> @lang('pe_leave_edit.cancel')</a>
                        </div>
                </form>  

                </div>
            </div>
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


