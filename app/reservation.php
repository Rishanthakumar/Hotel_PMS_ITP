<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reservation extends Model
{
    protected $primaryKey = 'res_id';
    protected $table ='reservation';
    public $timestamps  = false;

    protected $fillable = [
        'cus_id',
        'nights',
        'date',
        'status',
        'online',
        'check_out',
        'check_in',
        'adults',
        'children',
        'no_of_rooms'

    ];



    public function scopeRelevantReservation($query,$res_id){

        return $query->findOrFail($res_id);

    }
}

