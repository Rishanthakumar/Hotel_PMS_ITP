<?php

namespace App\Http\Controllers;

use App\customer;
use Illuminate\Session\TokenMismatchException;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Exception;
use Request;
use App\reservation;
use App\folio_services;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use DB;
use Session;
use DateTime;
use Validator;
use Mail;
class ReservationController extends Controller
{
    //##################################################################################################################
/*
    function roomquery(){

            $arrival=Input::get('arrival');
            $departure=Input::get('departure');


        $reservations = DB::table('reservation')
            ->where('check_in', '<', $departure)
            ->where('check_out','>',$arrival)
            ->select('res_id')
            ->get();

        $superior_count =0;
        $deluxe_count =0;
        $luxury_count =0;

        foreach($reservations as $reservation)
        {
            $superior = DB::table('reservation_room_type_count')
                ->where('res_id', '=', $reservation->res_id)
                ->where('type_id','=',1)
                ->select('count')
                ->get();

            foreach($superior as $sup)
            {
                $superior_count += $sup->count;
            }

            $deluxe = DB::table('reservation_room_type_count')
                ->where('res_id', '=', $reservation->res_id)
                ->where('type_id','=',2)
                ->select('count')
                ->get();

            foreach($deluxe as $del)
            {

                $deluxe_count += $del->count;
            }

            $luxury = DB::table('reservation_room_type_count')
                ->where('res_id', '=', $reservation->res_id)
                ->where('type_id','=',3)
                ->select('count')
                ->get();

            foreach($luxury as $del)
            {

                $luxury_count += $del->count;
            }
        }

        $totalAvailableRooms = $superior_count + $deluxe_count+$luxury_count;
        $row = ['total'=>'hi'];

        //$output = json_encode($row);


        return Response::json($row);


    }*/



#################################################################################################################################
   /* get the room available details for the selected date period*/
    function querydetails(Requests\CreateReservationRequest $request)
    {

            try {

               //   $companyid = $querydet['company'];
               //   $travelagentid = $querydet['travel_agent'];
               // Session::put(['status'=>'Successfully added']);

               //to forget summary details
               Session::forget(['Superiorrooms','Deluxerooms','Luxuryrooms','Superiorrate','Deluxerate','Luxuryrate',
                   'Superiorrate_code','Deluxerate_code','Luxuryrate_code','Superiorroom_type','Deluxeroom_type','Luxuryroom_type']);





                $querydet = $request->all();
                $arrival = $querydet['arrival'];
                $departure = $querydet['departure'];
                $adults = $querydet['adults'];
                $children = $querydet['children'];

                $nights  = $querydet['nights'];


                $requestedRooms = $querydet['ono_of_rooms'];
                $customer_type = $querydet['customer_type'];



                //get the temporary check_out count

                $temp_reservations = DB::table('temporary_check_out')
                    ->where('temp_check_in', '>', $departure)
                    ->where('temp_check_out','<',$arrival)
                    ->whereIn('status', ['check_out','confirmed'])
                    ->select('res_id')
                    ->get();


                $superior_count_temp =0;
                $deluxe_count_temp =0;
                $luxury_count_temp =0;

                foreach($temp_reservations as $temp_res)
                {
                    $superior_temp = DB::table('reservation_room_type_count')
                        ->where('res_id', '=', $temp_res->res_id)
                        ->where('type_id','=',1)
                        ->select('count')
                        ->get();

                    foreach($superior_temp as $sup_temp)
                    {
                        $superior_count_temp += $sup_temp->count;
                    }

                    $deluxe_temp = DB::table('reservation_room_type_count')
                        ->where('res_id', '=', $temp_res->res_id)
                        ->where('type_id','=',2)
                        ->select('count')
                        ->get();

                    foreach($deluxe_temp as $del_temp)
                    {

                        $deluxe_count_temp += $del_temp->count;
                    }

                    $luxury_temp = DB::table('reservation_room_type_count')
                        ->where('res_id', '=', $temp_res->res_id)
                        ->where('type_id','=',3)
                        ->select('count')
                        ->get();

                    foreach($luxury_temp as $del_temp)
                    {

                        $luxury_count_temp += $del_temp->count;
                    }
                }





                //get the reservation that are already there within the requested period

               $reservations = DB::table('reservation')
                    ->where('check_in', '<=', $departure)
                    ->where('check_out','>=',$arrival)
                    ->whereIn('status', ['tentative','confirmed'])
                    ->select('res_id')
                    ->get();

                $superior_count =0;
                $deluxe_count =0;
                $luxury_count =0;

                foreach($reservations as $reservation)
                {
                    $superior = DB::table('reservation_room_type_count')
                        ->where('res_id', '=', $reservation->res_id)
                        ->where('type_id','=',1)
                        ->select('count')
                        ->get();

                    foreach($superior as $sup)
                    {
                        $superior_count += $sup->count;
                    }

                    $deluxe = DB::table('reservation_room_type_count')
                        ->where('res_id', '=', $reservation->res_id)
                        ->where('type_id','=',2)
                        ->select('count')
                        ->get();

                    foreach($deluxe as $del)
                    {

                        $deluxe_count += $del->count;
                    }

                    $luxury = DB::table('reservation_room_type_count')
                        ->where('res_id', '=', $reservation->res_id)
                        ->where('type_id','=',3)
                        ->select('count')
                        ->get();

                    foreach($luxury as $del)
                    {

                        $luxury_count += $del->count;
                    }
                }

               $superior_available = 5-$superior_count+$superior_count_temp;
               $deluxe_available = 3-$deluxe_count+$deluxe_count_temp;
               $luxury_available = 5-$luxury_count+$luxury_count_temp;


               if( $superior_available < 0)
               {
                   $superior_available =0;
               }

               if($deluxe_available <0)
               {
                   $deluxe_available =0;
               }

               if($luxury_available <0)
               {
                   $luxury_available = 0;
               }


               Session::put(['superior_count'=>$superior_available,'deluxe_count'=>$deluxe_available,
                   'luxury_count'=>$luxury_available]);

               Session::put(['arrival_date'=>$arrival,'departure_date'=>$departure,'adults'=>$adults,'children'=>$children,'nights'=>$nights,'ono_of_rooms'=>$requestedRooms,'reservation_checked'=>'yes','customer_type'=>$customer_type]);

               $totalAvailableRooms = $superior_available + $deluxe_available+ $luxury_available;


               if(!session("waitlist")) {
                   if (session('customer_type') == "CMP" || session('customer_type') == "FIT") {
                       Session::forget(['customer_name', 'cus_id']);
                   }

               }
                   if ($totalAvailableRooms < $requestedRooms) {

                       return redirect('ratequery/ratedetail')
                           ->with(['warning' => 'Sorry requested no of rooms are not available.Only ' . $totalAvailableRooms . ' room(s) are available'])
                           ->withInput();

                   }






                return redirect('ratequery/ratedetail')
                        ->withInput();


            } catch (Exception $e) {
            return redirect('/FO_mainpage')
                ->with(['exception' => 'You have errors in your last request.Try again!']);

        }

    }

####################################################################################################################



