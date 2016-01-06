<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Barryvdh\DomPDF\PDF;
use App;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Exception;

class NewUpdateController extends Controller
{

    //-------------------------------------Transport Supervisor Edit Functions---------------------------------------------


    public function edit_vehicle_details(Requests\ModalValidateEditVehicle $request)
    {
        try {
            $vehicle_no = $request->input('vehicle_no');
            $vehicle_type = $request->input('vehicle_type');
            $model = $request->input('model');
            $colour = $request->input('colour');
            $cylinder_capacity = $request->input('cylinder_capacity');
            $registered_date = $request->input('registration_date');
            $manufactured_year = $request->input('manufactured_year');
            $rate_per_km = $request->input('rate_per_km');
            $status = $request->input('status');

            DB::table('vehicle')
                ->where('vehicle_no', $vehicle_no)
                ->update(['rate_per_km' => $rate_per_km, 'status' => $status]);


            return Redirect::to('editvehicle')->with('message', 'Vehicle details edited successfully!');
        }

        catch(Exception $e)
        {

            return Redirect::to('/editvehicle')
                ->with(['exceptionerr' => 'Sorry you cannot edit the vehicle details. Please reload the page!']);


        }

    }


    public function edit_driver_details(Requests\ModalValidateEditDriver $request)

    {
        try {

            $driver_id = $request->input('driver_id');
            $fname = $request->input('fname');
            $lname = $request->input('lname');
            $licence_no = $request->input('licence_no');
            $NIC = $request->input('NIC');
            $address = $request->input('address');
            $tel_no = $request->input('tel_no');
            $status = $request->input('status');

            DB::table('driver')
                ->where('driver_id', $driver_id)
                ->update(['fname' => $fname, 'lname' => $lname, 'licence_no' => $licence_no,
                    'NIC' => $NIC, 'address' => $address, 'tel_no' => $tel_no, 'status' => $status]);


            return Redirect::to('editdriver')->with('message', 'Driver details edited successfully!');
        }

        catch(Exception $e)
        {

            return Redirect::to('/editdriver')
                ->with(['exceptionerr' => 'Sorry you cannot edit the driver details. Please reload the page!']);


        }

    }


    public function edit_vehicle_packages(Request $request)
    {
        try {

            $package_id = $request->input('package_id');
            $package_name = $request->input('package_name');
            $package_price = $request->input('package_price');


            DB::table('vehicle_packages')
                ->where('package_id', $package_id)
                ->update(['package_name' => $package_name, 'package_price' => $package_price]);


            return Redirect::to('updatepackage')->with('message', 'Vehicle travelling package information edited successfully!');

        }
        catch(Exception $e)
        {

            return Redirect::to('/updatedriverlegal')
                ->with(['exceptionerr' => 'Sorry you cannot edit the vehicle travelling package details. Please reload the page!']);


        }


    }


    public function edit_driver_legal(Requests\ModalValidateUpdateDriverLegal $request)
    {
        try {

            $DLI_ID = $request->input('DLI_ID');
            $comment = $request->input('comment');


            DB::table('driver_legal')
                ->where('DLI_ID', $DLI_ID)
                ->update(['comment' => $comment]);


            return Redirect::to('updatedriverlegal')->with('message', 'Driver legal information edited successfully!');

        }
        catch(Exception $e)
        {

            return Redirect::to('/updatedriverlegal')
                ->with(['exceptionerr' => 'Sorry you cannot edit the driver legal details. Please reload the page!']);


        }


    }

    public function edit_vehicle_legal(Requests\ModalValidateUpdateVehicleLegal $request)
    {
        try {


            $VLI_ID = $request->input('VLI_ID');
            $comment = $request->input('comment');


            DB::table('vehicle_legal')
                ->where('VLI_ID', $VLI_ID)
                ->update(['comment' => $comment]);


            return Redirect::to('updatevehiclelegal')->with('message', 'Vehicle legal information edited successfully!');
        }
        catch(Exception $e)
        {

            return Redirect::to('/updatevehiclelegal')
                ->with(['exceptionerr' => 'Sorry you cannot edit the vehicle legal details. Please reload the page!']);


        }
    }



    //----------------------------------Transport Supervisor Delete Functions-------------------------------------------------


    public function remove_driver_details(Request $request)
    {

        try {
            $inputdata = $request->all();
            $driver_id = $inputdata['driver_id'];

            DB::table('driver')
                ->where('driver_id', $driver_id)
                ->delete();
            return Redirect::to('removedriver')->with('message', 'Driver deleted successfully!');

        }
        catch(Exception $e)
        {

            return Redirect::to('/removedriver')
                ->with(['exceptionerr' => 'Sorry you cannot remove the driver details. Please reload the page!']);


        }


    }

