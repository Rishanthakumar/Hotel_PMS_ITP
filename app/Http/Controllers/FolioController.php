<?php

namespace App\Http\Controllers;

use App\folio;
use App\folio_services;
use App\folio_update;
use App\reservation;    //change this corresponding Rishanthan's model
use App\services;
//use Illuminate\Http\Request;

use App\Http\Requests\AddServiceRequest;
use App\Http\Requests\BatchPostRequest;
use App\Http\Requests\printFolioRequest;
use App\Http\Requests\addDebitRequest;

use Carbon\Carbon;
use DB; //to use table method for 'select' queries
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Request; //using instead of Illuminate\Http\Request

class FolioController extends Controller
{
    public function mainPage(){
        return view('Payment Handling Panel.Panel');
    }

    public function FIT_payments(){

        //$folios = folio::all();
        /*$folios = folio::where('type', '=', 'FIT')->get();*/
        $folios = DB::table('folio')->where('type', '=', 'FIT')->where('guest_status', '=', 'Checked_In')->get();
        $services = DB::table('services')->select('service_id')->get();
        $exception_msg = 0;

        //return $folios;
        //return view("FolioManagement", compact('folios', 'services', 'exception_msg'));
        return view("Cashiering/FIT_Folio", compact('folios', 'services', 'exception_msg'));
    }

    public function TA_payments(){

        //$folios = folio::all();
        /*$folios = folio::where('type', '=', 'TA')->get();   //make TA as TRA*/
        $folios = DB::table('folio')->where('type', '=', 'TRA')->where('guest_status', '=', 'Checked_In')->get();
        $services = DB::table('services')->select('service_id')->get();
        $exception_msg = 0;

        return view("Cashiering/TravelAgent_Folio", compact('folios', 'services', 'exception_msg'));
    }

    public function company_payments(){

        //$folios = folio::all();
        /*$folios = folio::where('type', '=', 'CMP')->get();*/
        $folios = DB::table('folio')->where('type', '=', 'CMP')->where('guest_status', '=', 'Checked_In')->get();
        $services = DB::table('services')->select('service_id')->get();
        $exception_msg = 0;

        return view("Cashiering/Company_Folio", compact('folios', 'services', 'exception_msg'));
    }


    public function defaultCharges($id){

        $folio_num = $id;
        $service_qty = 1;
        $res_details = DB::table('folio')->select('res_id', 'room_id')->where('folio_num', '=', $folio_num)->first();
        $default_services = DB::table('reservation_services')->select('service_id')
            ->where('res_id', '=', $res_details->res_id)
            ->where('room_id', '=', $res_details->room_id)
            ->get();

        foreach($default_services as $services){

            $baseCost = DB::table('services')->select('base_cost')->where('service_id', '=', $services->service_id)->first();

            //getting the tax percentages
            $tax_code = DB::table('services')->select('tax_code')->where('service_id', '=', $services->service_id)->first();
            $tax_rate = DB::table('tax_rates')->select('percentage')->where('tax_code', '=', $tax_code->tax_code)->first();

            //getting the customer_payable status of the selected service IMPLEMENT THIS IN CHECK OUT!!!
            /*$payStatus = DB::table('services')->select('guest_payable')->where('service_id', '=', $input['service_id'])->first();*/

            //creating a model and saving to folio_services table
            try {
                folio_services::create(
                    [
                        'service_id' => $services->service_id,
                        'folio_num' => $folio_num,
                        'date' => Carbon::now(),
                        'price' => (($baseCost->base_cost + ($baseCost->base_cost* $tax_rate->percentage)) * floatval($service_qty)),   //gets the total price spent on the service.
                        'service_count' => $service_qty
                    ]
                );

                //updating the folio table
                $credit_balance = (DB::table('folio')->select('credit_total')->where('folio_num', '=', $folio_num)->first());
                $total_balance = (DB::table('folio')->select('prog_balance')->where('folio_num', '=', $folio_num)->first());

                $credit_balance->credit_total = $credit_balance->credit_total + (($baseCost->base_cost + ($baseCost->base_cost* $tax_rate->percentage)) * floatval($service_qty));
                $total_balance->prog_balance = $total_balance->prog_balance + ((($baseCost->base_cost + ($baseCost->base_cost* $tax_rate->percentage)) * floatval($service_qty))*1.11); //1.11=vat inclusive value

                DB::table('folio')->where('folio_num', $folio_num)->update(['credit_total' => $credit_balance->credit_total, 'prog_balance' => $total_balance->prog_balance]);
            }

            catch(QueryException $e){

                $folios = folio::all();
                $services = DB::table('services')->select('service_id')->get();
                $exception_msg = 1;
                return view("Cashiering/FolioManagement", compact('folios', 'services', 'exception_msg'));
            }

            //redirect the user to the corresponding folio to view the new record.
        }

        return redirect('/payments/view/'.$folio_num); //'.' to concatenate
        //return $default_services;
    }


