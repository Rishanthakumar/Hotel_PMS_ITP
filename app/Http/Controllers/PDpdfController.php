<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Barryvdh\DomPDF\PDF;
use App;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PDpdfController extends Controller
{
    public function printInvoice($id){

        $res_details = DB::table('vehicle_reservation')
            ->select('vr_id','res_id','guest_name','service_date','service_time','vehicle_no','driver_id','package','package_price')
            /*->where('status', '=', 'pending')*/
            ->where('vr_id', '=', $id)
            ->first();

        $payment_details = DB::table('pending_pd_payment')
            ->select('pp_id','additional_charge','total_amount')
            ->where('vr_id', '=', $id)
            ->first();

        //generating the pdf
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('Pick-up_&_Drop-off_System_Views.P & D-Receptionist.P&D Bill', array('args'=>$res_details, 'payment'=>$payment_details));

        return $pdf->download('invoice.pdf');
    }
}
