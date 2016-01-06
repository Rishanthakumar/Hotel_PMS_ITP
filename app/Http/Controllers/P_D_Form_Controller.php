<?php

namespace App\Http\Controllers;

use App\vehicle_reservation;
use App\vehicle;
use App\driver;
use App\Vehicle_Packages;
use App\vehicle_legal;
use App\driver_legal;
use App\member;
use App\pending_pd_payment;
use Hamcrest\Core\IsNull;
use Illuminate\Support\Facades\Input;
use Session;
use DB;
use Auth;
use Illuminate\Support\Facades\Validator;
use Exception;

use Illuminate\Support\Facades\Redirect;
use Request;

use Carbon\Carbon;

use App\Http\Requests;
use App\Http\Controllers\Controller;


class P_D_Form_Controller extends Controller
{
    //--------------------------------------------Receptionist Form Inputs---------------------------------------------------



    function store_vehicle_reservation(Requests\AddDriverValidator $request)
    {
        try{

        $input = $request->all();
        $vehicle_reservation = new vehicle_reservation();

        $vehicle_reservation->res_id = $input ['res_id'];
        $vehicle_reservation->mem_id = $input ['mem_id'];
        $vehicle_reservation->date = Carbon::now();
        $vehicle_reservation->service_date = session('date');
        $vehicle_reservation->package = $input ['package'];
        $vehicle_reservation->package_price = $input ['package_price'];
        $vehicle_reservation->vehicle_no = $input ['vehicle_no'];
        $vehicle_reservation->driver_name = $input ['driver_name'];
        $vehicle_reservation->service_time = session('time');
        $vehicle_reservation->guest_name = $input ['guest_name'];
        $vehicle_reservation->tel_no = $input ['tel_no'];
        $vehicle_reservation->status = "pending";

        $vehicle_reservation->save();
        Session::forget('date');
        Session::forget('time');

        //sending sms alert
        $number = $input ['tel_no'];
        $message = "'Your vehicle reservation has been confirmed. \nDate : ".$vehicle_reservation->service_date." \nTime : ".$vehicle_reservation->service_time." \nVehicle No : ".$input ['vehicle_no']." \nPackage : ".$input ['package']." \nPackage Price : ".$input ['package_price']." \nEnjoy your stay at Amaya Resorts & Spas! \nhttps://www.amayaresorts.com/ '";
        $cmd_string = "sendsms ".$number." ".$message;
        shell_exec("/etc/init.d/sms3 restart");
        shell_exec($cmd_string);

        return Redirect::to('updatebooking')->with('message', 'New vehicle reservation successfully added! SMS sent!');
    }

        catch (Exception $e) {

        return Redirect::to('/addbooking')
        ->with(['exceptionerr' => 'Sorry you cannot add the vehicle reservation. Check the service date and time!']);


}
}



    function finalize_vehicle_reservation(Requests\FinalizeBookingsValidator $request)
    {
        try {
            $input = $request->all();
            $pending_pd_payment = new pending_pd_payment();

            $pending_pd_payment->vr_id = $input ['v_res_id'];
            $pending_pd_payment->res_id = $input ['res_id'];
            $pending_pd_payment->mem_id = $input ['mem_id'];
            $pending_pd_payment->package = $input ['package'];
            $pending_pd_payment->package_price = $input ['package_price'];
            $pending_pd_payment->additional_charge = $input ['additional'];
            $pending_pd_payment->total_amount = $input ['total_price'];
            $pending_pd_payment->status = "pending";

            $pending_pd_payment->save();


            $button = Input::get('btn');
            if ($button == 'submit') {


                DB::table('vehicle_reservation')
                    ->where('vr_id', $input ['v_res_id'])
                    ->update(['status' => "finalized"]);

            }

            return Redirect::to('pendingpaymenthandling')->with('message', 'Vehicle reservation payment added successfully!');
        }

        catch (Exception $e) {

                return Redirect::to('/finalizebooking')
                    ->with(['exceptionerr' => 'Sorry you cannot finalize the vehicle reservation. Please reload the page!']);


            }


    }


