<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//START--------------------------FRONT OFFICE------------------------------------------------------
###################################### Reservation ################################################

Route::get('/FO_mainpage','FrontOfficeController@mainpage');
Route::get('/registerind','FrontOfficeController@registerind');
Route::get('/ratequery','FrontOfficeController@ratequery');
Route::get('/checkin','FrontOfficeController@checkin');
Route::post('/checkin','ReservationController@checkin');
Route::get('/block_rooms','FrontOfficeController@block_rooms');
Route::post('block_rooms/block','ReservationController@block_rooms_block');
Route::get('/reports/turn_away','FrontOfficeController@report_turnaway');
Route::get('/reports/reservations','FrontOfficeController@report_reservations');
Route::get('/reports/tomorrow_arrival','FrontOfficeController@tomorrow_arrival');
Route::get('/reports/tomorrow_departure','FrontOfficeController@tomorrow_departure');
Route::get('/reports/in_house','FrontOfficeController@in_house_guests');
Route::get('/confirmations','FrontOfficeController@confirmations');
Route::post('/confirmations/sendmail','ReservationController@sendEmailReminder');
Route::get('/pdf_generate_arr','pdfController@print_tommorrow_arr');
Route::get('/pdf_generate_dep','pdfController@print_tommorrow_dep');
Route::get('/pdf_generate_inh','pdfController@pdf_generate_inh');

//*************************************views rates*********************************

Route::get('/ratequery/ratequerydetailonly','FrontOfficeController@ratedetailonly');

//*********************************add current query details to the session*****************

Route::post('/ratequery/querydetails','ReservationController@querydetails');
Route::post('/ratequery/addrate_travel_agent','ReservationController@add_travel_agent_rate');


//*******************************view full rate detail page ******************************

Route::get('/ratequery/ratedetail','FrontOfficeController@ratedetail');

//*******************************add rooms ******************
Route::post('/ratequery/ratedetail/addrooms','ReservationController@addrooms');

//check rooms according to the input form rate detail page
Route::get('/ratequery/ratedetail/check_room','ReservationCheckController@check_selected_rooms');
Route::post('/ratequery/ratedetail/summary','ReservationCheckController@remove_added_rooms');
Route::get('/waitlist','FrontOfficeController@waitlist');
Route::post('/waitlist_acc_cancel','ReservationController@waitlist_acc_cancel');
Route::get('/waitlistform','FrontOfficeController@waitlistform');
Route::get('/updateres','FrontOfficeController@updatereservation');
Route::post('/updateres/viewservices','ReservationController@viewServices');

//update res
Route::post('/updateres/viewservices_res','ReservationController@viewServices_res');
Route::post('/updateres/cancel','ReservationController@cancel_reservation');
Route::post('/reservations','ReservationController@store');
Route::post('/reservations/waitlist','ReservationController@waitlist_res');
Route::post('/reservations/edit','ReservationController@update');
Route::post('/reservations/edit_res','ReservationController@update_res');
Route::post('/ratequery/ratedetail/turnaway','ReservationController@turnawayentry');
Route::get('/profilesdirect','FrontOfficeController@redirectProfiles');
Route::get('/temp_check_out','FrontOfficeController@temp_check_out');
Route::post('/temp_check_out','ReservationController@temp_check_out');
Route::get('/temp_check_in','FrontOfficeController@temp_check_in');
Route::post('/temp_check_in','ReservationController@temp_check_in');





//******************************<Profile Management>***********************

Route::get('/guest_profile','Guest_Profile_PagesController@viewmainpage');

Route::get('/guest_profile/preferences','Guest_Profile_PagesController@viewpreferences');

Route::post('/guest_profile/preferences','Guest_Profile_Controller@addPreference');

Route::get('/guest_profile/changeslog','Guest_Profile_PagesController@viewchangeslog');

Route::get('/guest_profile/futurereservations','Guest_Profile_PagesController@viewfuturereservations');

Route::get('/guest_profile/mergeprofile','Guest_Profile_PagesController@viewmergeprofile');

Route::get('/guest_profile/relationship','Guest_Profile_PagesController@viewrelationship');

Route::get('/guest_profile/member_list','Guest_Profile_PagesController@viewmemberlist');

Route::get('/guest_profile/member_list/create','Guest_Profile_PagesController@viewcreatemember');

