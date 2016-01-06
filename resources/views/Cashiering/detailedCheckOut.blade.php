<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Amaya Resort Management System</title>

    <meta name="" content="">
    <meta name="" content="">

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
<div class="container">

    {{-- <div class="row">
         <div class="col-lg-12 text-center">
             <h3 class="text-muted">
                 Invoice
             </h3>

             <div class="row">
                 <div class="col-lg-2">
                     <a href="/checkOut" class="btn btn-default">Home</a>
                 </div>

                 <div class="col-lg-8">
                 </div>
             </div>


             --}}{{--<ul class="nav nav-tabs">
                 <li class="active"><a href="/checkOut">Home</a></li>
                 <li><a href="#">Regular Checkout</a></li>
                 <li><a href="#">Early Checkout</a></li>
             </ul>--}}{{--

             <hr>

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



        <a href="/checkOut" class="btn btn-default">Back</a>



        <h4 class="text-muted text-center" style="margin-top: -2%">
            Check Out: Folio View
        </h4>

        <br>

    </div>

    <div class="row">
        <div class="col-md-12">

            <div class="row">
                <div class="col-md-3">
                    Guest Name (Mr. /Ms. /Mrs. )<input type="text" class="form-control" id="P_bal" readonly value=""/>
                </div>
                <div class="col-md-3">
                    Arrival	<input type="text" class="form-control" id="P_bal" readonly value="{{$res_details->check_in}}"/>
                </div>
                <div class="col-md-3">
                    Reservation Number	<input type="text" class="form-control" id="P_bal" readonly value="{{$id}}"/>
                </div>
                <div class="col-md-3">
                    Room ID <input type="text" class="form-control" id="P_bal" readonly value="{{$payments->room_id}}"/>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    Pax	<input type="text" class="form-control" id="P_bal" readonly value="{{$res_details->adults + $res_details->children}}"/>
                </div>

                <div class="col-md-3">
                    Departure	<input type="text" class="form-control" id="P_bal" readonly value="{{$res_details->check_out}}"/>
                </div>

                {{--<div class="col-md-3">
                    Rate Code	<input type="text" class="form-control" id="P_bal" value="{{sprintf("%004d",$balance->Rate_code)}}" readonly/>
                </div>--}}

                <div class="col-md-3">
                    Progressive Balance <input type="text" class="form-control" id="prog_balance" value="{{number_format($payments->prog_balance, 2)}}" readonly> <br>
                </div>

            </div>

            <div class="row">
                <div class="col-md-12">

                    <hr>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-10">

                <div style=" height: 250px; overflow: auto;">
                    <table class="table table-hover table-condensed table-bordered">

                        <thead>
                        <tr class="alert-success">
                            <th>
                                Date
                            </th>
                            <th>
                                Service Name
                            </th>
                            <th>
                                Service Instances
                            </th>

                            <th>
                                Charge
                            </th>
                            {{--<th>
                                Actions
                            </th>--}}
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($folio_services as $row)

                            <tr class="active">

                                <td>
                                    {{$row->date}}
                                </td>
                                <td>
                                    {{$row->service_name}}
                                </td>
                                <td>
                                    {{$row->count}}
                                </td>
                                <td>
                                    {{$row->price}}
                                </td>
                                {{--<td>
                                    <a class="btn btn-primary" href="/checkOut/detailedCheckOut/{{$row->folio_num}}">View Details</a>
                                </td>--}}

                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                </div>


            </div>

            <div class="col-md-2">

                <label for="ExchAmt">Credit Total </label>
                <br>
                <input type="text" class="form-control" id="credit_total" name="credit_total" value="{{number_format($payments->credit_total, 2)}}" readonly> <br>

                <label for="ExchAmt">Debit Total </label>
                <input type="text" class="form-control" id="debit_total" name="debit_total" value="{{number_format($payments->debit_total, 2)}}" readonly> <br>


                <button type="button" id="invoice" class="btn btn-primary" style="width: 100%" onclick="location.href='/print/detailedInvoice/{{$id}}';"> Generate Invoice</button><br><br>
                {{--<button type="button" id="checkOut" class="btn btn-success" --}}{{--data-toggle="modal" data-target="#myModal1" --}}{{--style="width: 100%">Check Out</button>--}}


                {{--<div class="dropdown">
                    <button class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown">Finalize Payment
                        <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li><a href="" data-toggle="modal" data-target="#myModal1">Cash Payment</a></li>
                        <li><a href="" data-toggle="modal" data-target="#myModal2">Card Payment</a></li>
                    </ul>
                </div>--}}

                <!-- Modal -->
                <div class="modal fade" id="myModal1" role="dialog">
                    <div class="modal-dialog text-center modal-sm">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Cash Payments</h4>
                            </div>
                            <form id="" action="" method="post">
                            <div class="modal-body">
                                <input type="hidden" value="Cash" name="method">
                                <input type="hidden" value="{{$payments->prog_balance}}" name="amount">
                                <input type="hidden" value="{{$payments->folio_num}}" name="folio_num">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <p class="text-justify"> If the guest agrees to the Payment and Payment has successfully
                                    been carried out at the cashier, finalize the Checking out process here.</p>
                            </div>
                            <div class="modal-footer">
                                <input type="submit" class="btn btn-success" value="Finalize & Check out">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

        </div>


    </div>

</div>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
{{--@if($errors->any())
    <script>
        $(document).ready(function(){
            $('#myModal2').modal('show');
        });
    </script>
@endif--}}

<script>
    $(document).ready(function(){
        {
            $({{"checkOut"}}).attr("disabled", true);
        };
    });
</script>

<script>
    $(document).ready(function(){
        $({{"invoice"}}).click(function(){
            $({{"checkOut"}}).attr("disabled", false);
            /*$('#chkOut').removeProp("disabled");*/
        });
    });
</script>

<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
</body>
</html>