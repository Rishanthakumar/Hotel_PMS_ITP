<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Amaya Resort Management System</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<div class="container">
    {{--<div class="row">
        <div class="col-md-12">
            <h3 class="text-muted text-center">
                Folio: Detailed View
            </h3>
            <ul class="nav nav-pills">
                <li>
                    <a href="/cashiering" class="btn btn-default">Back</a>
                </li>
                <li>

                <li class="dropdown pull-right">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle">Cashier<strong class="caret"></strong></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#">Edit Profile</a>
                        </li>
                        <li>
                            <a href="#">Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>--}}

    <div class="row" style="margin-top: 0%">
        <div class="col-md-3">

        </div>
        <div class="col-md-12">
            <h3 class="text-center text-muted">
                Cashiering System
            </h3>
            <img src="{{asset('common/logo-amaya.jpg')}}" style="margin-left: 1%;width:4%;margin-top: -4%">
            <hr>



        </div>
        <div class="col-md-3">
        </div>
    </div>
    <div class="row">



        <a href="/payments" class="btn btn-default">Home</a>



        <h4 class="text-muted text-center" style="margin-top: -2%">
            Folio: Detailed View
        </h4>

    <div class="row">
        <div class="col-md-10">

            <br>
            <div class="row">
            	<div class="col-md-3">
            		Progressive Balance	<input type="text" class="form-control" id="P_bal" readonly value="{{number_format($balance->prog_balance, 2)}}"/>
            	</div>
            	<div class="col-md-3">
            		Arrival	<input type="text" class="form-control" id="P_bal" readonly value="{{$res_details->check_in}}"/>
            	</div>
            	<div class="col-md-3">
            		Rate Code	<input type="text" class="form-control" id="P_bal" value="{{sprintf("%004d",$balance->Rate_code)}}" readonly/>
            	</div>
            </div>

            <div class="row">
            	<div class="col-md-3">
            		Status	<input type="text" class="form-control" id="P_bal" readonly value="{{$res_details->status}}"/>
            	</div>
            	<div class="col-md-3">
            		Departure	<input type="text" class="form-control" id="P_bal" readonly value="{{$res_details->check_out}}"/>
            	</div>
            	<div class="col-md-3">
            		Pax	<input type="text" class="form-control" id="P_bal" readonly value="{{$res_details->adults + $res_details->children}}"/>
            	</div>
            </div>

            <br>
            @if($errors->any())
                <ul class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            @endif

            <br /><br />
            <div style=" height: 260px; overflow: auto;">
            <table class="table table-hover table-condensed table-bordered">
                <thead class="alert-success">
                <tr>
                    <th>
                        Folio Number
                    </th>
                    <th>
                        Service ID
                    </th>
                    <th>
                        Date Purchased
                    </th>
                    <th>
                        Service Count
                    </th>
                    <th>
                        Total Price
                    </th>
                    <th>
                    </th>
{{--                    <th>
                        Guest Payable?
                    </th>--}}

                </tr>
                </thead>
                <tbody>

                @foreach($folio_num as $result)

                    <tr class="active">
                        <td>
                            {{$result['folio_num']}} {{--To access the data, this is also possible.--}}
                        </td>
                        <td>
                            {{$result->service_id}}
                        </td>
                        <td>
                            {{$result->date}}
                        </td>
                        <td>
                            {{$result->service_count}}
                        </td>
                        <td>
                            {{number_format($result->price, 2)}}
                        </td>
                        {{--<td>
                            {{$result->guest_payable}}
                        </td>--}}
                        <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modelUpdate{{$id.$result->date.$result->service_id}}" style="width: 60%">Update Entry</button><br /> <br />
                            <div class="modal fade text-center" id="modelUpdate{{$id.$result->date.$result->service_id}}" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-header">Update Services</h4>
                                        </div>

                                        <form role="form" id="updateService{{$id.$result->date.$result->service_id}}" action="/payments/updateService" method="post" name="updateForm{{$id.$result->date.$result->service_id}}">
                                            <div class="modal-body">
                                                <p>Update services the guest has bought to their folio.</p>

                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <div class="form-group">

                                                    <input type="hidden" name="purchased_date" value="{{$result->date}}"> {{--This sends the purchased date--}}
                                                    <input type="hidden" name="old_service_id" value="{{$result->service_id}}">
                                                    <input type="hidden" name="old_service_count" value="{{$result->service_count}}">


                                                    <label for="folio_num">Folio Number</label>
                                                    <input type="text" class="form-control" id="folio_num" name="folio_num" value="{{$id}}" readonly>

                                                    <label for="service_id">Service code</label>
                                                    <select class="form-control" id="service_id" name="service_id">
                                                        @foreach($services as $options)
                                                            {{--<option {{($result->service_id == $options->service_id) ? 'selected' : ''}}>{{$options->service_id}}</option>--}}
                                                            <option>{{$options->service_id}}</option>
                                                        @endforeach
                                                    </select>

                                                    <label for="service_qty">Quantity</label>
                                                    <select class="form-control" id="service_qty" name="service_qty">
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                        <option>6</option>
                                                        <option>7</option>
                                                        <option>8</option>
                                                        <option>9</option>
                                                        <option>10</option>
                                                    </select>

                                                    <label for="reason_code">Reason code</label>
                                                    <select class="form-control" id="reason_code" name="reason_code">
                                                        @foreach($reason_code as $reason)
                                                            <option>{{$reason->reason_code}}</option>
                                                        @endforeach
                                                    </select>
                                                    <label for="description">Description (50 characters max)</label>
                                                    <textarea class="form-control" rows="3" id="description" name="description"></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-default" id="submitAdd">Submit</button>
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            </div>
        </div>

        <div class="col-md-2">

            <br />

            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modelAdd" style="width: 70%">Add Service</button><br /> <br />
            <div class="modal fade text-center" id="modelAdd" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-header">Add Services</h4>
                        </div>

                        <form role="form" id="addService" action="/payments/addService" method="post">
                            <div class="modal-body">
                                <p>Add new services the guest has bought to their folio.</p>

                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group">
                                    <label for="folio_num">Folio Number</label>
                                    <input type="text" class="form-control" id="folio_num" name="folio_num" value="{{$id}}" readonly>

                                    <label for="res_id">Reservation ID</label>
                                    <input type="text" class="form-control" id="res_id" name="res_id" readonly value="1">

                                    <label for="service_id">Service code</label>
                                    <select class="form-control" id="service_id" name="service_id" >
                                        @foreach($services as $options)
                                            <option>{{$options->service_id}}</option>
                                        @endforeach
                                    </select>

                                    <label for="service_qty">Quantity</label>
                                    <select class="form-control" id="service_qty" name="service_qty">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>8</option>
                                        <option>9</option>
                                        <option>10</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-default" id="submitAdd">Submit</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modelFandB" style="width: 70%">Rest. Charges</button><br /> <br />
            <div class="modal fade text-center" id="modelFandB" role="dialog">
                <div class="modal-dialog"> {{--add modal-sm to make modal smaller--}}
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-header">Restaurant Charges</h4>
                        </div>
                        <div class="modal-body">
                            <p>Restaurant Charges.</p>

                            <form role="form" action="/payments/addResCharges" method="post">
                                <div class="form-group">

                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <label for="folio_num">Folio Number</label>
                                    <input type="text" class="form-control" id="folio_num" name="folio_num" value="{{$id}}" readonly>
                                    <label for="res_details">Reservation Number</label>
                                    <input type="text" class="form-control" id="res_details" name="res_details" value="{{$res_details->res_id}}" readonly>
                                    <label for="room_details">Room Number</label>
                                    <input type="text" class="form-control" id="room_details" name="room_details" value="{{$balance->room_id}}" readonly>

                                    <label for="amount">Charge (IN USD)</label>
                                    <input type="text" class="form-control" id="amount" name="amount" value="" placeholder="$">
                                    @if ($errors->has('amount')) <span class="alert-danger">{{ $errors->first('amount') }}</span> @endif
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-default">Add Charge</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modelBar" style="width: 70%">Bar Charges</button><br /> <br />
            <div class="modal fade text-center" id="modelBar" role="dialog">
                <div class="modal-dialog"> {{--add modal-sm to make modal smaller--}}
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-header">Bar Charges</h4>
                        </div>
                        <div class="modal-body">
                            <p>Bar Charges.</p>

                            <form role="form" action="/payments/addBarCharges" method="post">
                                <div class="form-group">

                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <label for="folio_num">Folio Number</label>
                                    <input type="text" class="form-control" id="folio_num" name="folio_num" value="{{$id}}" readonly>
                                    <label for="res_details">Reservation Number</label>
                                    <input type="text" class="form-control" id="res_details" name="res_details" value="{{$res_details->res_id}}" readonly>
                                    <label for="room_details">Room Number</label>
                                    <input type="text" class="form-control" id="room_details" name="room_details" value="{{$balance->room_id}}" readonly>

                                    <label for="amount">Charge (IN USD)</label>
                                    <input type="text" class="form-control" id="amount" name="amount" value="" placeholder="$">
                                    @if ($errors->has('amount')) <span class="alert-danger">{{ $errors->first('amount') }}</span> @endif
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-default">Add Charge</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modelVehicle" style="width: 70%">Vehicle Credit</button><br /> <br />
            <div class="modal fade text-center" id="modelVehicle" role="dialog">
                <div class="modal-dialog"> {{--add modal-sm to make modal smaller--}}
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-header">Vehicle Credit</h4>
                        </div>
                        <div class="modal-body">
                            <p>Add Vehicle Reservation charges as Credit.</p>

                            <form role="form" action="/payments/addVehicleCredit" method="post">
                                <div class="form-group">

                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <label for="folio_num">Folio Number</label>
                                    <input type="text" class="form-control" id="folio_num" name="folio_num" value="{{$id}}" readonly>
                                    <label for="res_details">Reservation Number</label>
                                    <input type="text" class="form-control" id="res_details" name="res_details" value="{{$res_details->res_id}}" readonly>
                                    <label for="room_details">Room Number</label>
                                    <input type="text" class="form-control" id="room_details" name="room_details" value="{{$balance->room_id}}" readonly>

                                    <label for="amount">Charge (IN USD)</label>
                                    <input type="text" class="form-control" id="amount" name="amount" value="" placeholder="$">
                                    @if ($errors->has('amount')) <span class="alert-danger">{{ $errors->first('amount') }}</span> @endif
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-default">Add Charge</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modelDebit" style="width: 70%">Add Debit</button><br /> <br />
            <div class="modal fade text-center" id="modelDebit" role="dialog">
                <div class="modal-dialog"> {{--add modal-sm to make modal smaller--}}
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-header">Add Debit</h4>
                        </div>
                        <div class="modal-body">
                            <p>Add Debit amount to a folio.</p>

                            <form role="form" action="/payments/addDebit" method="post">
                                <div class="form-group">

                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <label for="folio_num">Folio Number</label>
                                    <input type="text" class="form-control" id="folio_num" name="folio_num" value="{{$id}}" readonly>
                                    <label for="res_details">Reservation Number</label>
                                    <input type="text" class="form-control" id="res_details" name="res_details" value="{{$res_details->res_id}}" readonly>
                                    <label for="room_details">Room Number</label>
                                    <input type="text" class="form-control" id="room_details" name="room_details" value="{{$balance->room_id}}" readonly>

                                    <label for="amount">Debit Amount (IN USD)</label>
                                    <input type="text" class="form-control" id="amount" name="amount" value="" placeholder="$">
                                    @if ($errors->has('amount')) <span class="alert-danger">{{ $errors->first('amount') }}</span> @endif
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-default">Add Debit</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            {{--<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modelPrint" style="width: 70%">Print Folio</button><br /> <br />--}}
            <div class="modal fade text-center" id="modelPrint" role="dialog">
                <div class="modal-dialog"> {{--add modal-sm to make modal smaller--}}
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-header">Print Folio</h4>
                        </div>
                        <div class="modal-body">
                            <p>Print the full(or optionally specified dates) folio.</p>

                            <form role="form" action="/payments/print" method="post">
                                <div class="form-group">

                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <label for="folio_num">Folio Number</label>
                                    <input type="text" class="form-control" id="folio_num" name="folio_num" value="{{$id}}" readonly>

                                    <label for="start_date">Start Date</label>
                                    <input type="date" class="form-control" id="start_date" name="start_date" placeholder="yyyy-mm-dd">
                                    <span class="help-block">Start Date is optional.</span>

                                    <label for="end_date">End Date</label>
                                    <input type="date" class="form-control" id="end_date" name="end_date" placeholder="yyyy-mm-dd">
                                    <span class="help-block">End Date is optional.</span>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-default">Print Folio</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modelViewUpdates" style="width: 70%">Adjustments</button><br /> <br />
            <div class="modal fade text-center" id="modelViewUpdates" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-header">View Adjustments History</h4>
                        </div>
                        <div class="modal-body">
                            <p>View all Adjustments history related to this folio.</p>

                            <table class="table table-hover table-condensed table-bordered">
                                <thead class="alert-success">
                                    <tr>
                                        <th>
                                            Update Number
                                        </th>
                                        <th>
                                            Reason code
                                        </th>
                                        <th>
                                            Description
                                        </th>
                                        <th>
                                            Updated Date
                                        </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($updates as $up_history)
                                        <tr class="active">
                                            <td>
                                                {{$up_history->update_num}}
                                            </td>
                                            <td>
                                                {{$up_history->reason_code}}
                                            </td>
                                            <td>
                                                {{$up_history->reason_description}}
                                            </td>
                                            <td>
                                                {{$up_history->changed_date}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    @if($errors->any())
        <script>
            $(document).ready(function(){
                $('#modelDebit').modal('show');
            });
        </script>
    @endif

<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

</body>
</html>