    /*if a travel agent check available rooms then add a percentage*/

    function add_travel_agent_rate(){

        try {
            $input = Request::all();

            Session::forget(['Superiorrooms', 'Deluxerooms', 'Luxuryrooms', 'Superiorrate', 'Deluxerate', 'Luxuryrate',
                'Superiorrate_code', 'Deluxerate_code', 'Luxuryrate_code', 'Superiorroom_type', 'Deluxeroom_type', 'Luxuryroom_type']);


            Session::put(['customer_name' => $input['customer_name'], 'cus_id' => $input['cus_id'], 'customer_type' => $input['customer_type'], 'travel_agent_rate' => $input['travel_agent_rate']]);

            return redirect('ratequery/ratedetail')
                ->withInput();
        }catch (Exception $e) {
            return redirect('/FO_mainpage')
                ->with(['exception' => 'You have errors in your last request.Try again!']);

        }

    }


###################################################################################################################

    /*store the successfull reservation details*/

    function store(Requests\CreateReservationRequest $request)
    {


        try {
            $input = $request->all();
            $reservation = new reservation;




            if(session('waitlist_accepted'))
            {

                DB::table('reservation')
                    ->where('res_id', '=', session('waitlist_accepted'))
                    ->update([

                        'nights' => $input['nights'],
                        'status' => "tendative",
                        'check_out' => $input['departure_date'],
                        'check_in' => $input['arrival_date'],
                        'adults' => $input['children'],
                        'no_of_rooms' => $input['ono_of_rooms'],
                        'additional_request_comments' => $input['additional']


                    ]);

                $res_id = session('waitlist_accepted');


            }
            else {
                // Enter the reservation details into reservation table

                $reservation->cus_id = $input['customer_id'];
                $reservation->nights = $input['nights'];
                $reservation->date = Carbon::now();
                $reservation->status = "tendative";
                $reservation->online = false;
                $reservation->type = $input['customer_type'];;
                $reservation->check_out = $input['departure_date'];
                $reservation->check_in = $input['arrival_date'];
                $reservation->adults = $input['adults'];
                $reservation->children = $input['children'];
                $reservation->no_of_rooms = $input['ono_of_rooms'];
                $reservation->additional_request_comments = $input['additional'];

                $reservation->save();

                //get reservation max id

                $res_id = $reservation->res_id;
            }



            $no_of_deluxe_rooms = session('Deluxerooms');
            $no_of_superior_rooms = session('Superiorrooms');
            $no_of_luxury_rooms = session('Luxuryrooms');




            $arrival = $input['arrival_date'];


            /*assign deluxe room count*/
            if($no_of_deluxe_rooms >0) {
                DB::table('reservation_room_type_count')->insert(
                    ['res_id' => $res_id, 'type_id' => session('Deluxeroom_type'), 'count' => $no_of_deluxe_rooms,'rate_code'=>session('Deluxerate_code')]
                );

            }

            /*assign superior rooms count*/
            if($no_of_superior_rooms >0) {
                DB::table('reservation_room_type_count')->insert(
                    ['res_id' => $res_id, 'type_id' => session('Superiorroom_type'), 'count' => $no_of_superior_rooms,'rate_code'=>session('Superiorrate_code')]
                );

            }


            /*assign luxury rooms count*/
            if($no_of_luxury_rooms >0) {
                DB::table('reservation_room_type_count')->insert(
                    ['res_id' => $res_id, 'type_id' => session('Luxuryroom_type'), 'count' => $no_of_luxury_rooms,'rate_code'=>session('Luxuryrate_code')]
                );

            }







            Session::flush();
            return Redirect('/FO_mainpage')
                ->with(['succ_status' => 'Reservation has been successfully made']);

        }catch (Exception $e) {
            return redirect('/FO_mainpage')
                ->with(['exception' => 'You have errors in your last request.Try again!']);

        }


    }
    ################################################################################################################