    function check_availability(Requests\CheckAvailabilityValidate $request){

        $input = Request::all();

        $service_date = $input ['service_date'];
        $service_time = $input ['service_time'];


            $id= DB::table('vehicle')

                ->whereNotIn('vehicle_no',function($query)
            { $input = Request::all();
                $service_date = $input ['service_date'];
                $query->select('vehicle_no')
                    ->from('vehicle_reservation')
                    ->where('service_date', '=',$service_date)
                    ->where('status','!=','finalized');
            })
                ->get();

        $id1= DB::table('driver')

            ->whereNotIn('fname',function($query)
            { $input = Request::all();
                $service_date = $input ['service_date'];
                $query->select('driver_name')
                    ->from('vehicle_reservation')
                    ->where('service_date', '=',$service_date)
                    ->where('status','!=','finalized');
            })
            ->get();



        Session::put('available_vehicles',$id);
        Session::put('available_drivers',$id1);
        Session::put('date',$service_date);
        Session::put('time',$service_time);



        if($id==null||$id1==null) {
            return Redirect::to('addbooking')->with(['vehiclesnotavailable'=> 'No vehicles are available on the selected date!','driversnotavailable1'=> 'No drivers are available on the selected date!']);
        }



        else
        {
            return Redirect::to('addbooking')->with('available', 'Vehicles and drivers are available on the selected date!');
        }



    }



    function add_customer()
    {
        try {
            $input = Request::all();


            $cus_id = $input['cus_id'];

            $res_id = DB::table('reservation')//Adding values from the table to the reservation form
            ->where('cus_id', '=', $cus_id)
                ->where('check_in', '<=', Carbon::now())
                ->max('res_id');                        //To check whether it is a current reservation

            $mem_id = $input ['mem_id'];

            $guest_name = $input['guest_name']; //Adding values from the table to the reservation form
            $tel_no = $input['tel_no']; //Adding values from the table to the reservation form

            Session::put(['g_name' => $guest_name, 't_no' => $tel_no, 'res_id' => $res_id, 'm_id' => $mem_id]);

            return Redirect('/addbooking');

        }
        catch (Exception $e) {

            return Redirect::to('/getprofile')
                ->with(['exceptionerr' => 'Sorry you cannot add the customer. Please reload the page!']);


        }
    }

    function finalize_reservation(Request $request)
    {

        try {
            $input = Request::all();


            $res_id = $input['res_id']; //Adding values from the table to the reservation form //////
            // here $input['res_id'] means the name you declared inside the Update booking table's Finalize button
            $mem_id = $input['mem_id']; //Adding values from the table to the reservation form
            $vr_id = $input['v_res_id']; //Adding values from the table to the reservation form
            $vehicle_no = $input['vehicle_no']; //Adding values from the table to the reservation form
            $package = $input['package']; //Adding values from the table to the reservation form
            $package_price = $input['package_price']; //Adding values from the table to the reservation form

            Session::put(['res_id' => $res_id, 'v_id' => $vr_id, 'veh_no' => $vehicle_no, 'pack' => $package, 'm_id' => $mem_id,'pack_price'=>$package_price]); //session names are in green colour


            return Redirect('/finalizebooking');

        }

        catch (Exception $e) {

            return Redirect::to('/updatebooking')
                ->with(['exceptionerr' => 'Sorry you cannot add the booking. Please reload the page!']);


        }
    }


    //-------------------------------------------Receptionist Table Views----------------------------------------------------

    function update_booking()
    {
        $vehicle_reservations = vehicle_reservation::where ('status','=','pending')->get();

        $drivers = driver::where ('status','=','Available')->get();

        $vehicles = vehicle::where ('status','=','Available')->get();

        $vehicle_packages = vehicle_packages::all();

        return view('Pick-up_&_Drop-off_System_Views.P & D-Receptionist.Update V Bookings', compact(['drivers','vehicles','vehicle_reservations','vehicle_packages']));
    }

    function pending_payment_handling()
    {
        $pending_pd_payments = pending_pd_payment::where ('status','=','Pending')->get();

        return view('Pick-up_&_Drop-off_System_Views.P & D-Receptionist.P&D Pending Payment Details', compact('pending_pd_payments'));
    }

    function credit_payment_handling()
    {
        $pending_pd_payments = pending_pd_payment::where ('status','=','Credit')->get();

        return view('Pick-up_&_Drop-off_System_Views.P & D-Receptionist.P&D Credit Payment Details', compact('pending_pd_payments'));
    }

