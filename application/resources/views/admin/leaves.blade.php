@extends('layouts.default')
    @section('meta')
    <title>@lang('empl.title_leave')</title>
    <meta name="description" content="smart Control Horario leave of absence, view all employee leaves of absence, edit, comment, and approve or deny leave requests.">
    @endsection 

    @section('content')

    <div class="container-fluid">
        <div class="row">
            <h2 class="page-title">Leaves of Absence</h2>
        </div>

        <div class="row">
            <div class="box box-success">
                <div class="box-body">
                    <table width="100%" class="table table-striped table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>@lang('empl.id')</th>
                                <th>@lang('empl.empl')</th>
                                <th>@lang('empl.desc')</th>
                                <th>@lang('empl.leave_from')</th>
                                <th>@lang('empl.leave_to')</th>
                                <th>@lang('empl.return_date')</th>
                                <th>@lang('empl.status')</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($leaves)
                            @foreach ($leaves as $data)
                            <tr>
                                <td>{{ $data->idno }}</td>
                                <td>{{ $data->employee }}</td>
                                <td>{{ $data->type }}</td>
                                <td>@php echo e(date('D, M d, Y', strtotime($data->leavefrom))) @endphp</td>
                                <td>@php echo e(date('D, M d, Y', strtotime($data->leaveto))) @endphp</td>
                                <td>@php echo e(date('M d, Y', strtotime($data->returndate))) @endphp</td>
                                <td><span class="">{{ $data->status }}</span></td>
                                <td class="align-right">
                                    <a href="{{ url('leaves/edit/'.$data->id) }}" class="ui circular basic icon button tiny"><i class="icon edit outline"></i></a>
                                    <a href="{{ url('leaves/delete/'.$data->id) }}" class="ui circular basic icon button tiny"><i class="icon trash alternate outlin"></i></a>
                                
                                    @isset($data->comment)
                                        <button class="ui circular basic icon button tiny uppercase" data-tooltip='{{ $data->comment }}' data-variation='wide' data-position='top right'><i class="ui icon comment alternate"></i></button>
                                    @endisset
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
            {
                responsive: true,
                pageLength: 15,
                lengthChange: false,
                searching: true,
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