   /* waitlist a reservation*/

    function waitlist_res(Requests\CreateReservationRequest $request)
    {

        try {


            $input = $request->all();
            $reservation = new reservation;


            // Enter the reservation details into reservation table

            $reservation->cus_id = $input['customer_id'];
            $reservation->nights = $input['nights'];
            $reservation->date = Carbon::now();
            $reservation->status = "waitlisted";
            $reservation->online = false;
            $reservation->type = $input['customer_type'];;
            $reservation->check_out = $input['departure_date'];
            $reservation->check_in = $input['arrival_date'];
            $reservation->adults = $input['adults'];
            $reservation->children = $input['children'];
            $reservation->no_of_rooms = $input['ono_of_rooms'];
            $reservation->additional_request_comments = $input['additional'];

            $reservation->save();

            Session::flush();
            return Redirect('/FO_mainpage')
                ->with(['succ_status' => 'Successfully added to the waitlist']);

        }

        catch (Exception $e) {
            return redirect('/FO_mainpage')
                ->with(['exception' => 'You have errors in your last request.Try again!']);

        }




    }

####################################################################################################################


/* cancel a waitlisted reservation*/
function waitlist_acc_cancel(){

    try {

        $waitlist = Request::all();


        $button = $waitlist['btn'];

        $res_id = $waitlist['res_id'];


        if ($button == 'accept') {
            $reser = DB::table('reservation')
                ->where('res_id', '=', $res_id)
                ->select('*')
                ->first();

            $cus_name = DB::table('customer')
                ->where('cus_id', '=', $reser->cus_id)
                ->value('name');


            Session::put([

                'arrival_date' => strtok($reser->check_in, " "),
                'departure_date' => strtok($reser->check_out, " "),
                'adults' => $reser->adults,
                'children' => $reser->children,
                'nights' => $reser->nights,
                'ono_of_rooms' => $reser->no_of_rooms,
                'customer_type' => $reser->type,
                'cus_id' => $reser->cus_id,
                'customer_name' => $cus_name,
                'waitlist_accepted' => $res_id,

            ]);


            return redirect('/ratequery/ratedetail');


        }

        if ($button == 'cancel') {
            DB::table('reservation')
                ->where('res_id', '=', $res_id)
                ->update(['status' => 'cancelled']);

            return redirect('/waitlist')
                ->with(['succ_status' => 'Reservation has been cancelled successfully']);
        }

    } catch (Exception $e) {
        return redirect('/FO_mainpage')
            ->with(['exception' => 'You have errors in your last request.Try again!']);

    }

}


//##################################################################################################################



    /*update reservation only add services and cancel the reservation*/