    public function addDebit(addDebitRequest $request){

        $input = $request->all();

        $prog_balance = DB::table('folio')
            ->select('prog_balance')
            ->where('folio_num', '=', $input['folio_num'])
            ->first();

        //update debit field
        DB::table('folio')
            ->where('folio_num', '=', $input['folio_num'])
            ->update(['debit_total' => $input['amount']]);

        //update prog_balance field
        DB::table('folio')
            ->where('folio_num', '=', $input['folio_num'])
            ->update(['prog_balance' => ($prog_balance->prog_balance - $input['amount'])]);

        return redirect('/payments/view/'.$input['folio_num']); //'.' to concatenate
    }

    public function addResCharges(addDebitRequest $request){

        $input = $request->all();

        try {
            folio_services::create(
                [
                    'service_id' => "RESBILL",
                    'folio_num' => $input['folio_num'],
                    'date' => Carbon::now(),
                    'price' => $input['amount'],
                    'service_count' => "1"
                ]
            );

            //updating the folio table
            $credit_balance = (DB::table('folio')
                ->select('credit_total')
                ->where('folio_num', '=', $input['folio_num'])
                ->first());

            $total_balance = (DB::table('folio')
                ->select('prog_balance')
                ->where('folio_num', '=', $input['folio_num'])
                ->first());

            $credit_balance->credit_total = $credit_balance->credit_total + $input['amount'];
            $total_balance->prog_balance = $total_balance->prog_balance + $input['amount'];

            DB::table('folio')
                ->where('folio_num', $input['folio_num'])
                ->update(['credit_total' => $credit_balance->credit_total, 'prog_balance' => $total_balance->prog_balance]);
        }

        catch(QueryException $e){

            $folios = folio::all();
            $services = DB::table('services')->select('service_id')->get();
            $exception_msg = 1;
            return view("Cashiering/FolioManagement", compact('folios', 'services', 'exception_msg'));
        }

        //redirect the user to the corresponding folio to view the new record.
        return redirect('/payments/view/'.$input['folio_num']); //'.' to concatenate
    }

    public function addBarCharges(addDebitRequest $request){

        $input = $request->all();

        try {
            folio_services::create(
                [
                    'service_id' => "BARBIL",
                    'folio_num' => $input['folio_num'],
                    'date' => Carbon::now(),
                    'price' => $input['amount'],
                    'service_count' => "1"
                ]
            );

            //updating the folio table
            $credit_balance = (DB::table('folio')
                ->select('credit_total')
                ->where('folio_num', '=', $input['folio_num'])
                ->first());

            $total_balance = (DB::table('folio')
                ->select('prog_balance')
                ->where('folio_num', '=', $input['folio_num'])
                ->first());

            $credit_balance->credit_total = $credit_balance->credit_total + $input['amount'];
            $total_balance->prog_balance = $total_balance->prog_balance + $input['amount'];

            DB::table('folio')
                ->where('folio_num', $input['folio_num'])
                ->update(['credit_total' => $credit_balance->credit_total, 'prog_balance' => $total_balance->prog_balance]);
        }

        catch(QueryException $e){

            $folios = folio::all();
            $services = DB::table('services')->select('service_id')->get();
            $exception_msg = 1;
            return view("Cashiering/FolioManagement", compact('folios', 'services', 'exception_msg'));
        }

        //redirect the user to the corresponding folio to view the new record.
        return redirect('/payments/view/'.$input['folio_num']); //'.' to concatenate
    }

