<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\reservation;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Log;
use Session;
use Input;

class FrontOfficeController extends Controller
{


   /* view main page */
    function mainpage()
    {
       /* Session::forget('reserve');
        Session::forget('individual_name');
        Session::forget('travel_agent_name');
        Session::forget('company_name');*/

        try {
            $value1 = "";
            $value2 = "";
            if (session('succ_status')) {
                $value1 = session()->pull('succ_status', 'default');

            }

            if (session('exception')) {
                $value2 = session()->pull('exception', 'default');
            }
            Session::flush();
            if ($value1 != 'default') {
                Session::put(['succ_status' => $value1]);

            }

            if ($value2 != 'default') {
                Session::put(['exception' => $value2]);

            }


            return view('Front_Office.FOmainpage');
        }catch (Exception $e) {
            return redirect('/FO_mainpage')
                ->with(['exception' => 'You have errors in your last request.Try again!']);
        }
    }



    /*view the reservation registration final form*/
    function registerind()
    {

        try {
            

//in order enable some buttons in the profil management
            Session::put(['reserve' => 'has']);
            return view('Front_Office.FOregisterFinalForm');
        }catch (Exception $e) {
            return redirect('/FO_mainpage')
                ->with(['exception' => 'You have errors in your last request.Try again!']);
        }

    }

 /*   view the check room available page*/
    function ratedetail()
    {
        try {
            $superior = DB::table('rate')
                ->join('normal_rate', 'rate.rate_code', '=', 'normal_rate.rate_code')
                ->where('room_type', '=', 1)
                ->select('rate.*')
                ->get();

            $deluxe = DB::table('rate')
                ->join('normal_rate', 'rate.rate_code', '=', 'normal_rate.rate_code')
                ->where('room_type', '=', 2)
                ->select('rate.*')
                ->get();

            $luxury = DB::table('rate')
                ->join('normal_rate', 'rate.rate_code', '=', 'normal_rate.rate_code')
                ->where('room_type', '=', 3)
                ->select('rate.*')
                ->get();

            $superiortype = DB::table('room_type')
                ->where('type_id', '=', 1)
                ->get();

            $travel_agent_rate = DB::table('travel_agent')
                ->join('customer', 'customer.cus_id', '=', 'travel_agent.cus_id')
                ->select('customer.cus_id','customer.name','travel_agent.rate_percentage')
                ->get();
//changed
            return view('Front_Office.FOratequerydet', ['superior' => $superior, 'deluxe' => $deluxe, 'luxury' => $luxury,
                'superiortype' => $superiortype,'travel_agent_rate'=>$travel_agent_rate]);
        }
        catch(Exception $e)
        {
            return redirect('/mainpage')
                ->with(['exception'=>'You have errors in your last request please reload the page']);
        }
    }


    /*only view the rate query details*/

    function ratedetailonly(){

        try {
            $superior = DB::table('rate')
                ->join('normal_rate', 'rate.rate_code', '=', 'normal_rate.rate_code')
                ->where('room_type', '=', 1)
                ->select('rate.*')
                ->get();

            $deluxe = DB::table('rate')
                ->join('normal_rate', 'rate.rate_code', '=', 'normal_rate.rate_code')
                ->where('room_type', '=', 2)
                ->select('rate.*')
                ->get();

            $luxury = DB::table('rate')
                ->join('normal_rate', 'rate.rate_code', '=', 'normal_rate.rate_code')
                ->where('room_type', '=', 3)
                ->select('rate.*')
                ->get();

            $superiortype = DB::table('room_type')
                ->where('type_id', '=', 1)
                ->get();


//changed
            return view('Front_Office.FOratequerydetailonly', ['superior' => $superior, 'deluxe' => $deluxe, 'luxury' => $luxury,
                'superiortype' => $superiortype]);
        }
        catch(Exception $e)
        {
            return redirect('/mainpage')
                ->with(['exception'=>'You have errors in your last request please reload the page']);
        }
    }
################################################################################################################################

    /*view the check in page*/
    function checkin(){

        try {
            $date = Carbon::now();

            $reser = DB::table('reservation')
                ->join('customer', 'customer.cus_id', '=', 'reservation.cus_id')
                ->where('reservation.status', '=', 'tendative')
                ->where('reservation.check_in', '=', $date->toDateString())->get();

            return view('Front_Office.FOcheckIn',compact('reser'));

        }catch (Exception $e) {

            return redirect('/FO_mainpage')
                ->with(['exception' => 'You have errors in your last request please reload the page']);
        }


    }
###################################################################################################################################

