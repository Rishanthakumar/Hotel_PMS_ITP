<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Barryvdh\DomPDF\PDF;
use App;
use App\Http\Requests;
use Carbon;
use App\Http\Controllers\Controller;

class pdfController extends Controller
{
    public function printSingleLineInvoice($id){

        $folio_details = DB::table('folio')
            ->select('res_id', DB::raw('sum(credit_total) as credit_sum'), DB::raw('sum(debit_total) as debit_sum'), DB::raw('sum(prog_balance) as prog_sum'))
            ->where('res_id', $id)
            ->groupBy('res_id')
            ->get();

        $cus_id = DB::table('reservation')
            ->select('cus_id')
            ->where('res_id', '=', $id)
            ->first();

        $cus_name = DB::table('customer')
            ->select('name')
            ->where('cus_id', '=', $cus_id->cus_id)
            ->first();

        $date = carbon::now();
        $date = $date->toDateString();

        //generating the pdf
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('test', array('args'=>$folio_details, 'res_id'=>$id, 'cus_name'=>$cus_name->name));
        return $pdf->download('Reservation_No_'.sprintf("%007d", $id)."__".$date.'.pdf');
    }

    public function summaryInvoice($id){

        $folio_details = DB::table('folio')
            ->select('folio_num', 'credit_total', 'debit_total', 'prog_balance', 'type', 'room_id')
            ->where('res_id','=', $id)
            ->get();

        $cus_id = DB::table('reservation')
            ->select('cus_id')
            ->where('res_id', '=', $id)
            ->first();

        $cus_name = DB::table('customer')
            ->select('name')
            ->where('cus_id', '=', $cus_id->cus_id)
            ->first();

        $date = carbon::now();
        $date = $date->toDateString();

        //generating the pdf
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('test2', array('args'=>$folio_details, 'res_id'=>$id, 'cus_name'=>$cus_name->name));
        return $pdf->download('Reservation_No_'.sprintf("%007d", $id)."__".$date.'.pdf');
    }

    public function detailedInvoice($id){

        $folio_services = DB::table('folio_services')
            ->join('services', 'services.service_id', '=', 'folio_services.service_id')
            ->select('folio_services.folio_num as folio_num', 'folio_services.date as date', 'folio_services.price as price', 'services.service_name as service_name', 'folio_services.service_count as count')
            ->where('folio_num', '=', $id)
            ->orderBy('folio_services.date', 'asc')
            ->get();

        $cus_id = DB::table('reservation')
            ->select('cus_id')
            ->where('res_id', '=', $id)
            ->first();

        $cus_name = DB::table('customer')
            ->select('name')
            ->where('cus_id', '=', $cus_id->cus_id)
            ->first();

        $date = carbon::now();
        $date = $date->toDateString();

        //generating the pdf
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('test3', array('args'=>$folio_services, 'res_id'=>$id, 'cus_name'=>$cus_name->name));
        return $pdf->download('Reservation_No_'.sprintf("%007d", $id)."__".$date.'.pdf');
    }

#####################################################################################################################################
    public function print_tommorrow_arr()
    {

        $tomorrow = Carbon::tomorrow();
        $reser = DB::table('reservation')
            ->join('customer', 'customer.cus_id', '=', 'reservation.cus_id')
            ->whereIn('reservation.status', ['tendative', 'confirmed'])
            ->where('reservation.check_in', '=', $tomorrow)->get();


        $res_ids = DB::table('reservation')
            ->whereIn('reservation.status', ['tendative', 'confirmed'])
            ->where('check_in', '=', $tomorrow)
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


        //generating the pdf
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('Front_Office.arrival', ['reser' => $reser, 'array2' => $array2, 'date' => $tomorrow->toDateString()]);
        return $pdf->download("'arrival".$tomorrow .".pdf'");
    }


    public function print_tommorrow_dep()
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
            $pdf = App::make('dompdf.wrapper');
            $pdf->loadView('Front_Office.departure', ['reser' => $reser, 'array2' => $array2, 'date' => $tomorrow->toDateString()]);
            return $pdf->download("'departure".$tomorrow .".pdf'");


        }catch (Exception $e) {
            return redirect('/FO_mainpage')
                ->with(['exception' => 'You have errors in your last request please reload the page']);
        }


    }

    function pdf_generate_inh(){

        try {

            $today = Carbon::today();

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

            $pdf = App::make('dompdf.wrapper');
            $pdf->loadView('Front_Office.inhouse', ['reser' => $reser, 'array2' => $array2, 'date' => $today->toDateString()]);
            return $pdf->download("'inhouse".$today .".pdf'");

        }catch (Exception $e) {
            return redirect('/FO_mainpage')
                ->with(['exception' => 'You have errors in your last request please reload the page']);
        }


    }
}
