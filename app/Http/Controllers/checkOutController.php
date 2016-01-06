<?php

namespace App\Http\Controllers;

use App\folio;
use App\Http\Requests\finalizeCheckOutRequest;
use App\invoice;
use Illuminate\Support\Facades\Request;
/*use Illuminate\Http\Request;*/

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Redirect;

class checkOutController extends Controller
{
    public  function checkOut(){

        //get checked_in reservations
        $res_details = DB::table('reservation')
            ->select('res_id')
            ->where('status', '=', 'Checked_In')
            ->get();

        //res_details is a stdObject or array arrays. getting the needed part only.
        if(empty($res_details)){
            $array[]=0;
        }
        else{
            foreach ($res_details as $temp){
                $array[]=$temp->res_id;
            }
        }

        //getting the matching folios, grouping them by res_id and getting the debit & prog_balance total
        $folio_details = DB::table('folio')
            ->select('res_id', DB::raw('sum(credit_total) as credit_sum'), DB::raw('sum(debit_total) as debit_sum'), DB::raw('sum(prog_balance) as prog_sum'))
            ->whereIn('res_id', $array)
            ->where('type', '=', 'FIT')
            ->groupBy('res_id')
            ->get();

        return view('Cashiering/checkOut', compact('folio_details'));
    }

    public  function TRAcheckOut(){

        //get checked_in reservations
        $res_details = DB::table('reservation')
            ->select('res_id')
            ->where('status', '=', 'Checked_In')
            ->get();

        //res_details is a stdObject or array arrays. getting the needed part only.
        if(empty($res_details)){
            $array[]=0;
        }
        else{
            foreach ($res_details as $temp){
                $array[]=$temp->res_id;
            }
        }

        //getting the matching folios, grouping them by res_id and getting the debit & prog_balance total
        $folio_details = DB::table('folio')
            ->select('res_id', DB::raw('sum(credit_total) as credit_sum'), DB::raw('sum(debit_total) as debit_sum'), DB::raw('sum(prog_balance) as prog_sum'))
            ->whereIn('res_id', $array)
            ->where('type', '=', 'TRA')
            ->groupBy('res_id')
            ->get();

        return view('Cashiering/TRA_CheckOut', compact('folio_details'));
    }

    public  function CMPcheckOut(){

        //get checked_in reservations
        $res_details = DB::table('reservation')
            ->select('res_id')
            ->where('status', '=', 'Checked_In')
            ->get();

        //res_details is a stdObject or array arrays. getting the needed part only.
        if(empty($res_details)){
            $array[]=0;
        }
        else{
            foreach ($res_details as $temp){
                $array[]=$temp->res_id;
            }
        }

        //getting the matching folios, grouping them by res_id and getting the debit & prog_balance total
        $folio_details = DB::table('folio')
            ->select('res_id', DB::raw('sum(credit_total) as credit_sum'), DB::raw('sum(debit_total) as debit_sum'), DB::raw('sum(prog_balance) as prog_sum'))
            ->whereIn('res_id', $array)
            ->where('type', '=', 'CMP')
            ->groupBy('res_id')
            ->get();

        return view('Cashiering/CMP_CheckOut', compact('folio_details'));
    }

    public function regCheckout($id){

        //getting reservation ID from folio table
        /*$res_id = DB::table('folio')
            ->select('res_id')
            ->where('folio_num', '=', $id)
            ->first();*/

        //getting the reservation details of above res_id
        $res_details = DB::table('reservation')
            ->select('check_in', 'check_out', 'adults', 'children', 'no_of_rooms')
            ->where('res_id', '=', $id)
            ->first();

        //get corresponding folio numbers for each reservation
        $folio = DB::table('folio')
            ->select('folio_num', 'credit_total', 'debit_total', 'prog_balance', 'type', 'room_id')
            ->where('res_id','=', $id)
            ->get();

        /*//get guest payable services. This is an stdObject
        $services = DB::table('services')
            ->select('service_id')
            ->where('guest_payable', '=', 'yes')
            ->get();

        //convert the result from above query to an array to match whereIN function's parameter requirements
        foreach($services as $value){
            $array[] = $value->service_id;
        }

        //query to retrieve the guest payable services for a given folio_num
        $invoice[] = DB::table('folio_services')
            ->join('services', 'services.service_id', '=', 'folio_services.service_id')
            ->select('folio_services.folio_num as folio_num', 'folio_services.date as date', 'folio_services.service_count as count','services.service_name as service')
            ->where('folio_services.folio_num', '=',$fn)
            ->whereIN('services.service_id', $array)
            ->orderBy('folio_services.date', 'asc')
            ->get();

        $payments[] = DB::table('folio')
            ->select('credit_total', 'debit_total', 'prog_balance')
            ->where('folio_num', '=', $fn)
            ->get();*/

        //return view('regCheckOut', compact('invoice', 'id', 'payments', 'res_details'));
        return view('Cashiering/regCheckOut', compact('id','folio', 'res_details'));
    }

    public function detailed_checkOut($id){

        $folio_services = DB::table('folio_services')
            ->join('services', 'services.service_id', '=', 'folio_services.service_id')
            ->select('folio_services.folio_num as folio_num', 'folio_services.date as date', 'folio_services.price as price', 'services.service_name as service_name', 'folio_services.service_count as count')
            ->where('folio_num', '=', $id)
            ->orderBy('folio_services.date', 'asc')
            ->get();

        $res_details = DB::table('reservation')
            ->select('check_in', 'check_out', 'adults', 'children', 'no_of_rooms')
            ->where('res_id', '=', $id)
            ->first();

        $payments = DB::table('folio')
            ->select('folio_num', 'credit_total', 'debit_total', 'prog_balance', 'type', 'room_id')
            ->where('folio_num', '=', $id)
            ->first();

        //return $folio_services;
        return view('Cashiering/detailedCheckOut', compact('folio_services', 'res_details', 'id', 'payments'));
    }


    /*public function finalizePayment(finalizeCheckOutRequest $request){

        $input = $request->all();

        invoice::create(
            [
                'total_payment' => $input['amount'],
                'pay_method' => $input['method'],
                'folio_num' => $input['folio_num']
            ]
        );

        $res_id = DB::table('folio')
            ->select('res_id')
            ->where('folio_num', '=', $input['folio_num'])
            ->first();

        DB::table('reservation')
            ->where('res_id', '=', $res_id->res_id)
            ->update(['status' => "Checked_Out"]);

        DB::table('folio')
            ->where('folio_num', '=', $input['folio_num'])
            ->update(['guest_status' => "Checked_Out"]);


        return redirect('/checkOut');
    }*/

    public function finalizeCheckOut($id){

        /*$input = Request::all();

        invoice::create(
            [
                'total_payment' => $input['amount'],
                'pay_method' => $input['method'],
                'folio_num' => $input['folio_num']
            ]
        );*/

        /*$res_id = DB::table('folio')
            ->select('res_id')
            ->where('folio_num', '=', $input['folio_num'])
            ->first();*/

        $room_id =  DB::table('room_reservation_rate')
            ->where('res_id', '=', $id)
            ->select('room_id')
            ->get();

        foreach($room_id as $room)
        {

            DB::table('room')
                ->where('room_id', '=', $room->room_id)
                ->update(['fo_status' => "vacant"]);


        }


        DB::table('reservation')
            ->where('res_id', '=', $id)
            ->update(['status' => "Checked_Out"]);

        DB::table('folio')
            ->where('res_id', '=', $id)
            ->update(['guest_status' => "Checked_Out"]);

        return redirect('/checkOut');
    }
}
