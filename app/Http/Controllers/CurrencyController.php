<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\currency_exchange;
use App\Http\Requests\CurrencyConvertRequest;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CurrencyController extends Controller
{
   public function getCurrency(){
       //getting the data from the api to $json.
       //$json = json_decode(file_get_contents('http://api.fixer.io/latest?base=USD'), true); //http://stackoverflow.com/questions/22355828/doing-http-requests-from-laravel-to-an-external-api
       $json = json_decode(file_get_contents('http://api.fixer.io/latest?base=USD&symbols=CNY,JPY,EUR,GBP'), true);
       $handoverAmt = 0.00;
       $amt = 0.00;
       $exchange_history = currency_exchange::all();
       return view('Cashiering/currencyExchange', compact('json','handoverAmt', 'exchange_history', 'amt'));
   }

    public function convertCurrency(CurrencyConvertRequest $request){

        $input = $request->all();

        $json = json_decode(file_get_contents('http://api.fixer.io/latest?base=USD&symbols=CNY,JPY,EUR,GBP'), true);
        $inCur = $json['rates'][$input['InCur']];
        $outCur = $json['rates'][$input['OutCur']];
        $amt = $input['amount'];
        $commission = $input['commisionRate']; //change this to db

        $extAmt = floatval($amt)/floatval($inCur) * floatval($outCur);

        $handoverAmt = $extAmt - ($extAmt*$commission);

        $folio_num = 1; //remove folio_num attribute

        try{
            currency_exchange::create(
                [
                    'in_cur' => $input['InCur'],
                    'out_cur' => $input['OutCur'],
                    'in_amt' => $amt,
                    'out_amt' => $handoverAmt,
                    'commission' => $commission,
                    'folio_num' => $folio_num, //remove folio_num attribute from db, here and the model
                ]
            );
        }

        catch(QueryException $e){
            return back()->withInput();
        }

        //updating the history data and sending it back
        $exchange_history = currency_exchange::all();

        return view('Cashiering/currencyExchange', compact('handoverAmt', 'json', 'exchange_history', 'amt'));
    }
}
