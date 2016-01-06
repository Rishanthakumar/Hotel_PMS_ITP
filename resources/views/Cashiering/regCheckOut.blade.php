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



        <a href="/checkOut" class="btn btn-default">Check Out Home</a>



        <h4 class="text-muted text-center" style="margin-top: -2%">
            Check Out: Detailed View
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
                {{--<div class="col-md-3">
                    Room ID <input type="text" class="form-control" id="P_bal" readonly value=""/>
                </div>--}}
            </div>

            <div class="row">
                <div class="col-md-3">
                    Pax	<input type="text" class="form-control" id="P_bal" readonly value="{{$res_details->adults + $res_details->children}}"/>
                </div>

                <div class="col-md-3">
                    Departure	<input type="text" class="form-control" id="P_bal" readonly value="{{$res_details->check_out}}"/>
                </div>

                {{--<div class="col-md-3">
                    Rate Code	<input type="text" class="form-control" id="P_bal" value="FILL THIS" readonly/>
                </div>--}}

                {{--<div class="col-md-3">
                    Room Count <input type="text" class="form-control" id="P_bal" readonly value="{{$res_details->no_of_rooms}}"/>
                </div>--}}

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
                                Folio Number
                            </th>
                            <th>
                                Room ID
                            </th>
                            <th>
                                Type
                            </th>
                            <th>
                                Credit Total
                            </th>
                            <th>
                                Debit Total
                            </th>
                            <th>
                                Progressive Balance
                            </th>
                            <th>
                                Actions
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($folio as $row)

                            <tr class="active">

                                <td>
                                    {{$row->folio_num}}
                                </td>
                                <td>
                                    {{$row->room_id}}
                                </td>
                                <td>
                                    {{$row->type}}
                                </td>
                                <td>
                                    {{$row->credit_total}}
                                </td>
                                <td>
                                    {{$row->debit_total}}
                                </td>
                                <td>
                                    {{$row->prog_balance}}
                                </td>
                                <td>
                                    <a class="btn btn-primary" href="/checkOut/detailedCheckOut/{{$row->folio_num}}">View Details</a>
                                </td>

                            </tr>

                        @endforeach
                    </tbody>
                </table>
                </div>


            </div>

            <div class="col-md-2">

                <button id="invoice" class="btn btn-primary" onclick="location.href='/print/summaryInvoice/{{$id}}';">Summary Invoice</button>
                <br><br>
                <button id="checkOut" class="btn btn-success" onclick="location.href='/regCheckOut/finalizeCheckOut/{{$id}}';">Check Out Guest</button>
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