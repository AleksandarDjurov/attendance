@extends('layouts.default')
    @section('meta')
    <title>@lang('report.title')</title>
    <meta name="description" content="smart Control Horario reports, view reports, and export or download reports.">
    @endsection 

    @section('content')
    
    <div class="container-fluid">
        <div class="row">
            <h2 class="page-title">@lang('report.report')</h2>
        </div>

        <div class="row">
            <div class="box box-success">
                <div class="box-body">
                <table width="100%" class="reports-table table table-striped table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>@lang('report.report_name')</th>
                            <th class="odd">@lang('report.last_view')</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><a href="{{ url('reports/employee-list') }}"><i class="ui icon users"></i> @lang('report.employ_list')</a></td>
                            <td class="odd">
                                @isset($lastviews)
                                @foreach ($lastviews as $views)
                                    @if($views->report_id == 1)
                                       {{ $views->last_viewed }}
                                    @endif
                                @endforeach
                                @endisset
                            </td>
                        </tr>
                        <tr>
                            <td><a href="{{ url('reports/employee-attendance') }}"><i class="ui icon clock"></i> @lang('report.employ_attend_report')</a></td>
                            <td class="odd">
                                @isset($lastviews)
                                @foreach ($lastviews as $views)
                                    @if($views->report_id == 2)
                                       {{ $views->last_viewed }}
                                    @endif
                                @endforeach
                                @endisset
                            </td>
                        </tr>
                        <tr>
                            <td><a href="{{ url('reports/employee-leaves') }}"><i class="ui icon calendar plus"></i> @lang('report.employ_leave_report')</a></td>
                            <td class="odd">
                                @isset($lastviews)
                                @foreach ($lastviews as $views)
                                    @if($views->report_id == 3)
                                       {{ $views->last_viewed }}
                                    @endif
                                @endforeach
                                @endisset
                            </td>
                        </tr>
                        <tr>
                            <td><a href="{{ url('reports/employee-schedule') }}"><i class="ui icon calendar alternate outline"></i> @lang('report.employ_schedule_report')</a></td>
                            <td class="odd">
                                @isset($lastviews)
                                @foreach ($lastviews as $views)
                                    @if($views->report_id == 4)
                                       {{ $views->last_viewed }}
                                    @endif
                                @endforeach
                                @endisset
                            </td>
                        </tr>
                        <tr>
                            <td><a href="{{ url('reports/organization-profile') }}"><i class="ui icon chart pie"></i> @lang('report.organization_profile')</a></td>
                            <td class="odd">
                                @isset($lastviews)
                                @foreach ($lastviews as $views)
                                    @if($views->report_id == 5)
                                       {{ $views->last_viewed }}
                                    @endif
                                @endforeach
                                @endisset
                            </td>
                        </tr>
                        <tr>
                            <td><a href="{{ url('reports/employee-birthdays') }}"><i class="ui icon birthday cake"></i> @lang('report.employ_birthday')</a></td>
                            <td class="odd">
                                @isset($lastviews)
                                @foreach ($lastviews as $views)
                                    @if($views->report_id == 7)
                                       {{ $views->last_viewed }}
                                    @endif
                                @endforeach
                                @endisset
                            </td>
                        </tr>
                        <tr>
                            <td><a href="{{ url('reports/user-accounts') }}"><i class="ui icon address book outline"></i> @lang('report.user_account_report')</a></td>
                            <td class="odd">
                                @isset($lastviews)
                                @foreach ($lastviews as $views)
                                    @if($views->report_id == 6)
                                       {{ $views->last_viewed }}
                                    @endif
                                @endforeach
                                @endisset
                            </td>
                        </tr>

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
        $('#dataTables-example').DataTable({responsive: true,pageLength: 15,lengthChange: false,searching: false,sorting: false,});
    });
    </script>
    @endsection 