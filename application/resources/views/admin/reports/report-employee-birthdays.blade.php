@extends('layouts.default')
    @section('meta')
    <title>@lang('report.title')</title>
    <meta name="description" content="smart Control Horario reports, view reports, and export or download reports.">
    @endsection
    
    @section('content')
    
    <div class="container-fluid">
        <div class="row">
            <h2 class="page-title">@lang('report.employee_birthday')
                <a href="{{ url('export/report/birthdays') }}" class="ui basic button mini offsettop5 btn-export float-right"><i class="ui icon download"></i>Export to CSV</a>
                <a href="{{ url('reports') }}" class="ui basic blue button mini offsettop5 float-right"><i class="ui icon chevron left"></i>Return</a>
            </h2>   
        </div>

        <div class="row">
            <div class="box box-success">
                <div class="box-body">
                    <table width="100%" class="table table-striped table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>@lang('report.id')</th>
                                <th>@lang('report.employee_name')</th>
                                <th>@lang('report.department')</th>
                                <th>@lang('report.position')</th>
                                <th>@lang('report.birthday')</th>
                                <th>@lang('report.contact')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($empBday)
                            @foreach ($empBday as $v)
                                <tr>
                                    <td>{{ $v->idno }}</td>
                                    <td>{{ $v->lastname }}, {{ $v->firstname }} {{ $v->mi }}</td>
                                    <td>{{ $v->department }}</td>
                                    <td>{{ $v->jobposition }}</td>
                                    <td>
                                    @php $bdaydate = date("D, M d Y", strtotime($v->birthday)); @endphp
                                    @if($v->birthday != null)
                                        {{ $bdaydate }}
                                    @endif
                                    </td>
                                    <td>{{ $v->mobileno }}</td>
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
        $('#dataTables-example').DataTable({responsive: true,pageLength: 15,lengthChange: false,searching: true,});
    });
    </script>
    @endsection 