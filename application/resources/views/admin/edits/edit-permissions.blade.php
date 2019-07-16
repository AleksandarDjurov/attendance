@extends('layouts.default')
    @section('meta')
    <title>@lang('auth.title')</title>
    <meta name="description" content="smart Control Horario edit user permissions.">
    @endsection 

    @section('styles')
    @endsection

    @section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h2 class="page-title">@lang('auth.edit_permission')
                <a href="{{ url('users/roles') }}" class="ui basic blue button mini offsettop5 float-right"><i class="ui icon chevron left"></i>Return</a>
            </h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-content">
                    <form action="{{ url('users/roles/permissions/update') }}" class="ui form grid" method="post" accept-charset="utf-8">
                        {{ csrf_field() }}
                        <div class="eight wide column">
                            <div class="ui relaxed list">
                                <h3 class="ui sub header">@lang('auth.dashboard')</h3>
                                <div class="item">
                                    <div class="ui master checkbox">
                                        <input type="checkbox" @isset($d) @if(in_array('1', $d)==true) checked @endif @endisset name="perms[]" value="1">
                                        <label>@lang('auth.open_dashboard')</label>
                                    </div>
                                </div>
                                <h3 class="ui sub header">@lang('auth.employee')</h3>
                                <div class="item">
                                    <div class="ui master checkbox">
                                        <input type="checkbox" @isset($d) @if(in_array('2', $d)==true) checked @endif @endisset name="perms[]" value="2">
                                        <label>@lang('auth.employee_page')</label>
                                    </div>
                                    <div class="list">
                                        <div class="item">
                                            <div class="ui child checkbox slider">
                                                <input type="checkbox" @isset($d) @if(in_array('22', $d)==true) checked @endif @endisset name="perms[]" value="22">
                                                <label>@lang('auth.employee_profile')</label>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="ui child checkbox slider">
                                                <input type="checkbox" @isset($d) @if(in_array('21', $d)==true) checked @endif @endisset name="perms[]" value="21">
                                                <label>@lang('auth.add_employee')</label>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="ui child checkbox slider">
                                                <input type="checkbox" @isset($d) @if(in_array('23', $d)==true) checked @endif @endisset name="perms[]" value="23">
                                                <label>@lang('auth.edit_employee')</label>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="ui child checkbox slider">
                                                <input type="checkbox" @isset($d) @if(in_array('24', $d)==true) checked @endif @endisset name="perms[]" value="24">
                                                <label>@lang('auth.delete_employee')</label>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="ui child checkbox slider">
                                                <input type="checkbox" @isset($d) @if(in_array('25', $d)==true) checked @endif @endisset name="perms[]" value="25">
                                                <label>@lang('auth.archive_employee')</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <h3 class="ui sub header">@lang('auth.attendance')</h3>
                                <div class="item">
                                    <div class="ui master checkbox">
                                        <input type="checkbox" @isset($d) @if(in_array('3', $d)==true) checked @endif @endisset name="perms[]" value="3">
                                        <label>@lang('auth.open_attend')</label>
                                    </div>
                                    <div class="list">
                                        <div class="item">
                                            <div class="ui child checkbox slider">
                                                <input type="checkbox" @isset($d) @if(in_array('31', $d)==true) checked @endif @endisset name="perms[]" value="31">
                                                <label>@lang('auth.edit_attend')</label>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="ui child checkbox slider">
                                                <input type="checkbox" @isset($d) @if(in_array('32', $d)==true) checked @endif @endisset name="perms[]" value="32">
                                                <label>@lang('auth.delete_attend')</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <h3 class="ui sub header">@lang('auth.schedule')</h3>
                                <div class="item">
                                    <div class="ui master checkbox">
                                        <input type="checkbox" @isset($d) @if(in_array('4', $d)==true) checked @endif @endisset name="perms[]" value="4">
                                        <label>@lang('auth.open_schedule')</label>
                                    </div>
                                    <div class="list">
                                        <div class="item">
                                            <div class="ui child checkbox slider">
                                                <input type="checkbox" @isset($d) @if(in_array('41', $d)==true) checked @endif @endisset name="perms[]" value="41">
                                                <label>@lang('auth.add_schedule')</label>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="ui child checkbox slider">
                                                <input type="checkbox" @isset($d) @if(in_array('42', $d)==true) checked @endif @endisset name="perms[]" value="42">
                                                <label>@lang('auth.edit_schedule')</label>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="ui child checkbox slider">
                                                <input type="checkbox" @isset($d) @if(in_array('43', $d)==true) checked @endif @endisset name="perms[]" value="43">
                                                <label>@lang('auth.delete_schedule')</label>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="ui child checkbox slider">
                                                <input type="checkbox" @isset($d) @if(in_array('44', $d)==true) checked @endif @endisset name="perms[]" value="44">
                                                <label>@lang('auth.archive_schedule')</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <h3 class="ui sub header">@lang('auth.leave')</h3>
                                <div class="item">
                                    <div class="ui master checkbox">
                                        <input type="checkbox" @isset($d) @if(in_array('5', $d)==true) checked @endif @endisset name="perms[]" value="5">
                                        <label>@lang('auth.open_leave')</label>
                                    </div>
                                    <div class="list">
                                        {{-- <div class="item">
                                            <div class="ui child checkbox slider">
                                                <input type="checkbox" @isset($d) @if(in_array('51', $d)==true) checked @endif @endisset name="perms[]" value="51">
                                                <label><i class="icon"></i>Add Leave</label>
                                            </div>
                                        </div> --}}
                                        <div class="item">
                                            <div class="ui child checkbox slider">
                                                <input type="checkbox" @isset($d) @if(in_array('52', $d)==true) checked @endif @endisset name="perms[]" value="52">
                                                <label>@lang('edit_leave')</label>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="ui child checkbox slider">
                                                <input type="checkbox" @isset($d) @if(in_array('53', $d)==true) checked @endif @endisset name="perms[]" value="53">
                                                <label>@lang('auth.delete_leave')</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <h3 class="ui sub header">@lang('auth.setting')</h3>
                                <div class="item">
                                    <div class="ui master checkbox">
                                        <input type="checkbox" @isset($d) @if(in_array('9', $d)==true) checked @endif @endisset name="perms[]" value="9">
                                        <label>@lang('auth.open_setting')</label>
                                    </div>
                                    <div class="list">
                                        <div class="item">
                                            <div class="ui child checkbox slider">
                                                <input type="checkbox" @isset($d) @if(in_array('91', $d)==true) checked @endif @endisset name="perms[]" value="91">
                                                <label>@lang('auth.update_setting')</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <h3 class="ui sub header">@lang('auth.report')</h3>
                                <div class="item">
                                    <div class="ui master checkbox">
                                        <input type="checkbox" @isset($d) @if(in_array('7', $d)==true) checked @endif @endisset name="perms[]" value="7">
                                        <label>@lang('auth.open_report')</label>
                                    </div>
                                </div>

                                <h3 class="ui sub header">@lang('auth.users')</h3>
                                <div class="item">
                                    <div class="ui master checkbox">
                                        <input type="checkbox" @isset($d) @if(in_array('8', $d)==true) checked @endif @endisset name="perms[]" value="8">
                                        <label>@lang('auth.open_user')</label>
                                    </div>
                                    <div class="list">
                                        <div class="item">
                                            <div class="ui child checkbox slider">
                                                <input type="checkbox" @isset($d) @if(in_array('81', $d)==true) checked @endif @endisset name="perms[]" value="81">
                                                <label>@lang('auth.add_user')</label>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="ui child checkbox slider">
                                                <input type="checkbox" @isset($d) @if(in_array('82', $d)==true) checked @endif @endisset name="perms[]" value="82">
                                                <label>@lang('auth.edit_user')</label>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="ui child checkbox slider">
                                                <input type="checkbox" @isset($d) @if(in_array('83', $d)==true) checked @endif @endisset name="perms[]" value="83">
                                                <label>@lang('auth.delete_user')</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <h3 class="ui sub header">@lang('auth.role')</h3>
                                <div class="item">
                                    <div class="ui master checkbox">
                                        <input type="checkbox" @isset($d) @if(in_array('10', $d)==true) checked @endif @endisset name="perms[]" value="10">
                                        <label>@lang('auth.open_role')</label>
                                    </div>
                                    <div class="list">
                                        <div class="item">
                                            <div class="ui child checkbox slider">
                                                <input type="checkbox" @isset($d) @if(in_array('101', $d)==true) checked @endif @endisset name="perms[]" value="101">
                                                <label>@lang('auth.add_role')</label>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="ui child checkbox slider">
                                                <input type="checkbox" @isset($d) @if(in_array('102', $d)==true) checked @endif @endisset name="perms[]" value="102">
                                                <label>@lang('auth.edit_role')</label>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="ui child checkbox slider">
                                                <input type="checkbox" @isset($d) @if(in_array('103', $d)==true) checked @endif @endisset name="perms[]" value="103">
                                                <label>@lang('auth.set_permission')</label>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="ui child checkbox slider">
                                                <input type="checkbox" @isset($d) @if(in_array('103', $d)==true) checked @endif @endisset name="perms[]" value="104">
                                                <label>@lang('auth.delete_role')</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <h3 class="ui sub header">@lang('auth.company')</h3>
                                <div class="item">
                                    <div class="ui master checkbox">
                                        <input type="checkbox" @isset($d) @if(in_array('11', $d)==true) checked @endif @endisset name="perms[]" value="11">
                                        <label>@lang('auth.open_company')</label>
                                    </div>
                                    <div class="list">
                                        <div class="item">
                                            <div class="ui child checkbox slider">
                                                <input type="checkbox" @isset($d) @if(in_array('111', $d)==true) checked @endif @endisset name="perms[]" value="111">
                                                <label>@lang('auth.add_company')</label>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="ui child checkbox slider">
                                                <input type="checkbox" @isset($d) @if(in_array('112', $d)==true) checked @endif @endisset name="perms[]" value="112">
                                                <label>@lang('auth.delete_company')</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <h3 class="ui sub header">@lang('auth.department')</h3>
                                <div class="item">
                                    <div class="ui master checkbox">
                                        <input type="checkbox" @isset($d) @if(in_array('12', $d)==true) checked @endif @endisset name="perms[]" value="12">
                                        <label>@lang('auth.open department')</label>
                                    </div>
                                    <div class="list">
                                        <div class="item">
                                            <div class="ui child checkbox slider">
                                                <input type="checkbox" @isset($d) @if(in_array('121', $d)==true) checked @endif @endisset name="perms[]" value="121">
                                                <label>@lang('auth.add_department')</label>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="ui child checkbox slider">
                                                <input type="checkbox" @isset($d) @if(in_array('122', $d)==true) checked @endif @endisset name="perms[]" value="122">
                                                <label>@lang('auth.delete_department')</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <h3 class="ui sub header">Job titles</h3>
                                <div class="item">
                                    <div class="ui master checkbox">
                                        <input type="checkbox" @isset($d) @if(in_array('13', $d)==true) checked @endif @endisset name="perms[]" value="13">
                                        <label>@lang('auth.open_job_title')</label>
                                    </div>
                                    <div class="list">
                                        <div class="item">
                                            <div class="ui child checkbox slider">
                                                <input type="checkbox" @isset($d) @if(in_array('131', $d)==true) checked @endif @endisset name="perms[]" value="131">
                                                <label>@lang('auth.add_job')</label>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="ui child checkbox slider">
                                                <input type="checkbox" @isset($d) @if(in_array('132', $d)==true) checked @endif @endisset name="perms[]" value="132">
                                                <label>@lang('auth.delete_job')</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <h3 class="ui sub header">@lang('auth.leave_type')</h3>
                                <div class="item">
                                    <div class="ui master checkbox">
                                        <input type="checkbox" @isset($d) @if(in_array('14', $d)==true) checked @endif @endisset name="perms[]" value="14">
                                        <label>@lang('auth.open_leave_type')</label>
                                    </div>
                                    <div class="list">
                                        <div class="item">
                                            <div class="ui child checkbox slider">
                                                <input type="checkbox" @isset($d) @if(in_array('141', $d)==true) checked @endif @endisset name="perms[]" value="141">
                                                <label>@lang('auth.add_leave')</label>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="ui child checkbox slider">
                                                <input type="checkbox" @isset($d) @if(in_array('142', $d)==true) checked @endif @endisset name="perms[]" value="142">
                                                <label>@lang('auth.delete_leave_type')</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <h3 class="ui sub header">@lang('auth.leave_group')</h3>
                                <div class="item">
                                    <div class="ui master checkbox">
                                        <input type="checkbox" @isset($d) @if(in_array('15', $d)==true) checked @endif @endisset name="perms[]" value="15">
                                        <label>@lang('auth.open_leave_group')</label>
                                    </div>
                                    <div class="list">
                                        <div class="item">
                                            <div class="ui child checkbox slider">
                                                <input type="checkbox" @isset($d) @if(in_array('151', $d)==true) checked @endif @endisset name="perms[]" value="151">
                                                <label>@lang('auth.add_leave_group')</label>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="ui child checkbox slider">
                                                <input type="checkbox" @isset($d) @if(in_array('152', $d)==true) checked @endif @endisset name="perms[]" value="152">
                                                <label>@lang('auth.edit_leave_group')</label>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="ui child checkbox slider">
                                                <input type="checkbox" @isset($d) @if(in_array('153', $d)==true) checked @endif @endisset name="perms[]" value="153">
                                                <label>@lang('auth.delete_leave_group')</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>

                <div class="box-footer">
                    <input type="hidden" value="@isset($id){{ $id }}@endisset" name="role_id">
                    <button class="ui positive approve small button" type="submit" name="submit"><i class="ui checkmark icon"></i>Set Permission</button>
                    <a href="{{ url('users/roles') }}" class="ui grey cancel small button"><i class="ui times icon"></i>Cancel</a>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script type="text/javascript">
    $('.list .master.checkbox').checkbox({
        onChecked: function () {
            var
                $childCheckbox = $(this).closest('.checkbox').siblings('.list').find('.checkbox');
            $childCheckbox.checkbox('check');
        },
        onUnchecked: function () {
            var
                $childCheckbox = $(this).closest('.checkbox').siblings('.list').find('.checkbox');
            $childCheckbox.checkbox('uncheck');
        }
    });

    $('.list .child.checkbox').checkbox({
        fireOnInit: true,
        onChange: function () {
            var
                $listGroup = $(this).closest('.list'),
                $parentCheckbox = $listGroup.closest('.item').children('.checkbox'),
                $checkbox = $listGroup.find('.checkbox'),
                allChecked = true,
                allUnchecked = true;
            $checkbox.each(function () {
                if ($(this).checkbox('is checked')) {
                    allUnchecked = false;
                } else {
                    allChecked = false;
                }
            });
            if (allChecked) {
                $parentCheckbox.checkbox('set checked');
            } else if (allUnchecked) {
                $parentCheckbox.checkbox('set unchecked');
            } else {
                $parentCheckbox.checkbox('set indeterminate');
            }
        }
    });
</script>
@endsection