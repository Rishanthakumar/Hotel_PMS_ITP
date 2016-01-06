<?php
/**
 * Created by PhpStorm.
 * User: Udayanga
 * Date: 8/15/2015
 * Time: 10:42 AM
 */

namespace App\Http\Controllers;
use App\changes_log;
use App\copanynave;
use App\Http\Requests;


use App\Http\Controllers\Controller;
use Exception;
use App\individual;
use DB;
use App\preferences;
use Request;
use App\task;
use App\customer;
use Auth;
use cust;
use App\member;
use App\travel;
use App\company;
use App\documents;
use App\newprofile;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use validatecompany;
use App\duplicate;
use Illuminate\Support\Facades\Redirect;
use App\traveldelete;


class Guest_Profile_Controller extends Controller
{



    //New preferences save

    public function addPreference()
    {
        $input = Request::all();

        try {
            $input = Request::all();

            $preferences = new preferences;
            $preferences->mem_id = $input['mid'];
            $preferences->general_preferences = $input ['general_information'];
            $preferences->alergy_details = $input ['allergy_information'];
            $preferences->special_requirements = $input ['special_information'];


            $preferences->save();

            return redirect('/guest_profile')
                ->with('succ_status', 'Successfully Added');
        } catch (Exception $e) {
            return redirect('/guest_profile')
                ->with('error_status', 'You have errors in your last request please try again');
        }

    }


    public function addmemberprofile(Requests\member $request)

    {
        try {

            $input = Request::all();

            $memberprofile = new member;

            $memberprofile->cus_id = $input['customer_id'];
            $memberprofile->fname = $input ['first_name'];
            $memberprofile->lname = $input ['last_name'];
            $memberprofile->contact_no = $input ['telephone_number'];
            $memberprofile->NIC_Passport = $input ['nic_passport'];

            $memberprofile->save();

            $changelog = new changes_log;
            $changelog->user = 'Chathura';
            $changelog->action_type = 'Add Member';
            $changelog->description='New member added for '.$memberprofile->fname." ".$memberprofile->lname;
            $changelog->save();


            return redirect('/guest_profile/member_list')
                ->with('succ_status', 'Successfully Added');
        }
        catch (Exception $e) {
            return redirect('/guest_profile/member_list/create')
                ->with(['exception' => 'You cannot add the Travel Agent.Please Chack you NIC and Contact No!']);
        }
    }



    public function addIndividual(Requests\profilevalidate $request)


    {
        try {

            //$input = $request->all();

            $customer = new customer;
            $customer->address = Input::get('address');
            $customer->lane1 = Input::get('lane1');
            $customer->lane2 = Input::get('lane2');
            $customer->country = Input::get('country');
            $customer->email = Input::get('email');
            $customer->contact_no = Input::get('telephone_number');
            $customer->name = Input::get('first_name');
            $customer->city = Input::get('city');
            $customer->save();


            $individual = new individual;
            $individual->cus_id = $customer->cus_id;
            $individual->title = Input::get('title_ti');
            $individual->fname = Input::get('first_name');
            $individual->lname = Input::get('last_name');
            $individual->NIC_passport = Input::get('nic_passport');
            $individual->passport = Input::get('passport_id');
            $individual->date_of_birth=Input::get('bday');
            $individual->save();


            $changelog = new changes_log;
            $changelog->user = 'Chathura';
            $changelog->action_type = 'Add Individual';
            $changelog->description='New individual added for '.$individual->fname." ".$individual->lname;
            $changelog->save();


            return Redirect('/guest_profile/individual_list')
                ->with('succ_status', 'Successfully Added');

        } catch (Exception $e) {
            return redirect('/guest_profile/individual_list/create')
                ->with(['exception' => 'You cannot add the Individual.Please Chack you NIC, Passport,E-maile and Contact No']);

        }
    }

