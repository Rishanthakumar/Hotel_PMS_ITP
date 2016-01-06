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

    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.6/css/jquery.dataTables.min.css">
    <script type="text/javascript" src="//cdn.datatables.net/1.10.6/js/jquery.dataTables.min.js"></script>

</head>
<body>

<div class="container">
    {{--<div class="row">
        <div class="col-md-12">
            <h3 class="text-center text-muted">Cashiering System</h3>

            <ul class="nav nav-pills">
                <li class="active">

                </li>
                --}}{{--<li>--}}{{--

                --}}{{--<li class="dropdown pull-right">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle">Cashier<strong class="caret"></strong></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#">Edit Profile</a>
                        </li>
                        <li>
                            <a href="#">Logout</a>
                        </li>
                    </ul>
                </li>--}}{{--
            </ul>
        </div>
        <div class="row">
            <div class="col-md-3">
                <img src="{{asset('common/logo-amaya.jpg')}}" style="margin-left: 1%;width:20%;">
            </div>
            <div class="col-md-9">

            </div>
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



                <a href="/FO_mainpage" class="btn btn-default">Home</a>



                <h4 class="text-muted text-center" style="margin-top: -2%">
                    Folio
                </h4>

        <div class="col-md-10">



            @if($errors->any())
                <ul class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            @endif

            @if($exception_msg == 1)
                <ul class="alert alert-warning">
                    <li>
                        The Folio Posting you did was unsuccessful. <br>Please check if,
                        <ul>
                            <li>Cause No. 1: The Folio Number(s) you entered is/are valid Number(s).</li>
                            <li>Cause No. 2: Folio Number(s) is/are valid but the service has already been entered for this/these Folio Number(s) today.</li>
                            <li>Cause No. 3: If you are doing a Batch post and the reason for the error is Cause No. 2, The service has been posted to Folio Numbers that did not contain this service for today. </li>
                        </ul>
                    </li>
                </ul>
            @endif
            
            <br /><br />
            <table class="table table-hover table-condensed table-bordered" id="folioTable">
                <thead class="alert-success">
                <tr>
                    <th>
                        Folio Number
                    </th>
                    <th>
                        Reservation ID
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
                        View
                    </th>

                </tr>
                </thead>
                <tbody>

                @foreach($folios as $folio)

                    <tr class="active">
                        <td>
                            {{$folio->folio_num}}
                        </td>
                        <td>
                            {{$folio->res_id}}
                        </td>
                        <td>
                            {{number_format($folio->credit_total, 2)}}
                        </td>
                        <td>
                            {{number_format($folio->debit_total, 2)}}
                        </td>
                        <td>
                            {{number_format($folio->prog_balance, 2)}}
                        </td>

                        <td>
                            <a href="/payments/view/{{ $folio->folio_num }}" class="btn btn-primary">View This Folio</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-2">
            <br>
            <br />
            @if($exception_msg != 1)
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
                                        <input type="text" class="form-control" id="folio_num" name="folio_num">

                                        <label for="res_id">Reservation ID</label>
                                        <input type="text" class="form-control" id="res_id" name="res_id" readonly value="1">

                                        <label for="service_id">Service code</label>
                                        <select class="form-control" id="service_id" name="service_id">
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


            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modelBpost" style="width: 70%">Batch Posting</button><br /> <br />
            <div class="modal fade text-center" id="modelBpost" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-header">Batch Posting</h4>
                        </div>

                        <form role="form" id="addService" action="/payments/batchPost" method="post">
                            <div class="modal-body">
                                <p>Batch post a service to a set of folios.</p>

                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group">
                                    <label for="folio_num">Folio Numbers</label>
                                    <input type="text" class="form-control" id="folio_num" name="folio_num">
                                    <span class="help-block">Seperate each Folio ID with a space</span>

                                    <label for="service_id">Service code</label>
                                    <select class="form-control" id="service_id" name="service_id">
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
            @endif

        </div>
    </div>
</div>






<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

<script type="text/javascript" src="//cdn.datatables.net/1.10.6/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#folioTable').DataTable();
    });
</script>

</body>
</html>