    /*view block room page*/
    function block_rooms(){



        $res_id = Input::get('res_id');


        if($res_id != null) {
            Session::put('res_id', $res_id);
        }

        $reser = DB::table('reservation_room_type_count')
            ->join('room_type','room_type.type_id', '=', 'reservation_room_type_count.type_id')
            ->where('res_id','=',session('res_id'))
            ->get();

        $room_maintenance = DB::table('room')
            ->join('room_maintenance', 'room.room_id', '=', 'room_maintenance.room_id')
            ->get();



        foreach($room_maintenance as $room) {
            Session::put([$room->room_id . 'clean_status' => $room->room_status, $room->room_id . 'occupancy' => $room->fo_status]);

        }

        return view('Front_Office.FO_room_block',["room_maintenance"=>$room_maintenance,"reser"=>$reser,"res_id"=>session('res_id')]);
    }

####################################################################################################################################

    /*view wailist page*/
    function waitlist()
    {

        try {
            $date = Carbon::now();
            $reser = DB::table('reservation')
                ->join('customer', 'reservation.cus_id', '=', 'customer.cus_id')
                ->where('check_out', '>', $date->toDateString())
                ->where('check_in','>',$date->toDateString()) //changed _now
                ->where('status','=','waitlisted')->get(); ////changed now

            //  $reser = reservation::where('check_out', '>', $date)->get();
            //$reser = reservation::all()->where('res_id','<','$date');


            return view('Front_Office.FOwaitlist_listed', compact('reser'));
        }catch (Exception $e) {
            return redirect('/FO_mainpage')
                ->with(['exception' => 'You have errors in your last request please reload the page']);
        }


    }

#####################################################################################################################################
    /*view the waitlist form*/
    function waitlistform()
    {
        Session::put(['waitlist'=>'has']);
        return view('Front_Office.FOWaitlistForm');
    }


    /*view update reservation page*/
    function updatereservation()
    {
        try {
            $date = Carbon::now();
            $reser = DB::table('reservation')
                ->join('customer', 'reservation.cus_id', '=', 'customer.cus_id')
                ->where('check_out', '>', $date->toDateString())
                ->whereIn('status',['tentative','confirmed','Checked-In'])->get();
               /* ->where('check_in','>',$date) //changed _now*/
               /*  ->where('status','!=','cancelled')->get();*///***********************************************


            return view('Front_Office.FOupdatereservation', compact('reser'));
        }catch (Exception $e) {
            return redirect('/FO_mainpage')
                ->with(['exception' => 'You have errors in your last request please reload the page']);
        }
    }

###################################################################################################################################
    /*view confirmation page*/
    function confirmations()
    {
        try {
            $date = Carbon::now();
            $reser = DB::table('reservation')
                ->join('customer', 'customer.cus_id', '=', 'reservation.cus_id')
                ->where('reservation.status', '=', 'tentative')
                ->where('reservation.check_in', '>', $date->toDateString())
                ->select('res_id', 'date', 'name', 'check_in', 'check_out', 'email')->get();


            return view('Front_Office.FOconfirmations', compact('reser'));

        }catch (Exception $e) {
            return redirect('/FO_mainpage')
                ->with(['exception' => 'You have errors in your last request please reload the page']);
        }
    }


    /*view reports */
    function report_turnaway(){


        return view('Front_Office.FOreports_turnaways');
    }

    function report_reservations(){

        return view('Front_Office.FOreports_reservations');
    }


    function temp_check_out()
    {
        try {
            $date = Carbon::now();

            $date_can = Carbon::now()->addDays(1); ;
            $reser = DB::table('reservation')
                ->join('customer', 'reservation.cus_id', '=', 'customer.cus_id')
                ->where('check_out', '>', $date_can->toDateString())
                ->where('status','=','Checked_In')->get();



            return view('Front_Office.FOtemp_Check_Out', compact('reser'));
        }catch (Exception $e) {
            return redirect('/FO_mainpage')
                ->with(['exception' => 'You have errors in your last request please reload the page']);
        }

    }

    function temp_check_in(){

        try {
            $date = Carbon::now();

            $date_can = Carbon::now()->addDays(1); ;
            $reser = DB::table('temporary_check_out')
                ->join('reservation', 'reservation.res_id', '=', 'temporary_check_out.res_id')
                ->join('customer', 'reservation.cus_id', '=', 'customer.cus_id')
                ->where('temp_check_in','=',$date->toDateString())
                ->where('temporary_check_out.status','=','check_out')
                ->get();


            return view('Front_Office.FOtemp_Check_In', compact('reser'));
        }catch (Exception $e) {
            return redirect('/FO_mainpage')
                ->with(['exception' => 'You have errors in your last request please reload the page']);
        }
    }

