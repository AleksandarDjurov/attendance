@extends('layouts.default')
    @section('meta')
    <title>@lang('empl.title')</title>
    <meta name="description" content="smart Control Horario employees, view all employees, add, edit, delete, and archive employees.">
    @endsection

    @section('content')

    <div class="container-fluid">
        <div class="row">
            <h2 class="page-title">@lang('empl.employee')
                <a class="ui positive button mini offsettop5 float-right" href="{{ url('employees/new') }}"><i class="ui icon plus"></i>@lang('empl.add')</a>
            </h2>
        </div>

        <div class="row">
            <div class="box box-success">
                <div class="box-body">
                <table width="100%" class="table table-striped table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>@lang('empl.id')</th>
                            <th>@lang('empl.empl')</th>
                            <th>@lang('empl.company')</th>
                            <th>@lang('empl.department')</th>
                            <th>@lang('empl.position')</th>
                            <th>@lang('empl.status')</th>
                            <th class=""></th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset($data)
                        @foreach ($data as $employee)
                            <tr class="">
                            <td>{{ $employee->idno }}</td>
                            <td>{{ $employee->lastname }}, {{ $employee->firstname }}</td>
                            <td>{{ $employee->company }}</td>
                            <td>{{ $employee->department }}</td>
                            <td>{{ $employee->jobposition }}</td>
                            <td>
                                @if($employee->employmentstatus == 'Active') @lang('empl.active') @else @lang('empl.archived') @endif
                            </td>
                            <td class="align-right">
                            <a href="{{ url('/profile/view/'.$employee->reference) }}" class="ui circular basic icon button tiny"><i class="file alternate outline icon"></i></a>
                            <a href="{{ url('/profile/edit/'.$employee->reference) }}" class="ui circular basic icon button tiny"><i class="edit outline icon"></i></a>
                            <a href="{{ url('/profile/delete/'.$employee->reference) }}" class="ui circular basic icon button tiny"><i class="trash alternate outline icon"></i></a>
                            <a href="{{ url('/profile/archive/'.$employee->reference) }}" class="ui circular basic icon button tiny"><i class="archive icon"></i></a>
                            </td>
                            </tr>
                        @endforeach
                        @endisset
                    </tbody>
                </table>
                </div>
            </div>
        </div>
        
    </div>

    @endsection

    @section('scripts')
    <script type="text/javascript">
    $(document).ready(function() {
        $('#dataTables-example').DataTable(
            {   responsive: true,
                pageLength: 10,
                lengthChange: false,
                searching: true,
                sorting: false,
                "language": {
                    "lengthMenu": "{{trans('table.display')}} _MENU_ {{trans('table.record')}} {{trans('table.per')}} {{trans('table.page')}}",
                    "zeroRecords": "{{trans('table.nothing')}} {{trans('table.found')}} - {{trans('table.sorry')}}",
                    "info": "{{trans('table.showing')}} {{trans('table.page')}} _PAGE_ {{trans('table.of')}} _PAGES_",
                    "infoEmpty": "{{trans('table.no_record')}}",
                    "infoFiltered": "({{trans('table.filter')}} {{trans('table.from')}} _MAX_ {{trans('table.total')}} {{trans('table.record')}})"
                }
            });
    });
    </script>
    @endsection