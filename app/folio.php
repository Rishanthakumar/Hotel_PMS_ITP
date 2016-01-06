<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class folio extends Model
{
    protected $table = 'folio';
    protected $primaryKey = 'folio_num';
    public $timestamps = false;

    protected $fillable = [
        'credit_total',
        'debit_total',
        'prog_balance',
        'guest_status',
        'res_id'
    ];
}
