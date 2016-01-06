<?php

namespace App\Http\Controllers;

use App\reservation;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\member;
use App\company;
use App\travel;
use App\changes_log;
use App\individual;
use App\customer;
use App\reservations;
use DB;
use Illuminate\Support\Facades\Input;

class Guest_Profile_PagesController extends Controller
{
    function viewmainpage(){

        return view('Profile_Management.Guest_Profile_Management_Main');
    }

    function viewpreferences()
    {
        return view('Profile_Management.Guest_Profile_Preferences');

    }

    function viewchangeslog(){

        return view('Profile_Management.Guest_Profile_Changes_Log');
    }

    function viewfuturereservations(){
        return view('Profile_Management.Guest_Profile_Future_Reservations');

    }

    function pastreservation(){
        return view('Profile_Management.Guest_Profile_Past_Reservations');
    }

    function viewmergeprofile(){
        return view('Profile_Management.Guest_Profile_Merge_Profile');

    }

    function viewrelationship(){

        return view('Profile_Management.Guest_Profile_Relationship');

    }
    function preferenceslist(){

        return view('Profile_Management.Guest_Profile_Preferences_List');

    }


    function viewmemberlist(){

        $members = member::all();
        return view('Profile_Management.Guest_Profile_Member_List',compact('members'));
    }

    function viewcreatemember(){
        return view('Profile_Management.Guest_Profile_Create_New_Member_Profile');

    }

    public  function viewchanges(){

        $changes_log=changes_log::all();
        return view('Profile_Management.Guest_Profile_Changes_Log',compact('changes_log'));

    }

    public function searchrelation(){

        $type=Input::get('stype');
        $agent_id=Input::get('agent');
        $ind_id=Input::get('ind');
        $cmp_id=Input::get('company');


        if($type=='agent'){
            $result=DB::table('travel_agent')->join('customer','customer.cus_id','=','travel_agent.cus_id')->join('member','member.cus_id','=','travel_agent.cus_id')->select('customer.name','member.fname','member.lname')->where('travel_agent.cus_id','=',$agent_id)->get();

        }
        else if($type=='company'){
            $result=DB::table('company')->join('customer','customer.cus_id','=','company.cus_id')->join('member','member.cus_id','=','company.cus_id')->select('customer.name','member.fname','member.lname')->where('company.cus_id','=',$agent_id)->get();

        }
        else if($type=='indi'){
            $result=DB::table('individual')->join('customer','customer.cus_id','=','individual.cus_id')->join('member','member.cus_id','=','individual.cus_id')->select('customer.name','member.fname','member.lname')->where('individual.cus_id','=',$ind_id)->get();


        }

        $companys=DB::table('company')->join('customer','customer.cus_id','=','company.cus_id')->select('customer.name','customer.cus_id')->get();

        $individuals=DB::table('individual')->join('customer','customer.cus_id','=','individual.cus_id')->select('customer.name','customer.cus_id')->get();

        $travels=DB::table('travel_agent')->join('customer','customer.cus_id','=','travel_agent.cus_id')->select('customer.name','customer.cus_id')->get();


        return view('Profile_Management.Guest_Profile_Relationship',compact('companys','individuals','travels','result'));

    }

    public function viewrelationtra(){
        $companys=DB::table('company')->join('customer','customer.cus_id','=','company.cus_id')->select('customer.name','customer.cus_id')->get();

        $individuals=DB::table('individual')->join('customer','customer.cus_id','=','individual.cus_id')->select('customer.name','customer.cus_id')->get();

        $travels=DB::table('travel_agent')->join('customer','customer.cus_id','=','travel_agent.cus_id')->select('customer.name','customer.cus_id')->get();


        return view('Profile_Management.Guest_Profile_Relationship',compact('companys','individuals','travels'));
    }


    public function viewmergetable(){
        //$individual=individual::all();

        $users = DB::table('customer')
            ->join('individual','individual.cus_id','=','customer.cus_id')
            ->select('individual.cus_id','individual.fname','individual.lname','individual.NIC_passport','individual.passport','individual.title','individual.date_of_birth',DB::raw('count(*) as total'))
            ->groupBy('individual.lname','individual.fname','individual.date_of_birth')->having('total','>',1)->get();

        foreach($users as $user){
            $profile2=DB::table('customer')
                ->join('individual','individual.cus_id','=','customer.cus_id')
                ->select('individual.cus_id','individual.fname','individual.lname','individual.NIC_passport','customer.address','customer.email','individual.passport','individual.title','individual.date_of_birth','customer.contact_no')
                //->where('individual.fname','=',$user->fname)->where('individual.fname','=',$user->lname)
               // ->where('individual.cus_id','<>',$user->cus_id)
                ->get();



            ///  DB::table('reservation')

               // ->where('cus_id','=',$users)
               // ->update(['cus_id'=>$profile2]);



        }


        return view('Profile_Management.Guest_Profile_Merge_Profile',compact('users','profile2'));
    }
    public  function viewguestid(){

        $g_id=DB::table('member')->select('mem_id')->get();
        return view('Profile_Management.Guest_Profile_Preferences',compact('g_id'));
    }