    function tomorrow_arrival(){

        try {

            $tomorrow = Carbon::tomorrow();
            $reser = DB::table('reservation')
                ->join('customer', 'customer.cus_id', '=', 'reservation.cus_id')
                ->whereIn('reservation.status', ['tentative', 'confirmed'])
                ->where('reservation.check_in', '=', $tomorrow->toDateString())->get();


            $res_ids = DB::table('reservation')
                ->whereIn('reservation.status', ['tentative', 'confirmed'])
                ->where('check_in', '=', $tomorrow->toDateString())
                ->select('res_id')
                ->get();

            $room_types = "";
            $array1 = array();
            $array2 = array();

            foreach ($res_ids as $res_id) {

                $room_type1 = DB::table('reservation_room_type_count')
                    ->join('room_type', 'room_type.type_id', '=', 'reservation_room_type_count.type_id')
                    ->where('reservation_room_type_count.res_id', '=', $res_id->res_id)
                    ->get();


                $room_types = "";
                $room_count = "";
                foreach ($room_type1 as $room) {
                    $room_types = $room_types . "<br>" . $room->type_name . " ";
                    $room_count = $room_count . "<br>" . $room->count . " ";
                }


                $array2 = array_add($array2, $res_id->res_id, array('room_types' => trim($room_types, "<br>"), 'room_count' => trim($room_count, "<br>")));

            }


            return view('Front_Office.FOreports_tomorrow_arrival', ['reser' => $reser, 'array2' => $array2]);

        }catch (Exception $e) {
            return redirect('/FO_mainpage')
                ->with(['exception' => 'You have errors in your last request please reload the page']);
        }
    }


    function tomorrow_departure()
    {


        try {

            $tomorrow = Carbon::tomorrow();

            $reser = DB::table('reservation')
                ->join('customer', 'customer.cus_id', '=', 'reservation.cus_id')
                ->where('reservation.status', '=', 'Checked_In')
                ->where('reservation.check_out', '=', $tomorrow)->get();


            $res_ids = DB::table('reservation')
                ->where('reservation.status', '=', 'Checked_In')
                ->where('check_out', '=', $tomorrow)
                ->select('res_id')
                ->get();

            $room_types = "";
            $array1 = array();
            $array2 = array();

            foreach ($res_ids as $res_id) {

                $room_type1 = DB::table('reservation_room_type_count')
                    ->join('room_type', 'room_type.type_id', '=', 'reservation_room_type_count.type_id')
                    ->where('reservation_room_type_count.res_id', '=', $res_id->res_id)
                    ->get();


                $room_types = "";
                $room_count = "";
                foreach ($room_type1 as $room) {
                    $room_types = $room_types . "<br>" . $room->type_name . " ";
                    $room_count = $room_count . "<br>" . $room->count . " ";
                }


                $array2 = array_add($array2, $res_id->res_id, array('room_types' => trim($room_types, "<br>"), 'room_count' => trim($room_count, "<br>")));

            }


            return view('Front_Office.FOreports_tomorrow_departure', ['reser' => $reser, 'array2' => $array2]);
        }catch (Exception $e) {
            return redirect('/FO_mainpage')
                ->with(['exception' => 'You have errors in your last request please reload the page']);
        }


    }

    function in_house_guests(){

        try {

            $tomorrow = Carbon::tomorrow();

            $reser = DB::table('reservation')
                ->join('customer', 'customer.cus_id', '=', 'reservation.cus_id')
                ->where('reservation.status', '=', 'Checked_In')
                ->get();


            $res_ids = DB::table('reservation')
                ->where('reservation.status', '=', 'Checked_In')
                ->select('res_id')
                ->get();

            $room_types = "";
            $array1 = array();
            $array2 = array();

            foreach ($res_ids as $res_id) {

                $room_ids1 = DB::table('room_reservation_rate')
                    ->where('res_id', '=', $res_id->res_id)
                    ->get();


                $room_ids = "";
                $room_count = "";
                foreach ($room_ids1 as $room) {
                    $room_ids = $room_ids . "<br>" . $room->room_id . " ";

                }


                $array2 = array_add($array2, $res_id->res_id, array('room_ids' => trim($room_ids, "<br>")));

            }


            return view('Front_Office.FOreports_inhouse', ['reser' => $reser, 'array2' => $array2]);
        }catch (Exception $e) {
            return redirect('/FO_mainpage')
                ->with(['exception' => 'You have errors in your last request please reload the page']);
        }


    }




}