    function update()
    {
        try {

        $input = Request::all();
        $res_id = $input['res_id'];
        $room_no = $input['room_no'];
        $service_time = $input['service_time'];

        $button = $input['btn'];





        if ($button == 'remove') {

            if (isset($input['added_services'])) {

                $remove_services = $input['added_services'];
                foreach ($remove_services as $rem) {
                    DB::table('reservation_services')
                        ->where('service_id', '=', $rem)
                        ->where('room_id','=',$room_no)
                        ->where('res_id','=',$res_id)
                        ->delete();


                }


            }
        }
        elseif($button == 'add') {


            if (isset($input['add_new_services'])) {

                $add_services = $input['add_new_services'];


                foreach ($add_services as $ad) {
                    DB::table('reservation_services')->insert(
                        ['res_id' =>$res_id, 'service_id' => $ad,'room_id'=>$room_no]
                    );

                }




            }


        }
        $not_added_services = DB::table('services')
            ->whereNotIn('service_id',function ($query) {
                $input = Request::all();
                $res_id = $input['res_id'];
                $room_no = $input['room_no'];
                $query->select('service_id')
                    ->from('reservation_services')
                    ->where('res_id','=',$res_id)
                    ->where('room_id','=',$room_no);

            })
            ->select('*')
            ->get();

        $added_services = DB::table('reservation_services')
            ->leftJoin('services', 'services.service_id', '=', 'reservation_services.service_id')
            ->where('res_id','=',$res_id)
            ->where('room_id','=',$room_no)
            ->select('*')
            ->get();





        Session::put($room_no.'added_services',$added_services);
        Session::put('room_no',$room_no);
        Session::put($room_no.'not_added_services',$not_added_services);



        return redirect('/block_rooms')
            ->withInput();


        } catch (Exception $e) {
             return redirect('/FO_mainpage')
                 ->with(['exception' => 'You have errors in your last request.Try again!']);
         }

    }

    ####################################################################################################################



    /*cancel a reservation*/
    function cancel_reservation()
    {

        try {

            $input = Request::all();
            $res_id = $input['res_id'];


            $affectedRows = reservation::RelevantReservation($res_id)->update(array
            (
                'status' => 'cancelled',
            ));


            $not_added_services = DB::table('available_onrequest')
                ->whereNotIn('onrequest_id',function ($query) {
                    $input = Request::all();
                    $res_id = $input['res_id'];

                    $query->select('onrequest_id')
                        ->from('reservation_onrequest')
                        ->where('res_id','=',$res_id);

                })
                ->select('*')
                ->get();

            $added_services = DB::table('reservation_onrequest')
                ->leftJoin('available_onrequest', 'available_onrequest.onrequest_id', '=', 'reservation_onrequest.onrequest_id')
                ->where('res_id','=',$res_id)
                ->select('*')
                ->get();





            Session::put($res_id.'added_services',$added_services);
            Session::put('service_res_id',$res_id);
            Session::put($res_id.'not_added_services',$not_added_services);


            return redirect('/updateres')
                ->with(['succ_status' => 'Reservation has been cancelled successfully']);;



        } catch (Exception $e) {
            return redirect('/FO_mainpage')
                ->with(['exception' => 'You have errors in your last request.Try again!']);
        }

    }





    //##################################################################################################################

    //adding rooms
    function addrooms()
    {

        try {
            $addroom = Request::all();

            $room_type = $addroom['room_type'];

            $room_type_name = DB::table('room_type')
                ->where('type_id', '=', $room_type)
                ->value('type_name');

            $validator = Validator::make(Request::all(), [
                'no_of_rooms' => 'required',
                'stay_type' => 'required|not_in:Select Stay Type',
            ]);


            if ($validator->fails()) {
                return redirect('ratequery/ratedetail')
                    ->withErrors($validator)
                    ->with($room_type_name, 'error')
                    ->withInput();
            }


            $room_required = $addroom['no_of_rooms'];
            $rate_code = $addroom['stay_type'];

            $rate = DB::table('rate')
                ->where('rate_code', '=', $rate_code)
                ->value('rate');

            $room_type_name = DB::table('room_type')
                ->where('type_id', '=', $room_type)
                ->value('type_name');

            if(session('customer_type')=='TRA')
            {
                $rate = $rate*session('travel_agent_rate')/100;
            }

                Session::put([$room_type_name . 'rooms' => $room_required, $room_type_name . 'rate' => $rate,
                    $room_type_name . 'rate_code' => $rate_code, $room_type_name . 'room_type' => $room_type]);




            return redirect('ratequery/ratedetail')
                    ->with(['status'=>'Successfully added']);


        } catch (Exception $e) {
            return redirect('/FO_mainpage')
                ->with(['exception' => 'You have errors in your last request.Try again!']);
        }


    }

