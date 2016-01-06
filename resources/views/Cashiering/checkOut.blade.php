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
    <div class="row" style="margin-top: 0%">
        <div class="col-md-3">

        </div>
        <div class="col-md-12">
            <h3 class="text-center text-muted">
                Cashiering System
            </h3>
            <img src="{{asset('common/logo-amaya.jpg')}}" style="margin-left: 1%;width:4%;margin-top: -4%">
            <hr>

            <ul class="nav nav-tabs">

                <li class="active">
                    <a href="/checkOut">FIT Check Out</a>
                </li>

                <li>
                    <a href="/TRAcheckOut">Travel Agent's Check Out</a>
                </li>

                <li>
                    <a href="/CMPcheckOut">Company Check Out</a>
                </li>

            </ul>

        </div>
        <div class="col-md-3">
        </div>
    </div>

    <br>

    <div class="row">

        <div class="col-md-6">
            <br>
            <h4 class="text-muted text-left" style="margin-top: -2%">
                FIT Check Out
            </h4>
        </div>

        <div class="col-md-6 text-right">
            <a href="/FO_mainpage" class="btn btn-default">Home</a>
            </h4>
        </div>

        {{--</div--}}

    </div>

<br>
    {{--<div class="container">--}}

    <div class="row">
        <div class="col-md-12">

            {{--<div class="row">
                <div class="col-md-3">
                    Guest Name (Mr. /Ms. /Mrs. )<input type="text" class="form-control" id="P_bal" readonly value=""/>
                </div>
                <div class="col-md-3">
                    Arrival	<input type="text" class="form-control" id="P_bal" readonly value=""/>
                </div>
                <div class="col-md-3">
                    Folio Number	<input type="text" class="form-control" id="P_bal" readonly value=""/>
                </div>
                <div class="col-md-3">
                    Room Number <input type="text" class="form-control" id="P_bal" readonly value=""/>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    Pax	<input type="text" class="form-control" id="P_bal" readonly value=""/>
                </div>

                <div class="col-md-3">
                    Departure	<input type="text" class="form-control" id="P_bal" readonly value=""/>
                </div>

                <div class="col-md-3">
                    Rate Code	<input type="text" class="form-control" id="P_bal" value="FILL THIS" readonly/>
                </div>

                <div class="col-md-3">
                    Room Type	<input type="text" class="form-control" id="P_bal" readonly value=""/>
                </div>

            </div>--}}

            {{--<div class="row">
                <div class="col-md-12">
                    <br>
                    <hr>
                </div>
            </div>
--}}
        </div>

        <div class="row">
            <div class="col-md-12">

                <table class="table table-hover table-condensed">

                    <thead class="alert-success">
                    <tr>
                        <th>
                            Reservation ID
                        </th>
                        <th>
                            Total Credit Amount
                        </th>
                        <th>
                            Total Debit Amount
                        </th>
                        <th>
                            Total Progressive Balance
                        </th>
                        <th>
                            Actions
                        </th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($folio_details as $row)

                        <tr class="active">

                            <td>
                                {{$row->res_id}}
                            </td>
                            <td>
                                {{number_format($row->credit_sum, 2)}}
                            </td>
                            <td>
                                {{number_format($row->debit_sum, 2)}}
                            </td>
                            <td>
                                {{number_format($row->prog_sum, 2)}}
                            </td>

                            <td>
                                {{--<a href="" class="btn btn-primary" id="lineInvoice">Single Line Invoice</a>--}}
                                <button class="btn btn-primary" id="lineInvoice{{$row->res_id}}" onclick="location.href='/print/{{$row->res_id}}';">Single Line Invoice</button>
                                <button class="btn btn-success" id="chkOut{{$row->res_id}}" onclick="location.href='/regCheckOut/finalizeCheckOut/{{$row->res_id}}';">Check Out Guest</button>
                                <a href="/checkOut/regCheckOut/{{$row->res_id}}" class="btn btn-primary">View Details</a>
                            </td>

                        </tr>

                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

    </div>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>


@foreach($folio_details as $row)
    <script>
        $(document).ready(function(){
            {
                $({{"chkOut".$row->res_id}}).attr("disabled", true);
            };
        });
    </script>
@endforeach

@foreach($folio_details as $row)
    <script>
        $(document).ready(function(){
            $({{"lineInvoice".$row->res_id}}).click(function(){
                $({{"chkOut".$row->res_id}}).attr("disabled", false);
                /*$('#chkOut').removeProp("disabled");*/
            });
        });
    </script>
@endforeach

<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
</body>
</html>