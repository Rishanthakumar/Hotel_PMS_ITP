<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class folio_services extends Model
{
    protected $table = 'folio_services';
    //protected $primaryKey = ['service_id', 'folio_num', 'date'];
    protected $primaryKey = 'folio_num';
    public $timestamps = false;

    protected $fillable = [
        'service_id',
        'folio_num',
        'date',
        'price',
        'service_count'
    ];
}