    //##################################################################################################################


    /*add a turn away entry*/

    function turnawayentry()
    {

        try {
            $turnaway = Request::all();

            $validator = Validator::make(Request::all(), [
                'reason_for_turnaway' => 'required'

            ]);


            if ($validator->fails()) {
                return redirect('ratequery/ratedetail')
                    ->withErrors($validator)
                    ->with('turnaway', 'error')
                    ->withInput();
            }

            $reason = $turnaway['reason_for_turnaway'];

            DB::table('turn_away')->insert(
                ['reason' => $reason]
            );

            Session::flush();

            return redirect('/FO_mainpage')
                ->with(['succ_status' => 'Turnaway has been successfully added']);
        } catch (Exception $e) {
            return redirect('/FO_mainpage')
                ->with(['exception' => 'You have errors in your last request please reload the page']);
        }

    }

    /*sending a email for confirmation*/
###########################################################################################################################
    function sendEmailReminder(){

        try {
            $input = Request::all();

            $res_id = $input['res_id'];

            $check_in = DB::table('reservation')
                ->join('customer', 'customer.cus_id', '=', 'reservation.cus_id')
                ->where('res_id','=',$res_id)
                ->value('check_in');


            $check_out = DB::table('reservation')
                ->join('customer', 'customer.cus_id', '=', 'reservation.cus_id')
                ->where('res_id','=',$res_id)
                ->value('check_out');

            $nights = DB::table('reservation')
                ->join('customer', 'customer.cus_id', '=', 'reservation.cus_id')
                ->where('res_id','=',$res_id)
                ->value('nights');

            $no_of_rooms= DB::table('reservation')
                ->join('customer', 'customer.cus_id', '=', 'reservation.cus_id')
                ->where('res_id','=',$res_id)
                ->value('no_of_rooms');

            $adults = DB::table('reservation')
                ->join('customer', 'customer.cus_id', '=', 'reservation.cus_id')
                ->where('res_id','=',$res_id)
                ->value('adults');

            $children = DB::table('reservation')
                ->join('customer', 'customer.cus_id', '=', 'reservation.cus_id')
                ->where('res_id','=',$res_id)
                ->value('children');



            $type = DB::table('reservation')
                ->join('customer', 'customer.cus_id', '=', 'reservation.cus_id')
                ->where('res_id','=',$res_id)
                ->value('type');

            $guests = $adults + $children;

            $name = DB::table('reservation')
                ->join('customer', 'customer.cus_id', '=', 'reservation.cus_id')
                ->where('res_id','=',$res_id)
                ->value('name');





            $data = array('res_id'=>$res_id,'check_in'=>$check_in,'check_out'=>$check_out,'nights'=>$nights,
                'no_of_rooms'=>$no_of_rooms,'guests'=>$guests,'name'=>$name,'type'=>$type);


            DB::table('reservation')
                ->where('res_id', '=', $res_id)
                ->update(['status' => 'confirmed']);


            Mail::send( 'Front_Office.FOConfiramtionMail', $data, function ($message) {

                $input = Request::all();

                $res_id = $input['res_id'];


                $email =DB::table('reservation')
                    ->join('customer', 'customer.cus_id', '=', 'reservation.cus_id')
                    ->where('res_id','=',$res_id)
                    ->value('email');

                $message->subject('Reservation Confirmation');
                $message->from('reservations@amayaresorts.com', 'Amaya Resorts & Spas');

                $message->to($email);

                return Redirect('/confirmations')
                    ->with(['succ_status'=>"Reservation has been confirmed successfully"]);
            });

            Session::put(['succ_status'=>'Reservation has been confirmed successfully']);
            return Redirect('/confirmations');



        }catch (Exception $e) {
            return redirect('/FO_mainpage')
                ->with(['exception' => 'You have errors in your last request.Try again!']);
        }

    }



