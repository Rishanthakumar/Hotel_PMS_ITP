<?php

namespace App\Http\Controllers;



use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Session;
use Request;

class ReservationCheckController extends Controller
{


    //check the selected room in check available room page
    function check_selected_rooms(){
        try {
            $total_rooms = session('Superiorrooms') + session('Deluxerooms') + session('Luxuryrooms');
            $total_members = session('adults') + session('children');



            $remainder = $total_members%3;
            $rooms_needed = $total_members/3;

            $memberscan = session('superior_count')*3+ session('deluxe_count')*5+session('luxury_count')*5;

            $members_selected = session('Superiorrooms')*3 + session('Deluxerooms')*5 + session('Luxuryrooms')*5;

            if ($total_rooms == 0) {
                return Redirect('ratequery/ratedetail')
                    ->with('warning', 'Please select one or more rooms');

            }

            if($remainder == 0)
            {
                $min_rooms = $rooms_needed;

            }
            else{

                $rooms_needed = floor($total_members/3);

                $min_rooms = $rooms_needed +1;

            }

            if($total_rooms != session('ono_of_rooms'))
            {
                return Redirect('ratequery/ratedetail')
                    ->with('warning', 'Requested number of room(s) is/are not equal to the selected number of room(s)          please select again');


            }

             if ($total_rooms < $min_rooms) {
                return Redirect('ratequery/ratedetail')
                    ->with('warning', 'Since you have ' . $total_members . ' members You must reserve ' . $min_rooms . ' room(s) atleast');

            } else {
                Session::put('no_of_rooms', $total_rooms);

                return Redirect('/registerind');

            }


        }
        catch (Exception $e) {
                return redirect('/FO_mainpage')
                    ->with(['exception' => 'You have errors in your last request please reload the page']);

        }



    }


   /* remove added rooms from the summary*/
    function remove_added_rooms(){

        try {
            $input = Request::all();

            $room = $input['button'];

            Session::forget($room . 'rooms');
            Session::forget($room . 'rate');
            Session::forget($room . 'rate_code');

            return Redirect('ratequery/ratedetail');
        }catch (Exception $e)
        {
            return redirect('/FO_mainpage')
                ->with(['exception' => 'You have errors in your last request please reload the page']);


        }
    }
}
