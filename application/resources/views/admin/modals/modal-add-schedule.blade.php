<div class="ui modal add medium">
    <div class="header">@lang('modal.add_new_schedule')</div>
    <div class="content">
        <form id="add_schedule_form" action="{{ url('schedules/add') }}" class="ui form" method="post" accept-charset="utf-8">
        {{ csrf_field() }}
            <div class="field">
                <label>Employee</label>
                <select class="ui search dropdown getid uppercase" name="employee">
                    <option value="">@lang('modal.select_employee')</option>
                    @isset($employee)
                    @foreach ($employee as $data)
                        <option value="{{ $data->lastname }}, {{ $data->firstname }}" data-id="{{ $data->id }}">{{ $data->lastname }}, {{ $data->firstname }}</option>
                    @endforeach
                    @endisset
                </select>
            </div>

            <div class="two fields">
                <div class="field">
                    <label for="">@lang('modal.start_time')</label>
                    <input type="text" placeholder="00:00:00 AM" name="intime" class="jtimepicker" />
                </div>
                <div class="field">
                    <label for="">@lang('modal.off_time')</label>
                    <input type="text" placeholder="00:00:00 PM" name="outime" class="jtimepicker" />
                </div>
            </div>

            <div class="field">
                <label for="">@lang('modal.from')</label>
                <input type="text" placeholder="Date" name="datefrom" id="datefrom" class="airdatepicker" />
            </div>
            <div class="field">
                <label for="">@lang('modal.to')</label>
                <input type="text" placeholder="Date" name="dateto" id="dateto" class="airdatepicker" />
            </div>

            <div class="eight wide field">
                <label for="">@lang('modal.total_hour')</label>
                <input type="number" placeholder="0" name="hours" />
            </div>

           <div class="grouped fields field">
                <label>@lang('modal.choose_rest')</label>
                <div class="field">
                <div class="ui checkbox sunday">
                    <input type="checkbox" name="restday[]" value="Sunday">
                    <label>@lang('modal.sunday')</label>
                </div>
                </div>
                <div class="field">
                <div class="ui checkbox ">
                    <input type="checkbox" name="restday[]" value="Monday">
                    <label>@lang('modal.monday')</label>
                </div>
                </div>
                <div class="field">
                <div class="ui checkbox ">
                    <input type="checkbox" name="restday[]" value="Tuesday">
                    <label>@lang('modal.tuesday')</label>
                </div>
                </div>
                <div class="field">
                <div class="ui checkbox ">
                    <input type="checkbox" name="restday[]" value="Wednesday">
                    <label>@lang('modal.wednesday')</label>
                </div>
                </div>
                <div class="field">
                <div class="ui checkbox ">
                    <input type="checkbox" name="restday[]" value="Thursday">
                    <label>@lang('modal.thursday')</label>
                </div>
                </div>
                <div class="field">
                <div class="ui checkbox ">
                    <input type="checkbox" name="restday[]" value="Friday">
                    <label>@lang('modal.friday')</label>
                </div>
                </div>
                <div class="field" style="padding:0">
                <div class="ui checkbox saturday">
                    <input type="checkbox" name="restday[]" value="Saturday">
                    <label>@lang('modal.saturday')</label>
                </div>
                </div>
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
            <input type="hidden" name="id" value="">
            <button class="ui positive small button" type="submit" name="submit"><i class="ui checkmark icon"></i> @lang('modal.save')</button>
            <button class="ui grey small button cancel" type="button"><i class="ui times icon"></i> @lang('modal.cancel')</button>
        </div>
        </form>  
</div>
