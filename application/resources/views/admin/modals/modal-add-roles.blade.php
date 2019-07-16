<div class="ui add modal small">
    <div class="header">@lang('modal.add_new_role')</div>
    <div class="content">
    <form id="add_role_form" action="{{ url('users/roles/add') }}" class="ui form" method="post" accept-charset="utf-8">
    {{ csrf_field() }}
        <div class="field">
            <label>@lang('modal.role_name')</label>
            <input class="uppercase" name="role_name" value="" type="text">
        </div>
        <div class="field">
            <label>@lang('modal.status')</label>
            <select name="state" class="ui dropdown uppercase">
                <option value="">@lang('modal.selct_status')</option>
                <option value="Active">@lang('modal.active')</option>
                <option value="Disabled">@lang('modal.disabled')</option>
            </select>
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
        <button class="ui positive small button" type="submit" name="submit"><i class="ui checkmark icon"></i> @lang('modal.save')</button>
        <button class="ui grey cancel small button" type="button"><i class="ui times icon"></i> @lang('modal.cancel')</button>
    </div>
    </form>  
</div>