    function Editprofile(Requests\validateindividual $request)
    {

      try {

          $cusid = Input::get('cus_id');
          $title = Input::get('title_ti');
          $fname = Input::get('fname');
          $lname = Input::get('lname');
          $tno = Input::get('tno');
          $passport = Input::get('passport');
          $address = Input::get('address');
          $lane1 = Input::get('lane1');
          $lane2 = Input::get('lane2');
          $city = Input::get('city');
          $email = Input::get('email');
          $NIC = Input::get('NIC');
          $country = Input::get('country');


          DB::table('customer')
              ->where('cus_id', '=', $cusid)
              ->update(['contact_no' => $tno, 'address' => $address, 'lane1' => $lane1, 'lane2' => $lane2, 'city' => $city, 'email' => $email, 'name' => $fname, 'country' => $country]);


          DB::table('individual')
              ->where('cus_id', '=', $cusid)
              ->update(['fname' => $fname, 'lname' => $lname, 'NIC_passport' => $NIC, 'title' => $title, 'passport' => $passport,]);

          $changelog = new changes_log;
          $changelog->user = 'Chathura';
          $changelog->action_type = 'Edit Individual';
          $changelog->description = 'Profile edited for ' . $fname . " " . $lname;
          $changelog->save();

          return redirect('/guest_profile/individual_list')
              ->with('succ_status', 'Successfully Updated');
      }
      catch (Exception $e) {
        return redirect('/guest_profile/individual_list')
            ->with(['exception' => 'You cannot add the Individual.Please Chack you NIC, Passport,E-maile and Contact No']);

      }

    }

    public function editcompany(Requests\validatecompany $request)
    {
        try {

            $cusid = Input::get('cusid');
            $cmpname = Input::get('fname');
            $cmpaddress = Input::get('address');
            $cmpemail = Input::get('email');
            $cmptno = Input::get('tno');
            $lane1 = Input::get('lane1');
            $lane2 = Input::get('lane2');
            $city = Input::get('city');

            DB::table('customer')
                ->where('cus_id', '=', $cusid)
                ->update(['name' => $cmpname, 'address' => $cmpaddress, 'email' => $cmpemail, 'contact_no' => $cmptno, 'lane1' => $lane1, 'lane2' => $lane2, 'city' => $city]);


            DB::table('company')
                ->where('cus_id', '=', $cusid)
                ->update(['cus_id' => $cusid]);

            $changelog = new changes_log;
            $changelog->user = 'Chathura';
            $changelog->action_type = 'Edit Company';
            $changelog->description = $cmpname . ' details edited';
            $changelog->save();

            return redirect('/guest_profile/company_list')
                ->with('succ_status', 'Successfully Updated');

        } catch (Exception $e) {
            return redirect('/guest_profile/individual_list')
                ->with(['exception' => 'You cannot add the Company.Please Chack you NIC, Passport,E-maile and Contact No']);


        }
    }
    function mergeprofile()
    {
        $old_cus_id= Input::get('oldcus_id');
        $new_cus_id=Input::get('newcus_id');

        $old_fname=Input::get('oldfname');
        $old_lname=Input::get('oldlname');
        $old_nic=Input::get('oldNIC');
        $old_pass=Input::get('oldpass');
        $old_title=Input::get('oldtitle');
        $old_dob=Input::get('olddob');



        DB::table('reservation')
            ->where('cus_id','=',$old_cus_id)
            ->update(['cus_id'=>$new_cus_id]);

        $duplicate=new duplicate();
        $duplicate->cus_id=$old_cus_id;
        $duplicate->lname=$old_lname;
        $duplicate->nic=$old_nic;
        $duplicate->passport=$old_pass;
        $duplicate->title=$old_title;
        $duplicate->dob=$old_dob;
        $duplicate->save();

        DB::table('individual')
            ->where('cus_id','=',$old_cus_id)
            ->delete();

        return redirect('/guest_profile/mergeprofile')
            ->with('succ_status', 'Successfully Updated');

    }

