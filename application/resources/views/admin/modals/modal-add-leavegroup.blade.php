<div class="ui modal medium add">
    <div class="header">@lang('modal.add_new_leave')</div>
    <div class="content">
        <form id="add_leavegroup_form" action="{{ url('fields/leavetype/leave-groups/add') }}" class="ui form" method="post" accept-charset="utf-8">
            {{ csrf_field() }}
            <div class="field">
                <label>@lang('modal.leave_group_name')</label>
                <input type="text" name="leavegroup" value="" class="uppercase" placeholder="Enter Leave Group Name">
            </div>
            <div class="field">
                <label>@lang('modal.description')</label>
                <input type="text" name="description" value="" class="uppercase" placeholder="Enter Description for Leave Group">
            </div>

            <div class="field">
                <label>@lang('modal.leave_pri')</label>
                <select class="ui search dropdown selection multiple uppercase" name="leaveprivileges[]" multiple="">
                    <option value="">@lang('modal.select_leave')</option>
                    @isset($lt)
                    @foreach($lt as $leave)
                    <option value="{{ $leave->id }}">{{ $leave->leavetype }}</option>
                    @endforeach
                    @endisset
                </select>
            </div>

            <div class="field">
                <label>Status</label>
                <select class="ui dropdown uppercase" name="status">
                    <option value="">@lang('modal.select_status')</option>
                    <option value="1">@lang('modal.active')</option>
                    <option value="0">@lang('modal.disabled')</option>
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
        <button class="ui positive small button approve" type="submit" name="submit"><i class="ui checkmark icon"></i>
            @lang('modal.save')</button>
        <button class="ui grey small button cancel" type="button"><i class="ui times icon"></i> @lang('modal.cancel')</button>
    </div>
    </form>
</div>