    function finalized_payment_handling()
    {
        $pending_pd_payments = pending_pd_payment::where ('status','=','Finalized')->get();

        return view('Pick-up_&_Drop-off_System_Views.P & D-Receptionist.P&D Finalized Payment Details', compact('pending_pd_payments'));
    }


    function view_bookings()
    {
        $vehicle_reservations = vehicle_reservation::all();

        return view('Pick-up_&_Drop-off_System_Views.P & D-Receptionist.View V Bookings',compact('vehicle_reservations'));
    }

    function view_vehicles()
    {
        $vehicles = vehicle::where ('status','=','Available')->get();

        return view('Pick-up_&_Drop-off_System_Views.P & D-Receptionist.Available Vehicles', compact('vehicles'));
    }

    function view_drivers()
    {
        $drivers = driver::where ('status','=','Available')->get();

        return view('Pick-up_&_Drop-off_System_Views.P & D-Receptionist.Available Drivers', compact('drivers'));
    }

    function get_profile()
    {
        Session::put(['reserve'=>'has']);

        $members = member::all();

        return view('Pick-up_&_Drop-off_System_Views.P & D-Receptionist.Get Profile', compact('members'));
    }













    //-------------------------------------------Transport Supervisor Form Inputs--------------------------------------------

    function store_vehicles(Requests\AddVehicleValidator $request)
    {

        try {

            $input = $request->all();
            $vehicle = new vehicle();

            $vehicle->vehicle_no = $input ['vehicle_no'];
            $vehicle->vehicle_type = $input ['vehicle_type'];
            $vehicle->brand = $input ['brand'];
            $vehicle->model = $input ['model'];
            $vehicle->colour = $input ['colour'];
            $vehicle->registration_date = $input ['reg_date'];
            $vehicle->cylinder_capacity = $input ['cylinder_capacity'];
            $vehicle->manufactured_year = $input ['manu_year'];
            $vehicle->rate_per_km = $input ['rate_per_km'];
            $vehicle->status = $input ['status'];


            $vehicle->save();

            return Redirect::to('editvehicle')->with('message', 'New vehicle successfully added!');

        }

        catch (Exception $e) {

            return Redirect::to('/addvehicle')
                ->with(['exceptionerr' => 'Sorry you cannot add the vehicle. Please reload the page!']);


        }




    }

    function store_drivers(Requests\AddVehicleBookingValidator $request)
    {

        try {

            $input = $request->all();
            $driver = new driver();

            $driver->fname = $input ['fname'];
            $driver->lname = $input ['lname'];
            $driver->licence_no = $input ['licence_no'];
            $driver->NIC = $input ['NIC'];
            $driver->address = $input ['address'];
            $driver->tel_no = $input ['tel_no'];
            $driver->status = $input ['status'];


            $driver->save();

            return Redirect::to('editdriver')->with('message', 'New driver successfully added!');

        }

        catch (Exception $e) {

            return Redirect::to('/adddriver')
                ->with(['exceptionerr' => 'Sorry you cannot add the vehicle. Please reload the page!']);


        }


    }

    function store_travelling_packages(Requests\AddVehiclePackageValidator $request)
    {

        try {

            $input = $request->all();
            $Vehicle_Packages = new Vehicle_Packages();

            $Vehicle_Packages->package_name = $input ['package_name'];
            $Vehicle_Packages->package_price = $input ['package_price'];

            $Vehicle_Packages->save();

            return Redirect::to('updatepackage')->with('message', 'New vehicle travelling package successfully added!');

        }

        catch (Exception $e) {

            return Redirect::to('/addpackage')
                ->with(['exceptionerr' => 'Sorry you cannot add the vehicle travelling package. Please reload the page!']);


        }


    }


    function store_vehicle_legal(Requests\VehicleLegalValidator $request)
    {
        try {
            $input = $request->all();
            $vehicle_legal = new vehicle_legal ();


            $vehicle_legal->vehicle_no = $input ['vehicle_no'];
            $vehicle_legal->comment = $input ['comment'];
            $vehicle_legal->attachement = $input ['attachement'];


            $vehicle_legal->save();

            return Redirect::to('viewvehiclelegal')->with('message', 'New vehicle legal information successfully added!');

        }

        catch (Exception $e) {

            return Redirect::to('/addvehiclelegal')
                ->with(['exceptionerr' => 'Sorry you cannot add the vehicle legal information. Please reload the page!']);


        }
    }