    public function addVehicleCharges(addDebitRequest $request){

        $input = $request->all();

        try {
            folio_services::create(
                [
                    'service_id' => "VHHR",
                    'folio_num' => $input['folio_num'],
                    'date' => Carbon::now(),
                    'price' => $input['amount'],
                    'service_count' => "1"
                ]
            );

            //updating the folio table
            $credit_balance = (DB::table('folio')
                ->select('credit_total')
                ->where('folio_num', '=', $input['folio_num'])
                ->first());

            $total_balance = (DB::table('folio')
                ->select('prog_balance')
                ->where('folio_num', '=', $input['folio_num'])
                ->first());

            $credit_balance->credit_total = $credit_balance->credit_total + $input['amount'];
            $total_balance->prog_balance = $total_balance->prog_balance + $input['amount'];

            DB::table('folio')
                ->where('folio_num', $input['folio_num'])
                ->update(['credit_total' => $credit_balance->credit_total, 'prog_balance' => $total_balance->prog_balance]);
        }

        catch(QueryException $e){

            $folios = folio::all();
            $services = DB::table('services')->select('service_id')->get();
            $exception_msg = 1;
            return view("Cashiering/FolioManagement", compact('folios', 'services', 'exception_msg'));
        }

        //redirect the user to the corresponding folio to view the new record.
        return redirect('/payments/view/'.$input['folio_num']); //'.' to concatenate
    }


    public function edit($id){

        try{
            $folio_num = folio_services::where('folio_num', $id)->orderBy('date')->get();    //obtain all services purchased by the current folio with purchased dates.
            $balance = folio::where('folio_num', $id)->first(); //to obtain the progressive balance of the current folio.
            $res_details = reservation::where('res_id', $balance->res_id)->first(); //to obtain reservation details of current folio.
            $services = DB::table('services')->select('service_id')->get();
            $reason_code = DB::table('reason_codes')->select('reason_code')->get();
            $updates = folio_update::where('folio_num', $id)->get();;

        }catch(ModelNotFoundException $e){
            dd('no data');
        }

        return view('Cashiering/Editfolio', compact('folio_num', 'balance', 'res_details', 'services', 'id', 'reason_code', 'updates'));
    }


