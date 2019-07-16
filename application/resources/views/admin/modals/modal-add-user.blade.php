<div class="ui modal medium add">
    <div class="header">@lang('modal.add_new_user')</div>
    <div class="content">
        <form id="add_user_form" action="{{ url('users/register') }}" class="ui form add-user" method="post"
            accept-charset="utf-8">
            {{ csrf_field() }}
            <div class="field">
                <label>@lang('modal.employee')</label>
                <select class="ui search dropdown getemail uppercase" name="name">
                    <option value="">@lang('modal.select_employee')</option>
                    @isset($employees)
                    @foreach ($employees as $data)
                    <option value="{{ $data->lastname }}, {{ $data->firstname }}" data-e="{{ $data->emailaddress }}"
                        data-ref="{{ $data->id }}">{{ $data->lastname }}, {{ $data->firstname }}</option>
                    @endforeach
                    @endisset
                </select>
            </div>
            <div class="field">
                <label>@lang('modal.email')</label>
                <input type="text" name="email" class="readonly lowercase" value="" readonly>
            </div>
            <div class="grouped fields opt-radio">
                <label>@lang('modal.choose_acount_type') </label>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="acc_type" value="1">
                        <label>@lang('modal.employee')</label>
                    </div>
                </div>
                <div class="field" style="padding:0px!important">
                    <div class="ui radio checkbox">
                        <input type="radio" name="acc_type" value="2">
                        <label>@lang('modal.admin')</label>
                    </div>
                </div>
            </div>
            <div class="fields">
                <div class="sixteen wide field role">
                    <label for="">@lang('modal.role')</label>
                    <select class="ui dropdown uppercase" name="role_id">
                        <option value="">@lang('modal.select_role')</option>
                        @isset($roles)
                        @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                        @endforeach
                        @endisset
                    </select>
                </div>
            </div>
            <div class="fields">
                <div class="sixteen wide field">
                    <label>@lang('modal.status')</label>
                    <select class="ui dropdown uppercase" name="status">
                        <option value="">@lang('modal.select_status')</option>
                        <option value="1">@lang('modal.enabled')</option>
                        <option value="0">@lang('modal.disabled')</option>
                    </select>
                </div>
            </div>
            <div class="two fields">
                <div class="field">
                    <label for="">@lang('modal.pass')</label>
                    <input type="password" name="password" class="">
                </div>
                <div class="field">
                    <label for="">@lang('confirm_pass')</label>
                    <input type="password" name="password_confirmation" class="">
                </div>
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
    </div>
    <div class="actions">
        <input type="hidden" value="" name="ref">
        <button class="ui positive approve small button" type="submit" name="submit"><i class="ui checkmark icon"></i>
            @lang('modal.register')</button>
        <button class="ui grey cancel small button" type="button"><i class="ui times icon"></i> @lang('modal.cancel')</button>
    </div>
    </form>
</div>