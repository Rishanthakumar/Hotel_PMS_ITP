<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Amaya Resort Management System</title>

    <meta name="" content="">
    <meta name="" content="">

    <!--<link href="css/bootstrap.min.css" rel="stylesheet">-->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<div class="container">
    <div class="row">
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
                Currency Exchange System
            </h4>
            {{--<div class="row">--}}
                {{--<div class="col-lg-2">
                    --}}{{--<a href="/cashiering" class="btn btn-default">Home</a>--}}{{--
                </div>--}}

                {{--<div class="col-lg-2">--}}

                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modalViewHistory" style="width: 15%; margin-left: 7%; margin-top: -5.55%">Exchange History</button><br /> <br />
                    <div class="modal fade text-center" id="modalViewHistory" role="dialog">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-header">View Exchange History</h4>
                                </div>
                                <div class="modal-body">
                                    <p>View all history related to Currency Exchange.</p>

                                    <table class="table table-hover table-condensed table-bordered">
                                        <thead class="alert-success">
                                        <tr>
                                            <th>
                                                Exchange ID
                                            </th>
                                            <th>
                                                In Currency
                                            </th>
                                            <th>
                                                Out Currency
                                            </th>
                                            <th>
                                                In Amount
                                            </th>
                                            <th>
                                                Out Amount
                                            </th>
                                            <th>
                                                Commission Rate
                                            </th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        @foreach($exchange_history as $history)
                                            <tr class="active">
                                                <td>
                                                    {{$history->exchange_id}}
                                                </td>
                                                <td>
                                                    {{$history->in_cur}}
                                                </td>
                                                <td>
                                                    {{$history->out_cur}}
                                                </td>
                                                <td>
                                                    {{$history->in_amt}}
                                                </td>
                                                <td>
                                                    {{$history->out_amt}}
                                                </td>
                                                <td>
                                                    {{$history->commission}}
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>

                {{--</div>--}}

                {{--<div class="col-lg-8">
                </div>--}}
           {{-- </div>--}}

        {{--</div>--}}

    </div>

    <div class="row">
        <div class="col-md-8">

            {{--@if($errors->any())
                <ul class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            @endif--}}

            <form role="form" class="form-inline" action="/currencyConvert/convert" method="post">

                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="row">
                    <div class="col-lg-2">
                        <label for="InCur">In Currency : </label>
                    </div>
                    <div class="col-lg-10">
                        <select class="form-control" id="InCur" name="InCur" style="width: 20%">
                            @foreach($json['rates']as $code=>$rate)
                                <option>{{$code}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-lg-2">
                        <label for="OutCur">Out  Currency : </label>
                    </div>
                    <div class="col-lg-10">
                        <select class="form-control" id="OutCur" name="OutCur" style="width: 20%">
                            @foreach($json['rates']as $code=>$rate)
                                <option>{{$code}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-lg-2">
                        <label for="amount">In Amount : </label>
                    </div>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" id="amount" name="amount" value="{{number_format($amt, 2)}}" style="width: 20%">
                        @if ($errors->has('amount')) <p class="help-block">{{ $errors->first('amount') }}</p> @endif
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-lg-2">
                        <label for="ExchAmt">Out Amount : </label>
                    </div>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" id="ExchAmt" name="ExchAmt" readonly value="{{number_format($handoverAmt, 2)}}" style="width: 20%">
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-lg-2">
                        <label for="commisionRate">Commission : </label>
                    </div>
                    <div class="col-lg-10">
                        <select class="form-control" id="commisionRate" name="commisionRate" style="width: 20%">
                            <option value="0.01">1%</option>
                            <option value="0.02">2%</option>
                            <option value="0.03" selected>3%</option>
                        </select>
                    </div>
                </div>

                {{--<br>

                <div class="row">
                    <div class="col-lg-2">
                        <label for="amount">Folio Num : </label>
                    </div>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" id="folio_num" name="folio_num">
                        @if ($errors->has('folio_num')) <p class="help-block">{{ $errors->first('folio_num') }}</p> @endif
                    </div>
                </div>--}}

                <br>

                <div class="row">
                    <div class="col-lg-2">

                    </div>
                    <div class="col-lg-10">
                        <button type="submit" class="btn btn-primary" id="submitCur">Submit</button>
                    </div>
                </div>

            </form>

        </div>

        <div class="col-md-4" style=" height: 480px; overflow: auto;">

            <table class="table table-hover table-condensed table-bordered">
                <thead class="alert-success">
                <tr>
                    <th>
                        Standard Currency Code
                    </th>
                    <th>
                        Exchange rate (compared to USD)
                    </th>
                </tr>
                </thead>
                <tbody>
                    @foreach($json['rates'] as $code=>$rate)
                        <tr class="active">
                            <td>
                                {{$code}}
                            </td>
                            <td>
                                {{$rate}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

</body>
</html>