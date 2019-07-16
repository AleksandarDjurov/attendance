<div class="ui modal medium view">
    <div class="header">@lang('pe_mdl_view_leave.title')</div>
    <div class="content">
        <form action="" class="ui form" method="post" accept-charset="utf-8">
            <div class="field">
                <label>@lang('pe_mdl_view_leave.employee')</label>
                <input type="text" class="employee uppercase readonly" value="" readonly="">
            </div>
            <div class="field">
                <label>@lang('pe_mdl_view_leave.leave_type')</label>
                <input type="text" class="leavetype uppercase readonly" value="" readonly="">
            </div>
            <div class="two fields">
                <div class="field">
                    <label for="">@lang('pe_mdl_view_leave.leave_from')</label>
                    <input type="text" class="leavefrom readonly" value="" readonly="" />
                </div>
                <div class="field">
                    <label for="">@lang('pe_mdl_view_leave.leave_to')</label>
                    <input type="text" class="leaveto readonly" value="" readonly=""/>
                </div>
            </div>
            <div class="field">
                <label for="">@lang('pe_mdl_view_leave.return_date')</label>
                <input type="text" class="returndate readonly" value="" readonly=""/>
            </div>
            <div class="field">
                <label>@lang('pe_mdl_view_leave.reason')</label>
                <textarea rows="5" class="reason uppercase readonly" value="" readonly=""></textarea>
            </div>
            <div class="field">
                <label for="">@lang('pe_mdl_view_leave.status')</label>
                <input type="text" class="status readonly" value="" readonly=""/>
            </div>
        </form>
    </div>
    <div class="actions">
        <button class="ui grey small button cancel" type="button"><i class="ui times icon"></i> @lang('pe_mdl_view_leave.close')</button>
    </div>
    </form>  
</div>
    