    //######################################################################################################



/*    add customer from a profile management part */
    function addcustomer(){

        try {
            $input = Request::all();


            $cus_id = $input['cus_id'];
            $cus_name = $input['cus_name'];

            if ($input['type'] == 'individual') {
/*                Session::forget('cus_id');
                Session::forget('company_name');
                Session::forget('travel_agent_name');*/
                Session::put(['cus_id' => $cus_id, 'customer_type' => 'FIT','customer_name'=>$cus_name]);
            } elseif ($input['type'] == 'travel_agent') {
              /*  Session::forget('cus_id');
                Session::forget('company_name');
                Session::forget('individual_name');*/
                Session::put(['cus_id' => $cus_id, 'customer_type' => 'TRA','customer_name'=>$cus_name]);


            } elseif ($input['type'] == 'company') {
              /*  Session::forget('cus_id');
                Session::forget('individual_name');
                Session::forget('travel_agent_name');*/
                Session::put(['cus_id' => $cus_id, 'customer_type' => 'CMP','customer_name'=>$cus_name]);

            }

            if(session('waitlist'))
            {
                return Redirect('/waitlistform');
            }
            return Redirect('/registerind');

        }catch (Exception $e) {
            return redirect('/FO_mainpage')
                ->with(['exception' => 'You have errors in your last request.Try again!']);
        }


    }

   /* check in a customer*/
    function checkin(){

       try {
            $input = Request::all();
            $res_id = $input['res_id'];

            DB::table('reservation')
                ->where('res_id', '=', $res_id)
                ->update(['status' => 'Checked_In']);

            //changing guest status in the folio
            DB::table('folio')
                ->where('res_id', '=', $res_id)
                ->update(['guest_status' => 'Checked_In']);

            //adding Room Charges
            $no_of_nights = DB::table('reservation')
                ->where('res_id', '=', $res_id)
                ->value('nights');

            $variable = DB::table('room_reservation_rate')
                ->where('res_id','=',$res_id)
                ->select('room_id')
                ->get();


            foreach($variable as $var)
            {

                $type = DB::table('room')
                    ->where('room_id','=',$var->room_id)
                    ->value('type_id');




                $rate = DB::table('reservation_room_type_count')
                    ->where('type_id','=',$type)
                    ->where('res_id','=',$res_id)
                    ->value('rate_code');



                $rate_value = DB::table('rate')
                    ->where('rate_code','=',$rate)
                    ->value('rate');



                $total = $rate_value * $no_of_nights;



                $folio_num = DB::table('folio')
                    ->where('res_id', '=', $res_id)
                    ->where('room_id', '=', $var->room_id)
                    ->value('folio_num');



                //start
                try {
                    folio_services::create(
                        [
                            'service_id' => "RMCHRG",
                            'folio_num' =>$folio_num,
                            'date' => Carbon::now(),
                            'price' => $total,
                            'service_count' => "1"
                        ]
                    );

                    //updating the folio table
                    $credit_balance = (DB::table('folio')
                        ->select('credit_total')
                        ->where('folio_num', '=', $folio_num)
                        ->first());

                    $total_balance = (DB::table('folio')
                        ->select('prog_balance')
                        ->where('folio_num', '=', $folio_num)
                        ->first());

                    $credit_balance->credit_total = $credit_balance->credit_total + $total;
                    $total_balance->prog_balance = $total_balance->prog_balance + $total;



                    DB::table('folio')
                        ->where('folio_num', $folio_num)
                        ->update(['credit_total' => $credit_balance->credit_total, 'prog_balance' => $total_balance->prog_balance, 'Rate_code' => $rate]);
                }

                catch(QueryException $e){

                    /*$folios = folio::all();
                    $services = DB::table('services')->select('service_id')->get();
                    $exception_msg = 1;
                    return view("Cashiering/FolioManagement", compact('folios', 'services', 'exception_msg'));*/

                    return redirect('/FO_mainpage')
                        ->with(['exception' => 'You have errors in your last request.Try again!']);

                //redirect the user to the corresponding folio to view the new record.
                /*return redirect('/payments/view/'.$input['folio_num']);*/
                //end
    }
            }

            return redirect('/checkin')
                ->with(['succ_status'=>'Successfully Checked-In']);
       }catch (Exception $e) {
            return redirect('/FO_mainpage')
                ->with(['exception' => 'You have errors in your last request.Try again!']);
        }
    }


    ###############################################################################################################################
    /*  view available services change the table from onrequest to services ask vishan*/

    /*  view available services change the table from onrequest to services ask vishan*/

    function viewServices(){


        try {
        $input = Request::all();

        $room_no = $input['room_no'];
        $res_id = $input['res_id'];

        Session::put([$room_no => $room_no  ]);

        $service_time = $input['service_time'];




        $not_added_services = DB::table('services')
            ->whereNotIn('service_id',function ($query) {
                $input = Request::all();
                $res_id = $input['res_id'];
                $room_no = $input['room_no'];
                $query->select('service_id')
                    ->from('reservation_services')
                    ->where('res_id','=',$res_id)
                    ->where('room_id','=',$room_no);

            })
            ->select('*')
            ->get();

        $added_services = DB::table('reservation_services')
            ->leftJoin('services', 'services.service_id', '=', 'reservation_services.service_id')
            ->where('res_id','=',$res_id)
            ->where('room_id','=',$room_no)
            ->select('*')
            ->get();


        Session::put($room_no. 'added_services', $added_services);
        Session::put('room_no', $room_no);
        Session::put($room_no . 'not_added_services', $not_added_services);





        return redirect('/block_rooms')
            ->withInput();

        }catch (Exception $e) {
             return redirect('/FO_mainpage')
                 ->with(['exception' => 'You have errors in your last request.Try again!']);
         }

    }

