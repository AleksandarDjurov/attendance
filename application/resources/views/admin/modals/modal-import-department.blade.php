
<div class="ui modal tiny import">
    <div class="header">@lang('modal.import_department')</div>
    <div class="content">
    <form action="{{ url('import/fields/department') }}" class="ui form" method="post" accept-charset="utf-8"enctype="multipart/form-data" >
    {{ csrf_field() }}
        <div class="field">
            <label>@lang('modal.import_csv')</label>
            <input class="ui file upload" value="" id="csvfile" name="csv" type="file" accept=".csv" onchange="validateFile()">
        </div>
    </div>
    <div class="actions">
        <button class="ui positive button approve" type="submit" name="submit"><i class="ui checkmark icon"></i> @lang('modal.submit')</button>
        <button class="ui grey button cancel" type="button"><i class="ui times icon"></i> @lang('modal.cancel')</button>
    </div>
    </form>  
</div>
