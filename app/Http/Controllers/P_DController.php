<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vehicle_Packages;
use App\driver;
use App\vehicle;
use App\vehicle_reservation;
use DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;


class P_DController extends Controller
{
    public function Login()
    {
        return view('Pages.Panel');

    }
    //---------------------------------Receptionist linking functions----------------------------------------------------------

    public function WelcomeReceptionist(){


        return view('Pick-up_&_Drop-off_System_Views.P & D-Receptionist.First View');
    }

    public function WelcomeSupervisor(){


        return view('Pick-up_&_Drop-off_System_Views.P & D-Admin.FirstView');
    }

    public function AddVBooking(){



        $vehicle_packages = vehicle_packages::all();

        return view('Pick-up_&_Drop-off_System_Views.P & D-Receptionist.Add V Booking', compact(['vehicle_packages']));
    }

    public function FinalizeVBooking(){


        return view('Pick-up_&_Drop-off_System_Views.P & D-Receptionist.Finalize V Bookings');
    }

    public  function P_D_PendingPaymentHandling()
    {

        return view('Pick-up_&_Drop-off_System_Views.P & D-Receptionist.P&D Pending Payment Details');
    }

    public  function P_D_CreditPaymentHandling()
    {

        return view('Pick-up_&_Drop-off_System_Views.P & D-Receptionist.P&D Credit Payment Details');
    }

    public  function P_D_FinalizedPaymentHandling()
    {

        return view('Pick-up_&_Drop-off_System_Views.P & D-Receptionist.P&D Finalized Payment Details');
    }

    public function UpdateVBooking(){

        $vehicle_packages = vehicle_packages::all();
        return view('Pick-up_&_Drop-off_System_Views.P & D-Receptionist.Update V Bookings', compact(['vehicle_packages']));
    }

    public function AvailableVehicles(){


        return view('Pick-up_&_Drop-off_System_Views.P & D-Receptionist.Available Vehicles');
    }

    public function AvailableDrivers(){


        return view('Pick-up_&_Drop-off_System_Views.P & D-Receptionist.Available Drivers');
    }

    public function LogOut(){


        return view('Pages.Login');
    }




    //-------------------------------Transport Supervisor linking functions---------------------------------------------------


    public function AddVehicle(){


        return view('Pick-up_&_Drop-off_System_Views.P & D-Admin.Add new vehicle');
    }

    public function EditVehicle(){


        return view('Pick-up_&_Drop-off_System_Views.P & D-Admin.Edit vehicle details');
    }

    public function RemoveVehicle(){


        return view('Pick-up_&_Drop-off_System_Views.P & D-Admin.Remove vehicles');
    }

    public function AddDriver(){


        return view('Pick-up_&_Drop-off_System_Views.P & D-Admin.Add new driver');
    }

    public function EditDriver(){


        return view('Pick-up_&_Drop-off_System_Views.P & D-Admin.Edit driver details');
    }

    public function RemoveDriver(){


        return view('Pick-up_&_Drop-off_System_Views.P & D-Admin.Remove driver details');
    }

    public function AddVehiclePackage(){


        return view('Pick-up_&_Drop-off_System_Views.P & D-Admin.Add new travelling package');
    }

    public function UpdateVehiclePackage(){


        return view('Pick-up_&_Drop-off_System_Views.P & D-Admin.Update travelling packages');
    }

    public function AddVehicleLegal(){


        $vehicles = vehicle::all();

        return view('Pick-up_&_Drop-off_System_Views.P & D-Admin.Add new V legal info', compact('vehicles'));
    }

    public function AddDriverLegal(){

        $drivers = driver::all();

        return view('Pick-up_&_Drop-off_System_Views.P & D-Admin.Add new D legal info', compact('drivers'));
    }

    public function ViewVehicleLegal(){


        return view('Pick-up_&_Drop-off_System_Views.P & D-Admin.View V legal info');
    }

    public function ViewDriverLegal(){


        return view('Pick-up_&_Drop-off_System_Views.P & D-Admin.View D legal info');
    }

    public function UpdateVehicleLegal(){


        return view('Pick-up_&_Drop-off_System_Views.P & D-Admin.Update V legal info');
    }

    public function UpdateDriverLegal(){


        return view('Pick-up_&_Drop-off_System_Views.P & D-Admin.Update D legal info');
    }

    public function GenerateVehicleReservationReports(){


        return view('Pick-up_&_Drop-off_System_Views.P & D-Admin.Generate vehicle reservation reports');
    }


    public function GenerateVehicleReports(){


        return view('Pick-up_&_Drop-off_System_Views.P & D-Admin.Generate vehicle reports');
    }

    public function GenerateDriverReports(){


        return view('Pick-up_&_Drop-off_System_Views.P & D-Admin.Generate driver reports');
    }


}
