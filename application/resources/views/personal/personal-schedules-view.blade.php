@extends('layouts.personal')
    @section('meta')
    <title>@lang('pe_schedule.title')</title>
    <meta name="description" content="smart Control Horario my schedules, view my schedule records, view present and previous schedules.">
    @endsection

    @section('styles')
    <link href="{{ asset('/assets/vendor/air-datepicker/dist/css/datepicker.min.css') }}" rel="stylesheet">
    @endsection

    @section('content')
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
            <h2 class="page-title">@lang('pe_schedule.page_title')</h2>
            </div>    
        </div>

        <div class="row">
            <div class="col-md-12">
            <div class="box box-success">
                <div class="box-body reportstable">
                    <form action="" method="get" accept-charset="utf-8" class="ui small form form-filter" id="filterform">
                        {{ csrf_field() }}
                        <div class="inline two fields">
                            <div class="three wide field">
                                <label>@lang('pe_schedule.date_range')</label>
                                <input id="datefrom" type="text" name="" value="" placeholder="Start Date" class="airdatepicker">
                                <i class="ui icon calendar alternate outline calendar-icon"></i>
                            </div>

                            <div class="two wide field">
                                <input id="dateto" type="text" name="" value="" placeholder="End Date" class="airdatepicker">
                                <i class="ui icon calendar alternate outline calendar-icon"></i>
                            </div>
                            <button id="btnfilter" class="ui button positive small"><i class="ui icon filter alternate"></i> @lang('pe_schedule.filter')</button>
                        </div>
                    </form>

                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example" data-order='[[ 6, "desc" ]]'>
                        <thead>
                            <tr>
                                <th>@lang('pe_schedule.intime')</th>
                                <th>@lang('pe_schedule.outtime')</th>
                                <th>@lang('pe_schedule.hours')</th>
                                <th>@lang('pe_schedule.restday')<span class="help">(s)</span></th>
                                <th>@lang('pe_schedule.datefrom') <span class="help">(Date)</span></th>
                                <th>@lang('pe_schedule.dateto') <span class="help">(Date)</span></th>
                                <th>@lang('pe_schedule.status')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($s)
                            @foreach ($s as $sched)
                            <tr>
                                <td>{{ $sched->intime }}</td>
                                <td>{{ $sched->outime }}</td>
                                <td>{{ $sched->hours }} hours</td>
                                <td>{{ $sched->restday }}</td>
                                <td>
                                    @php 
                                        $datefrom = $sched->datefrom;
                                        $datefrom=date('l, F j, Y',strtotime($datefrom));
                                        {{ echo $datefrom; }}
                                    @endphp 
                                </td>
                                <td>
                                    @php 
                                        $dateto = $sched->dateto;
                                        $dateto=date('l, F j, Y',strtotime($dateto));
                                        {{ echo $dateto; }}
                                    @endphp
                                </td>
                                <td>
                                    @if($sched->archive == '0') 
                                        <span class="green">@lang('pe_schedule.present_schedule')</span>
                                    @else
                                        <span class="teal">@lang('pe_schedule.past_schedule')</span>
                                    @endif
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
            
    </div>

    @endsection
    
    @section('scripts')
    <script src="{{ asset('/assets/vendor/air-datepicker/dist/js/datepicker.min.js') }}"></script>
    <script src="{{ asset('/assets/vendor/air-datepicker/dist/js/i18n/datepicker.en.js') }}"></script>

    <script type="text/javascript">
    $('#dataTables-example').DataTable(
        {
            responsive: true,
            pageLength: 15,
            lengthChange: false,
            searching: false,
            "language": {
                "lengthMenu": "{{trans('table.display')}} _MENU_ {{trans('table.record')}} {{trans('table.per')}} {{trans('table.page')}}",
                "zeroRecords": "{{trans('table.nothing')}} {{trans('table.found')}} - {{trans('table.sorry')}}",
                "info": "{{trans('table.showing')}} {{trans('table.page')}} _PAGE_ {{trans('table.of')}} _PAGES_",
                "infoEmpty": "{{trans('table.no_record')}}",
                "infoFiltered": "({{trans('table.filter')}} {{trans('table.from')}} _MAX_ {{trans('table.total')}} {{trans('table.record')}})"
            }
        });

    $('.airdatepicker').datepicker({ language: 'en', dateFormat: 'yyyy-mm-dd' });

    $('#filterform').submit(function(event) {
        event.preventDefault();
        var date_from = $('#datefrom').val();
        var date_to = $('#dateto').val();
        var url = $("#_url").val();

        $.ajax({
            url: url + '/get/personal/schedules',type: 'get',dataType: 'json',data: {datefrom: date_from, dateto: date_to},headers: { 'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content') },

            success: function(response) {
                showdata(response);
                function showdata(jsonresponse) {
                    var employee = jsonresponse;
                    var tbody = $('#dataTables-example tbody');
                    
                    // clear data and destroy datatable
                    $('#dataTables-example').DataTable().destroy();
                    tbody.children('tr').remove();


                    // append table row data
                    for (var i = 0; i < employee.length; i++) {
                        // archive status
                        var archive = employee[i].archive;
                        function s_s(archive) {
                            if (archive == '0') {
                                return "Present Schedule";
                            } else if(archive == '1') {
                                return "Past Schedule";
                            }
                        }
                        function ss_color(archive) {
                            if (archive == '0') {
                                return "green";
                            } else if(archive == '1') {
                                return "teal";
                            }
                        }

                        var datefrom = employee[i].datefrom;
                        var dateto = employee[i].dateto;
                        function f_date(format_date)
                        {
                                date = new Date(format_date);
                                year = date.getFullYear();
                                month = date.getMonth();
                                //months = new Array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
                                months = new Array('{{trans("pe_clock.january")}}', '{{trans("pe_clock.february")}}', '{{trans("pe_clock.march")}}', '{{trans("pe_clock.april")}}', '{{trans("pe_clock.may")}}', '{{trans("pe_clock.june")}}', '{{trans("pe_clock.july")}}', '{{trans("pe_clock.agust")}}', '{{trans("pe_clock.september")}}', '{{trans("pe_clock.october")}}', '{{trans("pe_clock.november")}}', '{{trans("pe_clock.december")}}');
                                d = date.getDate();
                                day = date.getDay();
                                //days = new Array('Sunday,', 'Monday,', 'Tuesday,', 'Wednesday,', 'Thursday,', 'Friday,', 'Saturday,');
                                days = new Array('{{trans("pe_clock.sunday")}}', '{{trans("pe_clock.monday")}}', '{{trans("pe_clock.tuesday")}}', '{{trans("pe_clock.wednesday")}}', '{{trans("pe_clock.wednesday")}}', '{{trans("pe_clock.friday")}}', '{{trans("pe_clock.saturday")}}');
                                
                                n_date = days[day]+' '+months[month]+' '+d+', '+year;
                                return n_date; // Friday, May 11, 2018
                        }
                            
                        tbody.append("<tr>"+ 
                                        "<td>"+employee[i].intime+"</td>" + 
                                        "<td>"+employee[i].outime+"</td>" + 
                                        "<td>"+employee[i].hours+" hours </td>" + 
                                        "<td>"+employee[i].restday+"</td>" + 
                                        "<td>"+ f_date(datefrom) +"</td>" + 
                                        "<td>"+ f_date(dateto) +"</td>" + 
                                        "<td>"+ "<span class=' "+ ss_color(archive) +"'>" + s_s(archive) + "</span>" +"</td>" + 
                                    "</tr>");
                    }

                    // initialize datatable
                    $('#dataTables-example').DataTable({responsive: true,pageLength: 15,lengthChange: false,searching: false,});
                }            
            }
        })
    });
    </script>
    @endsection 