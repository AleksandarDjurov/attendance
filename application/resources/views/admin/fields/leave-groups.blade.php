@extends('layouts.default')
    @section('meta')
    <title>@lang('company.title_leave')</title>
    <meta name="description" content="smart Control Horario leave groups, view leave groups, add leave groups, and edit leave groups.">
    @endsection

    @section('content')
    @include('admin.modals.modal-add-leavegroup')

    <div class="container-fluid">
        <div class="row">
            <h2 class="page-title">Leave Groups
                <button class="ui positive mini button offsettop5 btn-add float-right"><i class="ui icon plus"></i>@lang('company.add')</button>
                <a href="{{ url('fields/leavetype/') }}" class="ui basic mini button offsettop5 float-right"><i class="icon angle left"></i>@lang('company.return')</a>
            </h2>
        </div>

        <div class="row">
            <div class="box box-success">
                <div class="box-body">
                    <table width="100%" class="table table-striped table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>@lang('company.leave_group')</th>
                                <th>@lang('company.description')</th>
                                <th>@lang('company.privilege')</th>
                                <th>@lang('company.status')</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($lg) 
                                @foreach($lg as $l)
                                    <tr>
                                        <td>{{ $l->leavegroup }}</td>
                                        <td>{{ $l->description }}</td>
                                        <td>
                                            @isset($lt)
                                                @foreach($lt as $ln) 
                                                    @php
                                                        $lgroup = explode(",",$l->leaveprivileges);
                                                        foreach ($lgroup as $v) {
                                                            if($v == $ln->id){
                                                                echo $ln->leavetype.", ";
                                                            }
                                                        }
                                                    @endphp
                                                @endforeach
                                            @endisset
                                           
                                        </td>
                                        <td>@if($l->status == 1) Active @else Disabled @endif</td>
                                        <td class="align-right">
                                            <a href="{{ url('fields/leavetype/leave-groups/edit/'.$l->id) }}" class="ui circular basic icon button tiny"><i class="icon edit outline"></i></a>
                                            <a href="{{ url('fields/leavetype/leave-groups/delete/'.$l->id) }}" class="ui circular basic icon button tiny"><i class="icon trash alternate outlin"></i></a>
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
        $('#dataTables-example').DataTable({responsive: true,pageLength: 15,lengthChange: false,searching: true,});        
    });
    </script>

    @endsection