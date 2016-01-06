<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class currency_exchange extends Model
{
    protected $table = 'currency_exchange';
    protected $primaryKey = 'exchange_id';
    public $timestamps = false;

    protected $fillable = [
        'in_cur',
        'out_cur',
        'in_amt',
        'out_amt',
        'commission',
        'folio_num'
    ];
}
