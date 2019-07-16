<?php
/*
* Smart Timesheet: Time and Attendance Management System
* Email: official.smarttimesheet@gmail.com
* Version: 1.0
* Author: Brian Luna
* Copyright 2018 Brian Luna
* Website: https://github.com/brianluna/smarttimesheet
*/
namespace App\Http\Controllers;
use DB;
use Carbon\Carbon;
use App\Classes\table;
use App\Classes\permission;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClockController extends Controller
{
    
    public function clock()
    {
        $clock_comment = table::settings()->value('clock_comment');

        return view('clock', compact('clock_comment'));
    }

    public function add(Request $request)
    {
       

        
        if ($request->email == NULL || $request->pass == NULL ) {
            return response()->json([
                "error" => trans('pe_clock.email_pass_error')
            ]);
        }

        if ($request->idno == NULL || $request->type == NULL ) {
            return response()->json([
                "error" => trans('pe_clock.provide_error')
            ]);
        }
         
        $idno = strtoupper($request->idno);
        $type = $request->type;
        $date = date('Y-m-d');
        $time = date('h:i:s A');
        $comment = strtoupper($request->clock_comment);
        $ip = $request->ip();

        // clock-in comment feature
        $clock_comment = table::settings()->value('clock_comment');
        if ($clock_comment == 1) {
            if ($request->clock_comment == NULL ) {
                return response()->json([
                    "error" => trans('pe_clcok.commit_error')
                ]);
            }
        }

        // ip resriction
        $iprestriction = table::settings()->value('iprestriction');
        if ($iprestriction != NULL) {
            $ips = explode(",", $iprestriction);
            if(in_array($ip, $ips) == false) {
                $msge = trans('pe_clock.not_allow_ip').$ip;
                return response()->json([
                    "error" => $msge,
                ]);
            }
        } 

        $employee_id = table::companydata()->where('idno', $idno)->value('reference');
        $emp = table::people()->where('id', $employee_id)->first();
        //updated by ksg
        if(!empty($emp)) $lastname = $emp->lastname;
        if(!empty($emp)) $firstname = $emp->firstname;
        if(!empty($emp)) $mi = $emp->mi;
        if(!empty($emp)) $gender = $emp->gender;
        if(!empty($emp)) $civilstatus = $emp->civilstatus;
        if(!empty($emp)) $employee = mb_strtoupper($lastname.', '.$firstname.' '.$mi);

        if ($type == trans('pe_clock.intime')) {
            $has = table::attendance()->where([['idno', $idno],['date', $date]])->exists();

            if ($has == 1) {
                $hti = table::attendance()->where([['idno', $idno],['date', $date]])->value('timein');
                $hti = date('h:i A', strtotime($hti));
                return response()->json([
                    "employee" => $employee,
                    "gender" => $gender,
                    "civilstatus" => $civilstatus,
                    "error" => trans('pe_clock.time_in_error').$hti,
                ]);

            } else {
                $last_in_notimeout = table::attendance()->where([['idno', $idno],['timeout', NULL]])->count();

                if($last_in_notimeout >= 1)
                {
                    return response()->json([
                        "error" => trans('pe_clock.clock_out_error')
                    ]);

                } else {

                    $sched_in_time = table::schedules()->where([['idno', $idno], ['archive', 0]])->value('intime');
                    if($sched_in_time == NULL){
                        $status_in = "Ok";
                    } else {
                        $sched_clock_in_time_24h = date("H.i", strtotime($sched_in_time));
                        $time_in_24h = date("H.i", strtotime($time));
                        if ($time_in_24h <= $sched_clock_in_time_24h) {
                            $status_in = 'In Time';
                        } else {
                            $status_in = 'Late Arrival';
                        }
                    }

                    if($clock_comment == 1 && $comment != NULL) {
                        table::attendance()->insert([
                            [
                                'idno' => $idno,
                                'reference' => $employee_id,
                                'date' => $date,
                                'employee' => $employee,
                                'timein' => $date." ".$time,
                                'status_timein' => $status_in,
                                'comment' => $comment,
                            ],
                        ]);
                    } else {
                        table::attendance()->insert([
                            [
                                'idno' => $idno,
                                'reference' => $employee_id,
                                'date' => $date,
                                'employee' => $employee,
                                'timein' => $date." ".$time,
                                'status_timein' => $status_in,
                            ],
                        ]);
                    }

                    return response()->json([
                        "type" => $type,
                        "time" => $time,
                        "date" => $date,
                        "lastname" => $lastname,
                        "firstname" => $firstname,
                        "mi" => $mi,
                        "gender" => $gender,
                        "civilstatus" => $civilstatus,
                        'totalhours' => NULL,
                    ]);
                }
            }
        }
  
        if ($type == trans('pe_clock.outtime')) {
            $timeIN = table::attendance()->where([['idno', $idno], ['timeout', NULL]])->value('timein');
            $clockInDate = table::attendance()->where([['idno', $idno],['timeout', NULL]])->value('date');

            $hasout = table::attendance()->where([['idno', $idno],['date', $date]])->value('timeout');

            $timeOUT = date("Y-m-d h:i:s A", strtotime($date." ".$time));

            if($timeIN == NULL) {
                return response()->json([
                    "error" => trans('pe_clock.clock_bfore_error')
                ]);
            } 

            if ($hasout != NULL) {
                $hto = table::attendance()->where([['idno', $idno],['date', $date]])->value('timeout');
                $hto = date('h:i A', strtotime($hto));
                return response()->json([
                    "employee" => $employee,
                    "gender" => $gender,
                    "civilstatus" => $civilstatus,
                    "error" => trans('pe_clock.already_time').$hto,
                ]);

            } else {

                $sched_out_time = table::schedules()->where([['idno', $idno], ['archive', 0]])->value('outime');
                if($sched_out_time == NULL) {
                    $status_out = "Ok";
                } else {
                    $sched_clock_out_time_24h = date("H.i", strtotime($sched_out_time));
                    $time_out_24h = date("H.i", strtotime($timeOUT));
                    if($time_out_24h >= $sched_clock_out_time_24h) {
                        $status_out = trans('pe_clock.on_time');
                    } else {
                        $status_out = trans('pe_clock.early_departure');
                    }
                }

                $time1 = Carbon::createFromFormat("Y-m-d h:i:s A", $timeIN); 
                $time2 = Carbon::createFromFormat("Y-m-d h:i:s A", $timeOUT); 
                $th = $time1->diffInHours($time2);
                $tm = floor(($time1->diffInMinutes($time2) - (60 * $th)));
                $totalhour = $th.".".$tm;

                table::attendance()->where([['idno', $idno],['date', $clockInDate]])->update(array(
                    'timeout' => $timeOUT,
                    'totalhours' => $totalhour,
                    'status_timeout' => $status_out)
                );
                
                return response()->json([
                    "type" => $type,
                    "time" => $time,
                    "date" => $date,
                    "lastname" => $lastname,
                    "firstname" => $firstname,
                    "mi" => $mi,
                    "gender" => $gender,
                    "civilstatus" => $civilstatus
                ]);
            }
        }
    }
}