Route::post('/guest_profile/member_list/create','Guest_Profile_Controller@addmemberprofile');

Route::get('/guest_profile/individual_list','Guest_Profile_PagesController@viewindividual');

Route::get('/guest_profile/individual_list/create','Guest_Profile_PagesController@viewcreateindividual');

Route::post('/guest_profile/individual_list/create','Guest_Profile_Controller@addIndividual');

Route::post('/guest_profile/individual_list/edit','Guest_Profile_Controller@Editprofile');

Route::get('/guest_profile/company_list','Guest_Profile_PagesController@viewcompanylist');

Route::get('/guest_profile/company_list/create','Guest_Profile_PagesController@viewcreatecompany');

Route::post('/guest_profile/company_list/create','Guest_Profile_Controller@addcompany');

Route::get('/guest_profile/travel_agent_list','Guest_Profile_PagesController@viewtravellist');

Route::get('/guest_profile/travel_agent_list/create','Guest_Profile_PagesController@viewcreatetravelagent');

Route::post('/guest_profile/travel_agent_list/create','Guest_Profile_Controller@addtravel');

////////

Route::get('/guest_profile/changeslog','Guest_Profile_PagesController@viewchanges');
Route::get('guest_profile/relationship','Guest_Profile_PagesController@viewrelationtra');
Route::get('guest_profile/mergeprofile','Guest_Profile_PagesController@viewmergetable');
Route::post('guest_profile/mergeprofile','Guest_Profile_PagesController@viewmergetable');
Route::get('guest_profile/futurereservations','Guest_Profile_PagesController@futurereservation');
Route::post('/guest_profile/company_list','Guest_Profile_Controller@editcompany');
Route::post('/guest_profile/travel_agent_list','Guest_Profile_Controller@edittravel');
Route::post('guest_profile/mergeprofile','Guest_Profile_Controller@mergeprofile');
Route::get('guest_profile/pastreservations','Guest_Profile_PagesController@pastreservation');
Route::get('guest_profile/pastreservations','Guest_Profile_PagesController@pastreservationview');
//Route::post('guest_profile/preferences','Guest_Profile_PagesController@viewguestid');
Route::get('guest_profile/preferences','Guest_Profile_PagesController@viewguestid');
Route::post('guest_profile/relationship','Guest_Profile_PagesController@searchrelation');
///
Route::get('guest_profile/member_list/create','Guest_Profile_PagesController@viewmemberid');
/*Route::get('guest_profile/preferences_list','Guest_Profile_PagesController@preferenceslist');*/

Route::post('/traveldelete','Guest_Profile_Controller@traveldelete');
Route::post('/companydelete','Guest_Profile_Controller@companydelete');
Route::post('/individualdelete','Guest_Profile_Controller@individualdelete');



Route::get('guest_profile/preferences_list','Guest_Profile_PagesController@viewreservationid');
Route::post('guest_profile/preferences_list','Guest_Profile_PagesController@viewreservationid');
//Route::post('guest_profile/preferences_list','Guest_Profile_PagesController@viewreservedmember');
//viewselectedcust

//add individual customer to a reservation

Route::post('/ratequery/addcustomer','ReservationController@addcustomer');


//END--------------------------FRONT OFFICE--------------------------------------------------------



//START-----------------------Cashiering----------------------

/*Route::get('test', function(){
   return view('singleLineInvoice');
});*/
Route::get('/cashiering', 'FolioController@mainPage');
Route::get('/payments', 'FolioController@FIT_payments');
Route::get('/TApayments', 'FolioController@TA_payments');
Route::get('/CmpPayments', 'FolioController@company_payments');
Route::get('/currencyConvert', 'CurrencyController@getCurrency');  //will get the currency data from the json api  at http://api.fixer.io/latest?base=USD
Route::get('/checkOut', 'checkOutController@checkOut');
Route::get('/TRAcheckOut', 'checkOutController@TRAcheckOut');
Route::get('/CMPcheckOut', 'checkOutController@CMPcheckOut');
Route::get('/voucherHome', 'voucherController@voucherHome');
Route::get('/buyVoucher','voucherController@buyVoucher');
Route::get('/oldFolios', 'FolioController@oldFolio');
Route::get('/payments/view/{id}','FolioController@edit');   //this should be the last get request for payments always.
Route::get('/payments/defaultCharges/{id}', 'FolioController@defaultCharges');
Route::get('/checkOut/regCheckOut/{id}', 'checkOutController@regCheckout');
Route::get('/checkOut/detailedCheckOut/{id}', 'checkOutController@detailed_checkOut');
Route::get('/print/{id}', 'pdfController@printSingleLineInvoice');
Route::get('/print/summaryInvoice/{id}', 'pdfController@summaryInvoice');
Route::get('/print/detailedInvoice/{id}', 'pdfController@detailedInvoice');
Route::get('/regCheckOut/finalizeCheckOut/{id}', 'checkOutController@finalizeCheckOut');
Route::get('/oldFolio_detailed/{id}', 'FolioController@oldFolio_detailed');

