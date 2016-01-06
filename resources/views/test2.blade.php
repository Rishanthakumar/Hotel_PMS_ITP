{{--DO NOT TOUCH FROM HERE ONWARDS--}}

<html>
<head>
    <style>

        table{
            border: none;
            font-family: sans-serif;
            font-size: 0.9em;
        }

        #id{
            border: none;
            font-family: sans-serif;
            font-size: 0.7em;
        }

        #heading{
            border: none;
            font-family: sans-serif;
            font-size: 0.7em;
        }

    </style>
</head>

<body style="font-family: sans-serif">

{{--Reservation ID: {{$res_id}}--}}

<div style="position: absolute; top: 2%">
    <img src="data:image/jpeg;base64,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" alt="logo-amaya.jpg"  style="margin-top: -4%; width: 8%;"/>
</div>

<div style="top:-2%; left: 15%; position: absolute; ">

    <table style="border: none;" cellpadding="5">

        <tr>
            <td>
                <p id="heading">
                    <b>Langdale by Amaya</b><br>
                    Nanu Oya, Radalla, Nuwara Eliya.

                <table id="id">
                    <tr>
                        <td>Telephone</td> <td> +94 524 924 959</td>
                    </tr>
                    <tr>
                        <td>Fax</td> <td>   +94 524 924 831</td>
                    </tr>
                    <tr>
                        <td>Email</td> <td> reservations@amayaresorts.com</td>
                    </tr>
                </table>
                </p>
            </td>

            <td>
                <p id="heading">
                    <b>Amaya Resorts & Spas</b><br>
                    Level 27, East Tower, World Trade Centre,
                    Colombo 1.

                <table id="id">
                    <tr>
                        <td>Telephone</td> <td> +94 114 767 846</td>
                    </tr>
                    <tr>
                        <td>Fax</td> <td>   +94 114 767 867</td>
                    </tr>
                    <tr>
                        <td>Email</td> <td> reservations@amayaresorts.com</td>
                    </tr>
                </table>
                </p>
            </td>

        </tr>

    </table>

</div>

</div>
<br><br><br><br>
<br>
<hr style="height: 1px; border: none; background-color: #000000">
<table width="100%">
    <tr>
        <td>
            <table id="id">
                <tr>
                    <td>
                        <b>Reservation No</b>
                    </td>
                    <td>
                        {{sprintf("%007d", $res_id)}}
                    </td>
                </tr>
            </table>
        </td>

        <td>
            <table id="id">
                <tr>
                    <td>
                        <b>Guest/Group Name</b>
                    </td>
                    <td>
                        {{$cus_name}}
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<hr style="height: 1px; border: none; background-color: #000000">

{{--TO HERE--}}

<h4 style="font-family: sans-serif; text-align: center">Summary Invoice</h4>

<table width="100%" style="text-align: center">
    <thead>
    <tr>
        <th>
            Room No
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
            Total Payable
        </th>
    </tr>
    </thead>

    @foreach($args as $data)
        <tr>
            <td>
                {{$data->room_id}}
            </td>
            <td>
                {{$data->type}}
            </td>
            <td>
                {{$data->credit_total}}
            </td>
            <td>
                {{$data->debit_total}}
            </td>
            <td>
                {{$data->prog_balance}}
            </td>
        </tr>
    @endforeach

</table>

<div style="width: 100%; position: absolute; top: 50%">

    <hr style="height: 1px; border: none; background-color: #000000">
    <table width="100%" id="id" style="text-align: center">
        <tr>
            <td>
                <b>Category</b>
            </td>
            <td>
                <b>Meal Plan</b>
            </td>
            <td>
                <b>No of Rooms</b>
            </td>
            <td>
                <b>Per Room/Per Night</b>
            </td>
        </tr>
        <tr>
            <td>
                Deluxe
            </td>
            <td>
                Bed & Breakfast
            </td>
            <td>
                1
            </td>
            <td>
                $309.00
            </td>
        </tr>
    </table>

    <hr style="height: 1px; border: none; background-color: #000000">
    <table width="100%">
        <tr>
            <td>
                <table width="100%" id="id">
                    <tr>
                        <td>
                            <b>Reservation Made</b>
                        </td>
                        <td>
                            Spencer Pereira
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Date</b>
                        </td>
                        <td>
                            12/10/2015
                        </td>
                    </tr>
                </table>
            </td>
            <td>
                <table width="100%" id="id">
                    <tr>
                        <td>
                            <b>Agent</b>
                        </td>
                        <td>
                            AMAYA RESORTS
                        </td>
                    </tr>
                    <tr>
                        <td>

                        </td>
                        <td>

                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <hr style="height: 1px; border: none; background-color: #000000">
    <table width="100%" id="id">
        <tr>
            <td>
                <b>Notes</b>
            </td>
        </tr>
        <tr>
            <td>
                Check-in Time : 2.00PM, Check-out Time : 12.00 Noon
            </td>
        </tr>
        <tr>
            <td>
                The Advanced payment will be non-refundable
            </td>
        </tr>
        <tr>
            <td>
                Meals will be either Buffet or Set Menu on discretion of the hotel management
            </td>
        </tr>
    </table>
    <hr style="height: 1px; border: none; background-color: #000000">
    <table width="100%" id="id">
        <tr>
            <td>
                <b>Cancellation Policy</b>
            </td>
        </tr>
        <tr>
            <td>
                Cancellations within 07 Days & Below
            </td>
            <td>
                : 100% Charge
            </td>
        </tr>
        <tr>
            <td>
                Cancellations within 08 to 14 Days
            </td>
            <td>
                : 50% Charge
            </td>
        </tr>
        <tr>
            <td colspan="2">
                Guests who do not arrive within 24 hours of check-in date will be charged the total amount of the reservation.
            </td>
            <td>

            </td>
        </tr>
    </table>
    <hr style="height: 1px; border: none; background-color: #000000">
    <table width="100%" id="id">
        <tr>
            <td rowspan="2">
                <b>Remarks</b>
                <br>
                <br>
                <br>
                <br>
                <br>
            </td>
    </table>

    <hr style="height: 1px; border: none; background-color: #000000">
    <br><br>

    <table id="id" width="100%" style="text-align: center">
        <tr>
            <td>
                ...............................................<br>
                Signature
            </td>
            <td>
                ...............................................<br>
                Guest Signature
            </td>
            <td>
                ...............................................<br>
                Approved
            </td>
        </tr>
    </table>
    <br>
    <br>
    <br>
    <hr style="height: 1px; border: none; background-color: #000000">
</div>
</body>

</html>