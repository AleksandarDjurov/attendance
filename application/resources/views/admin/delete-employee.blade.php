@extends('layouts.default')
    @section('meta')
    <title>@lang('empl.title')</title>
    <meta name="description" content="smart Control Horario view employees, delete employees, edit employees, add employees">
    @endsection

    @section('content')
    
    <div class="container-fluid">
        <div class="row">
            <div class="box box-success col-md-6">
            <div class="box-header with-border">@lang('emple.del_empl_account')</div>
                <div class="box-body">
                    <form action="{{ url('profile/delete/employee') }}" class="ui form" method="post" accept-charset="utf-8">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="@isset($id) {{$id}} @endisset">
                        <div class="field">
                            <div class="ui header" style="margin:0">@lang('empl.are_you_del')</div>
                        </div>
                        <div class="field">
                            <p>@lang('empl.del_msg')</p>
                        </div>
                        <div class="field">
                            <a href="{{ url('employees') }}" class="ui black deny button">@lang('empl.no')</a>
                            <button class="ui positive button approve" type="submit" name="submit"><i class="ui checkmark icon"></i>@lang('empl.yes')</button>
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