    //public function viewreservedmember(){

    //}

    public  function viewreservationid(){

        $res_id=Input::get('reservation');

        if($res_id!=""){
            $member=DB::table('res_id_cus_id_mem_id_room_no')
                ->join('member','member.mem_id','=','res_id_cus_id_mem_id_room_no.mem_id')
                ->select('member.mem_id','member.fname','member.lname')
                ->where('res_id_cus_id_mem_id_room_no.res_id','=',$res_id)
                ->get();
            foreach($member as $mem) {
                $preference = DB::table('preference')
                    ->select('general_preferences', 'alergy_details', 'special_requirements')
                    ->where('mem_id', '=', $mem->mem_id)
                    ->get();
            }
        }

        $ldate = date('Y-m-d H:i:s');
        $rid=DB::table('reservation')->select('res_id')->where('status','=','confirmed')->orWhere('status','=','tentative')->orWhere('status','=','Checked-In')->get();
        return view('Profile_Management.Guest_Profile_Preferences_List',compact('rid','member','preference'));
    }

    public  function viewmemberid(){

        $g_id=DB::table('customer')->select('cus_id')->get();
        return view('Profile_Management.Guest_Profile_Create_New_Member_Profile',compact('g_id'));
    }



    function viewindividual()
    {

        $individual = DB::table('customer')
            ->join('individual','individual.cus_id','=','customer.cus_id')
            ->select('individual.cus_id','individual.fname','individual.date_of_birth','individual.lname','individual.NIC_passport','customer.address','customer.lane1','customer.lane2','customer.city','customer.country','individual.passport','customer.lane2','customer.country','individual.title','customer.address','customer.email','customer.contact_no')
            ->get();

        return view('Profile_Management.Guest_Profile_Individual_List',compact('individual'));
    }
    public function futurereservation()
    {

        $ldate = date('Y-m-d H:i:s');

        $reservation=DB::table('customer')
            ->join('reservation','reservation.cus_id','=','customer.cus_id')
            ->select('reservation.cus_id','reservation.res_id','reservation.date','reservation.check_out','reservation.check_in','reservation.adults','reservation.children','reservation.no_of_rooms','customer.address','customer.name','customer.contact_no')
            ->where('check_in','>',$ldate)
        ->get();



        return view('Profile_Management.Guest_Profile_Future_Reservations',compact('reservation'));
    }
    public function pastreservationview(){

        $ldate = date('Y-m-d H:i:s');
        $resp=DB::table('customer')
        ->join('reservation','reservation.cus_id','=','customer.cus_id')
        ->select('reservation.cus_id','reservation.res_id','reservation.date','reservation.check_out','reservation.check_in','reservation.adults','reservation.children','reservation.no_of_rooms','customer.address','customer.name','customer.contact_no')
        ->where('check_in','<',$ldate)
        ->get();
        return view('Profile_Management.Guest_Profile_Past_Reservations',compact('resp'));
    }

    function viewcreateindividual(){

        return view('Profile_Management.Guest_Profile_Create_New_Individual_Profile');

    }

    function viewcompanylist()
    {

        $company = DB::table('customer')
            ->join('company','company.cus_id','=','customer.cus_id')
            ->select('company.cus_id','customer.name','customer.address','customer.email','customer.contact_no','customer.lane1','customer.lane2','customer.city')
            ->get();

        return view('Profile_Management.Guest_Profile_Company_List',compact('company'));
    }

    function viewcreatecompany()
    {
        return view('Profile_Management.Guest_Profile_Create_New_Company_Profile');

    }

    function viewtravellist(){

        $travel_agent = DB::table('customer')
            ->join('travel_agent','travel_agent.cus_id','=','customer.cus_id')
            ->select('travel_agent.cus_id','customer.name','customer.address','customer.email','customer.contact_no','customer.lane1','customer.lane2','customer.city')
            ->get();

        return view('Profile_Management.Guest_Profile_Travel_Agent_List',compact('travel_agent'));

    }

    function viewcreatetravelagent(){
        return view('Profile_Management.Guest_Profile_Create_New_Travel_Agent_Profile');


    }

}