    public function edittravel(Requests\validatetravel $request)
    {
        try {

            $cusid = Input::get('cusid');
            $traname = Input::get('lname');
            $traaddress = Input::get('address');
            $traemail = Input::get('email');
            $tratno = Input::get('contact_no');
            $lane1 = Input::get('lane1');
            $lane2 = Input::get('lane2');
            $city = Input::get('city');

            DB::table('customer')
                ->where('cus_id', '=', $cusid)
                ->update(['name' => $traname, 'address' => $traaddress, 'email' => $traemail, 'contact_no' => $tratno, 'lane1' => $lane1, 'lane2' => $lane2, 'city' => $city]);

            DB::table('travel_agent')
                ->where('cus_id', '=', $cusid)
                ->update(['cus_id' => $cusid]);


            $changelog = new changes_log;
            $changelog->user = 'Chathura';
            $changelog->action_type = 'Edit Travel Agent';
            $changelog->description = $traname . ' tavel agent edited';
            $changelog->save();

            return redirect('/guest_profile/travel_agent_list')
                ->with('succ_status', 'Successfully Updated');





        } catch (Exception $e) {
            return redirect('/guest_profile/individual_list')
                ->with(['exception' => 'You cannot add the Travel Agent .Please Chack you NIC, Passport,E-maile and Contact No']);

        }

    }

    public function addcompany(Requests\companyvalidate $request)
    {
        try {


            $input = $request->all();

            $customer = new customer;
            $customer->address = Input::get('address');
            $customer->email = Input::get('email');
            $customer->contact_no = Input::get('telephone_number');
            $customer->name = Input::get('comname');
            $customer->lane1 = Input::get('lane1');
            $customer->lane2 = Input::get('lane2');
            $customer->city = Input::get('city');
            $customer->save();

            $company = new company;
            $company->cus_id = $customer->cus_id;

            $company->save();

            $changelog = new changes_log;
            $changelog->user = 'Chathura';
            $changelog->action_type = 'Add Company';
            $changelog->description=$customer->name .' added as a new company';
            $changelog->save();

            return redirect('/guest_profile/company_list')
                ->with('succ_status', 'Successfully Added');

        }
        catch (Exception $e) {
            return redirect('/guest_profile/company_list/create')
                ->with(['exception' => 'You cannot add the Company. Please Chack you E-maile and Contact No!']);

        }

    }


    public function addtravel(Requests\travelvalidate $request)
    {
        try {
            $input = $request->all();

            $customer = new customer;
            $customer->address = Input::get('address');
            $customer->email = Input::get('email');
            $customer->contact_no = Input::get('telephone_number');
            $customer->name = Input::get('name');
            $customer->lane1 = Input::get('lane1');
            $customer->lane2 = Input::get('lane2');
            $customer->city = Input::get('city');
            $customer->save();

            $travel = new travel;
            $travel->cus_id = $customer->cus_id;

            $travel->save();

            $changelog = new changes_log;
            $changelog->user = 'Chathura';
            $changelog->action_type = 'Add Travel Agent';
            $changelog->description='Customer '.$customer->name.' added as a travel agent';
            $changelog->save();

            return redirect('/guest_profile/travel_agent_list')
                ->with('succ_status', 'Successfully Added');
        }


        catch (Exception $e) {
            return redirect('/guest_profile/travel_agent_list/create')
                ->with(['exception' => 'You cannot add the Travel Agent. Please Chack you E-maile and Contact No !']);

        }


     }

//----------------------------------Delete Functions-------------------------------------------------

    public function traveldelete(Request $request)
    {

        $cusid= Input::get('cusid');


        DB::table('travel_agent')
            ->where('cus_id','=',$cusid)
            ->delete();



        return Redirect::to('guest_profile/travel_agent_list')->with ('message1','Travel Agent deleted successfully!');
    }
    public function companydelete(Request $request)
    {

        $cusid= Input::get('cusid');


        DB::table('company')
            ->where('cus_id','=',$cusid)
            ->delete();



        return Redirect::to('guest_profile/company_list')->with ('message1','Company Name deleted successfully!');
    }

    public function individualdelete(Request $request)
    {

        $cusid= Input::get('cusid');


        DB::table('individual')
            ->where('cus_id','=',$cusid)
            ->delete();



        return Redirect::to('guest_profile/individual_list')->with ('message1','Individual deleted successfully!');
    }


}