    public function addService(AddServiceRequest $request){

        //getting all inputs from the form
        $input = $request->all();

        //getting base cost for the selected service
        $baseCost = DB::table('services')->select('base_cost')->where('service_id', '=', $input['service_id'])->first();

        //getting the tax percentages
        $tax_code = DB::table('services')->select('tax_code')->where('service_id', '=', $input['service_id'])->first();
        $tax_rate = DB::table('tax_rates')->select('percentage')->where('tax_code', '=', $tax_code->tax_code)->first();

        //getting the customer_payable status of the selected service IMPLEMENT THIS IN CHECK OUT!!!
        /*$payStatus = DB::table('services')->select('guest_payable')->where('service_id', '=', $input['service_id'])->first();*/

        //creating a model and saving to folio_services table
        try {
                folio_services::create(
                    [
                        'service_id' => $input['service_id'],
                        'folio_num' => $input['folio_num'],
                        'date' => Carbon::now(),
                        'price' => (($baseCost->base_cost + ($baseCost->base_cost* $tax_rate->percentage)) * floatval($input['service_qty'])),   //gets the total price spent on the service.
                        'service_count' => $input['service_qty']
                    ]
                );

                //updating the folio table
                $credit_balance = (DB::table('folio')->select('credit_total')->where('folio_num', '=', $input['folio_num'])->first());
                $total_balance = (DB::table('folio')->select('prog_balance')->where('folio_num', '=', $input['folio_num'])->first());

                $credit_balance->credit_total = $credit_balance->credit_total + (($baseCost->base_cost + ($baseCost->base_cost* $tax_rate->percentage)) * floatval($input['service_qty']));
                $total_balance->prog_balance = $total_balance->prog_balance + ((($baseCost->base_cost + ($baseCost->base_cost* $tax_rate->percentage)) * floatval($input['service_qty']))*1.11);

                DB::table('folio')->where('folio_num', $input['folio_num'])->update(['credit_total' => $credit_balance->credit_total, 'prog_balance' => $total_balance->prog_balance]);
        }

        catch(QueryException $e){

            $folios = folio::all();
            $services = DB::table('services')->select('service_id')->get();
            $exception_msg = 1;
            return view("Cashiering/FolioManagement", compact('folios', 'services', 'exception_msg'));
        }

        //redirect the user to the corresponding folio to view the new record.
        return redirect('/payments/view/'.$input['folio_num']); //'.' to concatenate
    }


    public function updateService(){

        $input = Request::all();

        try{
            //get old credit and total balance
            $credit_balance = (DB::table('folio')->select('credit_total')->where('folio_num', '=',$input['folio_num'])->first());
            $total_balance = (DB::table('folio')->select('prog_balance')->where('folio_num', '=', $input['folio_num'])->first());

            //getting base cost for the selected new service
            $baseCost = DB::table('services')->select('base_cost')->where('service_id', '=', $input['service_id'])->first();

            //get the tax rate for new service
            $tax_code = DB::table('services')->select('tax_code')->where('service_id', '=', $input['service_id'])->first();
            $tax_rate = DB::table('tax_rates')->select('percentage')->where('tax_code', '=', $tax_code->tax_code)->first();

            //get the price of the old folio service
            $price = DB::table('folio_services')
                ->where('service_id', '=', $input['old_service_id'])
                ->where('folio_num', '=', $input['folio_num'])
                ->where('date', '=', $input['purchased_date'])->select('price')->first();

            //new price of the selected service*quantity
            $new_price = (($baseCost->base_cost + ($baseCost->base_cost* $tax_rate->percentage)) * floatval($input['service_qty']));

            //reduce the old price from credit and total balance and add new price to both
            $credit_balance->credit_total = ($credit_balance->credit_total - $price->price) + $new_price;
            $total_balance->prog_balance = ($total_balance->prog_balance - ($price->price*1.11)) + ($new_price*1.11);

            //write new service id, count and new price to folio_services table
            DB::table('folio_services')
                ->where('service_id', '=', $input['old_service_id'])
                ->where('folio_num', '=', $input['folio_num'])
                ->where('date', '=', $input['purchased_date'])->update(['service_id' => $input['service_id'], 'service_count' => $input['service_qty'], 'price' => $new_price]);

            //write the new credit and total balance to folio table
            DB::table('folio')->where('folio_num', $input['folio_num'])->update(['credit_total' => $credit_balance->credit_total, 'prog_balance' => $total_balance->prog_balance]);

            //creating a new update entry in the updates table
            $folio_update = new folio_update();
            $folio_update->folio_num = $input['folio_num'];
            $folio_update->reason_code = $input['reason_code'];
            $folio_update->reason_description = $input['description'];
            $folio_update->changed_date = Carbon::now();
            $folio_update->save();

            //return to the same page to reflect the changes
            return redirect('/payments/view/'.$input['folio_num']);
        }

        catch(QueryException $e){
            $folios = folio::all();
            $services = DB::table('services')->select('service_id')->get();
            $exception_msg = 1;

            //return $folios;
            return view("Cashiering/FolioManagement", compact('folios', 'services', 'exception_msg'));
        }
    }


