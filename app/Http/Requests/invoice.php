<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class invoice extends Model
{
    protected $table = 'invoice';
    protected $primaryKey = 'invoice_num';
    public $timestamps = false;

    protected $fillable = [
        'total_payment',
        'pay_method',
        'folio_num'
    ];
}