    #######################################################################################################################

    function temp_check_out()
    {

        try {
            $date = Carbon::now();
            $input = Request::all();

            $res_id = $input['res_id'];

            $expected_date = $input['expected_check_in'];
            $reason = $input['reason'];


            DB::table('reservation')
                ->where('res_id', '=', $res_id)
                ->update(['status' => 'temp_checked_out']);

            DB::table('temporary_check_out')->insert(
                ['res_id' => $res_id, 'temp_check_out' => $date, 'temp_check_in' => $expected_date, 'status' => 'check_out', 'reason' => $reason]
            );

            return redirect('/temp_check_out')
                ->with(['succ_status' => 'Guest has been successfully checked out']);
        }catch (Exception $e) {
            return redirect('/FO_mainpage')
                ->with(['exception' => 'You have errors in your last request.Try again!']);
        }


    }

#####################################################################################################################################
    function temp_check_in()
    {
        try {
            $date = Carbon::now();

            $input = Request::all();


            $res_id = $input['res_id'];

            DB::table('reservation')
                ->where('res_id', '=', $res_id)
                ->update(['status' => 'Checked_In']);

            DB::table('temporary_check_out')
                ->where('res_id', '=', $res_id)
                ->update(['status' => 'Checked_In']);

            return redirect('/temp_check_in')
                ->with(['succ_status' => 'Guest has been successfully Checked-In']);


        }catch (Exception $e) {
            return redirect('/FO_mainpage')
                ->with(['exception' => 'You have errors in your last request.Try again!']);
        }


    }

################################################################################################################################