    public function remove_vehicle(Request $request)
    {
        try {


            $inputdata = $request->all();
            $vehicle_no = $inputdata['vehicle_no'];

            DB::table('vehicle')
                ->where('vehicle_no', $vehicle_no)
                ->delete();
            return Redirect::to('removevehicle')->with('message', 'Vehicle deleted successfully!');
        }

        catch(Exception $e)
        {

            return Redirect::to('/removevehicle')
                ->with(['exceptionerr' => 'Sorry you cannot delete the vehicle. It has been reserved!']);


        }

    }

    public function remove_vehicle_packages(Request $request)
    {
        try {


            $inputdata = $request->all();
            $package_id = $inputdata['package_id'];

            DB::table('vehicle_packages')
                ->where('package_id', $package_id)
                ->delete();
            return Redirect::to('updatepackage')->with('message1', 'Vehicle travelling package deleted successfully!');
        }

        catch(Exception $e)
        {

            return Redirect::to('/updatepackage')
                ->with(['exceptionerr' => 'Sorry you cannot delete the vehicle travelling package. Please reload the page!']);


        }

    }




    public function remove_driver_legal(Request $request)
    {
        try {
            $inputdata = $request->all();
            $DLI_ID = $inputdata['DLI_ID'];

            DB::table('driver_legal')
                ->where('DLI_ID', $DLI_ID)
                ->delete();
            return Redirect::to('updatedriverlegal')->with('message1', 'Driver legal information deleted successfully!');
        }

        catch(Exception $e)
        {

            return Redirect::to('/updatedriverlegal')
                ->with(['exceptionerr' => 'Sorry you cannot delete the driver legal details. Please reload the page!']);


        }

    }

    public function remove_vehicle_legal(Request $request)
    {
        try {
            $inputdata = $request->all();
            $VLI_ID = $inputdata['VLI_ID'];

            DB::table('vehicle_legal')
                ->where('VLI_ID', $VLI_ID)
                ->delete();
            return Redirect::to('updatevehiclelegal')->with('message1', 'Vehicle legal information deleted successfully!');
        }

        catch(Exception $e)
        {

            return Redirect::to('/updatevehiclelegal')
                ->with(['exceptionerr' => 'Sorry you cannot delete the vehicle legal details. Please reload the page!']);


        }

    }






    //----------------------------------Receptionist Edit Functions-------------------------------------------------

    public function edit_vehicle_bookings(Requests\ModalValidateUpdateBooking $request)
    {
        try{
       /* $vr_id = $request->input('vr_id');
        $guest_name = $request->input('guest_name');
        $res_id = $request->input('res_id');
        $tel_no = $request->input('tel_no');
        $date = $request->input('date');
        $service_date = $request->input('service_date');
        $service_time = $request->input('service_time');*/
        $vr_id = $request->input('vr_id');
        $package = $request->input('package');
        $package_price = $request->input('package_price');
     /*   $vehicle_no = $request->input('vehicle_no');
        $driver_name = $request->input('driver_name');*/

        DB::table('vehicle_reservation')
            ->where('vr_id', '=', $vr_id)
            ->update(['package'=>$package, 'package_price'=>$package_price]);


        return Redirect::to('updatebooking')->with ('message','Vehicle reservation edited successfully!');

        }

        catch(Exception $e)
        {

            return Redirect::to('/updatebooking')
                ->with(['exceptionerr' => 'Sorry you cannot edit the vehicle reservation. Please reload the page!']);


        }

    }

    function change_payment_status(Request $request)
    {

        $button = Input::get('btn');
        if ($button == 'credit')

        {
            $pp_id = $request->input('pp_id');
            DB::table('pending_pd_payment')
                ->where('pp_id',$pp_id)
                ->update(['status'=>"credit"]);
            return Redirect::to('creditpaymenthandling')->with ('message','Vehicle reservation payment credited successfully!');


        }

        else
        {
            $pp_id = $request->input('pp_id');
            DB::table('pending_pd_payment')
                ->where('pp_id',$pp_id)
                ->update(['status'=>"finalized"]);

            return Redirect::to('finalizedpaymenthandling')->with ('message','Vehicle reservation payment finalized successfully!');

        }


    }






    //----------------------------------Receptionist Delete Functions-------------------------------------------------

    public function remove_vehicle_bookings(Request $request)
    {
        try {
            $inputdata = $request->all();
            $vr_id = $inputdata['vr_id'];

            DB::table('vehicle_reservation')
                ->where('vr_id', $vr_id)
                ->delete();
            return Redirect::to('updatebooking')->with('message1', 'Vehicle reservation deleted successfully!');

        }

        catch (Exception $e) {

            return Redirect::to('/updatebooking')
                ->with(['exceptionerr' => 'Sorry you cannot remove the vehicle reservation. Please reload the page!']);


        }

    }
}