    function store_driver_legal(Requests\DriverLegalValidator $request)
    {
        try {

            $rules = array(
                'attachement' => 'required|mimes:png,jpg,jpeg,pdf',
            );

            $validator = Validator::make(Input::all(), $rules);
            if ($validator->fails()) {

                return Redirect::to('/adddriverlegal')->withErrors($validator);
            } else {
                if (Input::hasFile('attachement')) {

                    $input = $request->all();
                    $driver_legal = new driver_legal ();


                    $f = Input::file('attachement');
                    /*$ID = Auth::id();
                    $driver_legal->DLI_ID = $ID;*/
                    $driver_legal->driver_id = $input ['driver_id'];
                    $driver_legal->driver_name = $input ['driver_name'];
                    $driver_legal->comment = $input ['comment'];
                    $driver_legal->attachement = base64_encode(file_get_contents($f->getRealPath()));
                    $driver_legal->save();


                    return Redirect::to('viewdriverlegal')->with('message', 'New driver legal information successfully added!');

                }
            }
        }

            catch (Exception $e) {

            return Redirect::to('/adddriverlegal')
                ->with(['exceptionerr' => 'Sorry you cannot add the driver legal information. Please reload the page!']);

        }
    }


        //--------------------------------------------Transport Supervisor Table Views-------------------------------------------


        function edit_vehicles()
        {
            $vehicles = vehicle::all();

            return view('Pick-up_&_Drop-off_System_Views.P & D-Admin.Edit vehicle details', compact('vehicles'));
        }

        function remove_vehicles()
        {
            $vehicles = vehicle::where('status', '=', 'Available')->get();

            return view('Pick-up_&_Drop-off_System_Views.P & D-Admin.Remove vehicles', compact('vehicles'));
        }

        function edit_drivers()
        {
            $drivers = driver::all();

            return view('Pick-up_&_Drop-off_System_Views.P & D-Admin.Edit driver details', compact('drivers'));
        }

        function remove_drivers()
        {
            $drivers = driver::where('status', '=', 'Available')->get();

            return view('Pick-up_&_Drop-off_System_Views.P & D-Admin.Remove driver details', compact('drivers'));
        }

        function view_vehicle_legal()
        {
            $vehicle_legals = vehicle_legal::all();
            return view('Pick-up_&_Drop-off_System_Views.P & D-Admin.View V legal info', compact('vehicle_legals'));
        }

        function view_driver_legal()
        {
            $driver_legals = driver_legal::all();
            return view('Pick-up_&_Drop-off_System_Views.P & D-Admin.View D legal info', compact('driver_legals'));
        }

        function update_travelling_packages()
        {
            $vehicle_packages = vehicle_packages::all();
            return view('Pick-up_&_Drop-off_System_Views.P & D-Admin.Update travelling packages', compact('vehicle_packages'));
        }

        function update_vehicle_legal()
        {
            $vehicle_legals = vehicle_legal::all();
            return view('Pick-up_&_Drop-off_System_Views.P & D-Admin.Update V legal info', compact('vehicle_legals'));
        }

        function update_driver_legal()
        {
            $driver_legals = driver_legal::all();
            return view('Pick-up_&_Drop-off_System_Views.P & D-Admin.Update D legal info', compact('driver_legals'));
        }

        function generate_vehicle_reservation_reports()
        {
            $vehicle_reservations = vehicle_reservation::all();
            return view('Pick-up_&_Drop-off_System_Views.P & D-Admin.Generate vehicle reservation reports', compact('vehicle_reservations'));
        }

        function generate_vehicle_reports()
        {
            $vehicles = vehicle::all();
            return view('Pick-up_&_Drop-off_System_Views.P & D-Admin.Generate vehicle reports', compact('vehicles'));
        }

        function generate_driver_reports()
        {
            $drivers = driver::all();
            return view('Pick-up_&_Drop-off_System_Views.P & D-Admin.Generate driver reports', compact('drivers'));
        }





}