Route::post('/payments/addService/', 'FolioController@addService');
Route::post('/payments/updateService/', 'FolioController@updateService');
Route::post('/payments/addResCharges', 'FolioController@addResCharges');
Route::post('/payments/addBarCharges', 'FolioController@addBarCharges');
Route::post('/payments/addVehicleCredit', 'FolioController@addVehicleCharges');
Route::post('/payments/addDebit', 'FolioController@addDebit');
Route::post('/payments/batchPost/', 'FolioController@batchPost');
Route::post('/currencyConvert/convert','CurrencyController@convertCurrency');
Route::post('/payments/print', 'FolioController@printFolio');
Route::post('/regCheckOut/cardCheckOut', 'checkOutController@finalizePayment');
//END-------------------------Cashiering----------------------



//START-----------Pick-up & Drop-off System-----------------------------------------------------------------------

Route::get('/welcomereceptionist','P_DController@WelcomeReceptionist');

Route::get('/supervisorwelcome','P_DController@WelcomeSupervisor');

/** ---------------------------------------Receptionist Linking -----------------------------------------------------------*/

Route::get('/addbooking','P_DController@AddVBooking');

Route::get('/finalizebooking','P_DController@FinalizeVBooking');

Route::get('/updatebooking','P_DController@UpdateVBooking');

Route::get('/availablevehicles','P_DController@AvailableVehicles');

Route::get('/availabledrivers','P_DController@AvailableDrivers');

Route::get('/pendingpaymenthandling','P_DController@P_D_PendingPaymentHandling');

Route::get('/creditpaymenthandling','P_DController@P_D_CreditPaymentHandling');

Route::get('/finalizedpaymenthandling','P_DController@P_D_FinalizedPaymentHandling');


//sms
Route::get('/sms', 'smsController@smsAlert');


/**-----------------------------------Transport Supervisor Linking ----------------------------------------------------------*/

//Manage Vehicle Fleet Linking

Route::get('/addvehicle','P_DController@AddVehicle');

Route::get('/removevehicle','P_DController@RemoveVehicle');



//Manage Driver Details Linking

Route::get('/adddriver','P_DController@AddDriver');

Route::get('/editdriver','P_DController@EditDriver');

Route::get('/removedriver','P_DController@RemoveDriver');


//Manage Vehicle Travelling Packages

Route::get('/addpackage','P_DController@AddVehiclePackage');

Route::get('/updatepackage','P_DController@UpdateVehiclePackage');

//Manage Legal Info Linking

Route::get('/addvehiclelegal','P_DController@AddVehicleLegal');

Route::get('/adddriverlegal','P_DController@AddDriverLegal');

Route::get('/viewvehiclelegals','P_DController@ViewVehicleLegal');

Route::get('/viewdriverlegal','P_DController@ViewDriverLegal');

Route::get('/updatevehiclelegal','P_DController@UpdateVehicleLegal');

Route::get('/updatedriverlegal','P_DController@UpdateDriverLegal');



//Generate Reports Linking
Route::get('/generatevehiclereservationreports','P_DController@GenerateVehicleReservationReports');

Route::get('/generatevehiclereports','P_DController@GenerateVehicleReports');

Route::get('/generatedriverreports','P_DController@GenerateDriverReports');


/**-----------------------------------------Receptionist Form Inputs --------------------------------------------------------*/



/*Route::post('/reservations','P_D_Form_Controller@store_vehicle_reservation');*/

/*Route::get('/reservations',function(){
   $rate=Input::get('package');
   $id=\App\Vehicle_Packages::where('package_name','=',$rate)->get();

   return Response::json($id);

});*/