    public function batchPost(BatchPostRequest $request){

        $input = $request->all();

        $token = strtok($input['folio_num'], " ");

        while ($token !== false) {

            $baseCost = DB::table('services')->select('base_cost')->where('service_id', '=', $input['service_id'])->first();

            //getting the tax percentages
            $tax_code = DB::table('services')->select('tax_code')->where('service_id', '=', $input['service_id'])->first();
            $tax_rate = DB::table('tax_rates')->select('percentage')->where('tax_code', '=', $tax_code->tax_code)->first();

            //getting the customer_payable status of the selected service IMPLEMENT THIS!!!-------------(A)
            /*$payStatus = DB::table('services')->select('guest_payable')->where('service_id', '=', $input['service_id'])->first();*/

            //creating a model and saving to folio_services table
            try {
                folio_services::create(
                    [
                        'service_id' => $input['service_id'],
                        'folio_num' => $token,
                        'date' => Carbon::now(),
                        'price' => (($baseCost->base_cost + ($baseCost->base_cost* $tax_rate->percentage)) * floatval($input['service_qty'])),   //gets the total price spent on the service.
                        'service_count' => $input['service_qty']
                    ]
                );

                //updating the folio table
                $credit_balance = (DB::table('folio')->select('credit_total')->where('folio_num', '=', $token)->first());
                $total_balance = (DB::table('folio')->select('prog_balance')->where('folio_num', '=', $token)->first());

                $credit_balance->credit_total = $credit_balance->credit_total + (($baseCost->base_cost + ($baseCost->base_cost* $tax_rate->percentage)) * floatval($input['service_qty']));
                $total_balance->prog_balance = $total_balance->prog_balance + ((($baseCost->base_cost + ($baseCost->base_cost* $tax_rate->percentage)) * floatval($input['service_qty']))*1.11);

                DB::table('folio')->where('folio_num', $token)->update(['credit_total' => $credit_balance->credit_total, 'prog_balance' => $total_balance->prog_balance]);
            } catch (QueryException $e) {

                $folios = folio::all();
                $services = DB::table('services')->select('service_id')->get();
                $exception_msg = 1;

                //return $folios;
                return view("Cashiering/FolioManagement", compact('folios', 'services', 'exception_msg'));
            }

            $token = strtok(" ");   //increment the tokenizer's pointer
        }

                return redirect('/payments/');
    }

    public function oldFolio(){
        $folios = DB::table('folio')->where('guest_status', '=', 'Checked_Out')->get();
        $services = DB::table('services')->select('service_id')->get();
        $exception_msg = 0;

        return view("Cashiering/oldFolio", compact('folios', 'services', 'exception_msg'));


    }

    public function oldFolio_detailed($id){

        try{
            $folio_num = folio_services::where('folio_num', $id)->orderBy('date')->get();    //obtain all services purchased by the current folio with purchased dates.
            $balance = folio::where('folio_num', $id)->first(); //to obtain the progressive balance of the current folio.
            $res_details = reservation::where('res_id', $balance->res_id)->first(); //to obtain reservation details of current folio.
            $services = DB::table('services')->select('service_id')->get();
            $reason_code = DB::table('reason_codes')->select('reason_code')->get();
            $updates = folio_update::where('folio_num', $id)->get();;

        }catch(ModelNotFoundException $e){
            dd('no data');
        }

        return view('Cashiering/oldFolio_detailed', compact('folio_num', 'balance', 'res_details', 'services', 'id', 'reason_code', 'updates'));
    }

    public function printFolio(printFolioRequest $request){

        $input = $request->all();
        return ($input);
    }

}
