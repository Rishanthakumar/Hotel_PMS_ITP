{{--DO NOT TOUCH FROM HERE ONWARDS--}}
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">

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

    <div style="position: absolute; top: 2% ">




    <div class="col-md-12" style="top:-2%; left: 15%; position: absolute; ">

        <div class="col-sm-2">
        </div>

        <div class="col-sm-10">
        <table style="border: none;" cellpadding="5" width="100%">


            <tr>

                <td>
                    <img src="<?php echo $message->embed(asset('common/logo-amaya.jpg')); ?>" width="30%">
                </td>

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

    </div>


    <br>

    <hr style="height: 1px; border: none; background-color: #000000">
    <table width="100%">
        <tr>
            <td>
                <table id="id">
                    <tr>
                        <td>
                            <b>Reservation No :</b>
                        </td>
                        <td>

                        {{ $res_id}}
                        </td>
                    </tr>
                </table>
            </td>

            <td>
                <table id="id">
                    <tr>
                        <td>
                            <b>Type :</b>
                        </td>
                        <td>
                        {{ $type }}
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <hr style="height: 1px; border: none; background-color: #000000">

    {{--TO HERE--}}


    <div style="width: 100%; position: absolute; top: 50%">

        <p>Dear valued customer.,<br><br>

            Thank you for choosing to stay with us at the Langdale by Amaya. We are pleased to confirm your reservation as follows:        </p>
        <br>

        <table style="border: none;" cellpadding="5" width="100%">

            <tr>
                <td>
                    Customer Name :
                </td>
                    {{ $name }}
                <td>

                <td>
            <tr>

            <tr>
                <td>
                    Arrival Date :
                </td>
                    {{ strtok($check_in, " ") }}
                <td>

                <td>
            <tr>

            <tr>
                <td>
                    Departure Date :
                </td>

                <td>

                {{ strtok($check_out, " ") }}
                <td>
            <tr>
            <tr>
                <td>
                    Nights :
                </td>

                <td>
                    {{ $nights }}
                <td>
            <tr>

            <tr>
                <td>
                    Number of guests :
                </td>

                <td>
                    {{ $guests }}
                <td>
            <tr>

            <tr>
                <td>
                    Number of rooms :
                </td>

                <td>
                {{ $no_of_rooms }}
                <td>
            <tr>


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
                <td>
                    <b>Early Arrivals and Late Departuress</b>
                </td>
            </tr>
            <tr>
                <td>
                    <p>If you expect to arrive early in the day and would like immediate access to your room, we recommend booking a room one night prior to arrival to guarantee immediate access. Similarly, for late departures, reserving an additional night at the time of reservation will guarantee access to your guest room until you depart. If not, early arrivals and late departures will depend on availability.</p>
                </td>

            </tr>
        </table>

        <hr style="height: 1px; border: none; background-color: #000000">
        <table width="100%" id="id">
            <tr>
                <td>
                    <b>Child Policy</b>
                </td>
            </tr>
            <tr>
                <td>
                    <p>Langdale by Amaya charges USD 10 for an extra bed for children 12 years of age and older occupying the same guest room as their parents or guardians. Guests can request for a full-sized single bed or an infant cot at the time of reservation. Infant cots are provided without an additional cost. For children between 4-12 ages sharing the parent's room, 50% of the adult per person rate is charged. Stays are free of charge for children below 3 years of age. For reservations and information, please contact the resort directly.</p>
                </td>

            </tr>
        </table>

        <br>

        <hr style="height: 1px; border: none; background-color: #000000">

        <table>
            <tr>

            <td>
            We look forward to the pleasure of having you as our guest.</td>

                <br>
            </tr>
            <tr>
            <td>Sincerely,</td></tr>
            <br>
            <tr><td>Samantha Ekanayake</td></tr>
            <tr><td>Reservations Department</td></tr>
        </table>
    </div>
</body>

</html>