Route::post('/checkavailability','P_D_Form_Controller@check_availability');

Route::post('/finalize','P_D_Form_Controller@finalize_vehicle_reservation');

Route::post('/addcus','P_D_Form_Controller@add_customer');

Route::post('/finalreservation','P_D_Form_Controller@finalize_reservation');


/**-----------------------------------------Receptionist Table Views --------------------------------------------------------*/



Route::get('/updatebooking','P_D_Form_Controller@update_booking');

Route::get('/pendingpaymenthandling','P_D_Form_Controller@pending_payment_handling');

Route::get('/creditpaymenthandling','P_D_Form_Controller@credit_payment_handling');

Route::get('/finalizedpaymenthandling','P_D_Form_Controller@finalized_payment_handling');

Route::get('/viewbookings','P_D_Form_Controller@view_bookings');

Route::get('/availablevehicles','P_D_Form_Controller@view_vehicles');

Route::get('/availabledrivers','P_D_Form_Controller@view_drivers');

Route::get('/getprofile','P_D_Form_Controller@get_profile');

/**-----------------------------------------Receptionist Table Updates --------------------------------------------------------*/


Route::post('/editvehiclebookings','NewUpdateController@edit_vehicle_bookings');

Route::post('/removevehiclebooking','NewUpdateController@remove_vehicle_bookings');

Route::post('/paymentstatuschange','NewUpdateController@change_payment_status');

/**-----------------------------------------Transport Supervisor Table Updates --------------------------------------------------------*/


Route::post('/editvehicle','NewUpdateController@edit_vehicle_details');

Route::post('/editdriver','NewUpdateController@edit_driver_details');

Route::post('/removedriver','NewUpdateController@remove_driver_details');

Route::post('/removevehicle','NewUpdateController@remove_vehicle');

Route::post('/updatepackage','NewUpdateController@edit_vehicle_packages');

Route::post('/removepackage','NewUpdateController@remove_vehicle_packages');

Route::post('/editdriverlegal','NewUpdateController@edit_driver_legal');

Route::post('/removedriverlegal','NewUpdateController@remove_driver_legal');

Route::post('/editvehiclelegal','NewUpdateController@edit_vehicle_legal');

Route::post('/removevehiclelegal','NewUpdateController@remove_vehicle_legal');


/**------------------------------------Transport Supervisor Form Inputs -----------------------------------------------------*/


Route::post('/storevehicle','P_D_Form_Controller@store_vehicles');

Route::post('/storedriver','P_D_Form_Controller@store_drivers');

Route::post('/storepackage','P_D_Form_Controller@store_travelling_packages');

Route::post('/storevehiclelegal','P_D_Form_Controller@store_vehicle_legal');

Route::post('/storedriverlegal','P_D_Form_Controller@store_driver_legal');

Route::get('/storedriverlegal',function(){
   $name=Input::get('driver_id');
   $id=\App\driver::where('driver_id','=',$name)->get();

   return Response::json($id);
});

/**-----------------------------------Transport Supervisor Table Views -----------------------------------------------------*/


Route::get('/editvehicle','P_D_Form_Controller@edit_vehicles');

Route::get('/removevehicle','P_D_Form_Controller@remove_vehicles');

Route::get('/editdriver','P_D_Form_Controller@edit_drivers');

Route::get('/removedriver','P_D_Form_Controller@remove_drivers');

Route::get('/updatepackage','P_D_Form_Controller@update_travelling_packages');

Route::get('/viewvehiclelegal','P_D_Form_Controller@view_vehicle_legal');

Route::get('/viewdriverlegal','P_D_Form_Controller@view_driver_legal');

Route::get('/updatevehiclelegal','P_D_Form_Controller@update_vehicle_legal');

Route::get('/updatedriverlegal','P_D_Form_Controller@update_driver_legal');

Route::get('/generatevehiclereservationreports','P_D_Form_Controller@generate_vehicle_reservation_reports');

Route::get('/generatevehiclereports','P_D_Form_Controller@generate_vehicle_reports');

Route::get('/generatedriverreports','P_D_Form_Controller@generate_driver_reports');


//print report
Route::get('/printpdbill/{id}','PDpdfController@printInvoice');



//END-----------Pick-up & Drop-off System-----------------------------------------------------------------------