    function block_rooms_block()
    {


        try {
            $input = Request::all();


            $res_id = $input['res_id'];
            $enterd_s_rooms = 0;
            $enterd_l_rooms = 0;
            $enterd_d_rooms = 0;


            $Luxury_rooms = 0;
            $Deluxe_rooms = 0;
            $Superior_rooms = 0;


            if (isset($input['Superior'])) {
                $Superior_rooms = $input['Superior'];
            }

            if (isset($input['Deluxe'])) {
                $Deluxe_rooms = $input['Deluxe'];
            }

            if (isset($input['Luxury'])) {
                $Luxury_rooms = $input['Luxury'];
            }


            if (isset($input['myTextEditBox'])) {
                foreach ($input['myTextEditBox'] as $room_id) {

                    $type = DB::table('room')
                        ->join('room_type', 'room.type_id', '=', 'room_type.type_id')
                        ->where('room_id', '=', $room_id)
                        ->value('type_name');


                    if ($type == 'Superior') {
                        $enterd_s_rooms = $enterd_s_rooms + 1;

                    }


                    if ($type == 'Luxury') {
                        $enterd_l_rooms = $enterd_l_rooms + 1;

                    }

                    if ($type == 'Deluxe') {
                        $enterd_d_rooms = $enterd_d_rooms + 1;

                    }

                }

            }

            Session::forget('RS001', 'RS002', 'RS003', 'RS004', 'RS005', 'RD001', 'RD002', 'RD003', 'RL001', 'RL002', 'RL003', 'RL004', 'RL005');

            if ($enterd_s_rooms + $enterd_l_rooms + $enterd_d_rooms == 0) {
                return redirect('/block_rooms')
                    ->with(['exception' => 'Please select rooms']);
            }


            if ($enterd_s_rooms != $Superior_rooms) {
                return redirect('/block_rooms')
                    ->with(['exception' => 'Selected number of Superior rooms are invalid, please select again']);
            }


            if ($enterd_l_rooms != $Luxury_rooms) {
                return redirect('/block_rooms')
                    ->with(['exception' => 'Selected number of Superior rooms are invalid, please select again']);
            }

            if ($enterd_d_rooms != $Deluxe_rooms) {
                return redirect('/block_rooms')
                    ->with(['exception' => 'Selected number of Superior rooms are invalid, please select again']);
            }


            Session::forget('RS001', 'RS002', 'RS003', 'RS004', 'RS005', 'RD001', 'RD002', 'RD003', 'RL001', 'RL002', 'RL003', 'RL004', 'RL005');


            //get reservation type
            $res_type = DB::table('reservation')
                ->select('type')
                ->where('res_id', '=', $res_id)
                ->first();

            foreach ($input['myTextEditBox'] as $room_id1) {
                DB::table('room_reservation_rate')->insert(
                    ['res_id' => $res_id, 'room_id' => $room_id1, 'rate_code' => 9]
                );

                DB::table('room')
                    ->where('room_id', '=', $room_id1)
                    ->update(['fo_status' => 'occupied']);


                //create new folio
                DB::table('folio')
                    ->insert(['credit_total'=> 0, 'debit_total'=> 0, 'prog_balance'=> 0, 'guest_status' => 'Pending', 'res_id' => $res_id, 'type' => $res_type->type, 'room_id' => $room_id1]);


            }

            return redirect('/checkin')
                ->with(['succ_status' => 'Rooms are successfully blocked']);
        } catch (Exception $e) {
            return redirect('/FO_mainpage')
                ->with(['exception' => 'You have already blocked a room for this reservation']);
        }


    }

#################################################################################################################################
############################################################################################################################
    function update_res()
    {

        try {

            $input = Request::all();
            $res_id = $input['res_id'];

            $service_time = $input['service_time'];

            $button = $input['btn'];





            if ($button == 'remove') {

                if (isset($input['added_services'])) {



                    $remove_services = $input['added_services'];
                    foreach ($remove_services as $rem) {



                        $count =0;
                        $arg = strtok($rem," ");

                        $det = array();

                        $det = explode("sp",$arg);



                        DB::table('reservation_services')
                            ->where('service_id', '=', $det[0])
                            ->where('room_id',$det[1])
                            ->where('res_id','=',$res_id)
                            ->delete();


                    }


                }
            }
            elseif($button == 'add') {


                if(isset($input['room_no']))
                {

                    $room_no = $input['room_no'];

                    if (isset($input['add_new_services'])) {

                        $add_services = $input['add_new_services'];


                        foreach ($add_services as $ad) {
                            DB::table('reservation_services')->insert(
                                ['res_id' => $res_id, 'service_id' => $ad,'room_id'=>$room_no]
                            );

                        }


                    }

                }
            }
            $not_added_services = DB::table('services')
                ->whereNotIn('service_id',function ($query) {
                    $input = Request::all();
                    $res_id = $input['res_id'];
                    $query->select('service_id')
                        ->from('reservation_services')
                        ->where('res_id','=',$res_id);


                })
                ->select('*')
                ->get();

            $added_services = DB::table('reservation_services')
                ->leftJoin('services', 'services.service_id', '=', 'reservation_services.service_id')
                ->where('res_id','=',$res_id)
                ->select('*')
                ->get();





            Session::put($res_id.'added_services',$added_services);
            Session::put('service_res_id',$res_id);
            Session::put($res_id.'not_added_services',$not_added_services);



            return redirect('/updateres')
                ->withInput();



        } catch (Exception $e) {
            return redirect('/FO_mainpage')
                ->with(['exception' => 'You have errors in your last request.Try again!']);
        }

    }

    function viewServices_res(){


        try {
            $input = Request::all();


            $res_id = $input['res_id'];



            $service_time = $input['service_time'];




            $not_added_services = DB::table('services')
                ->whereNotIn('service_id',function ($query) {
                    $input = Request::all();
                    $res_id = $input['res_id'];
                    $query->select('service_id')
                        ->from('reservation_services')
                        ->where('res_id','=',$res_id);

                })
                ->select('*')
                ->get();

            $added_services = DB::table('reservation_services')
                ->leftJoin('services', 'services.service_id', '=', 'reservation_services.service_id')
                ->where('res_id','=',$res_id)
                ->select('*')
                ->get();

            $added_services = DB::table('reservation_services')
                ->leftJoin('services', 'services.service_id', '=', 'reservation_services.service_id')
                ->where('res_id','=',$res_id)
                ->select('*')
                ->get();

            $room_id = DB::table('room_reservation_rate')
                ->where('res_id','=',$res_id)
                ->select('room_id')
                ->get();


            Session::put($res_id. 'added_services', $added_services);
            Session::put('service_res_id',$res_id);
            Session::put($res_id. 'not_added_services', $not_added_services);
            Session::put('room_id',$room_id);




            return redirect('/updateres')
                ->withInput();

        }catch (Exception $e) {
            return redirect('/FO_mainpage')
                ->with(['exception' => 'You have errors in your last request.Try again!']);
        }

    }





}
