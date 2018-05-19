<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservations extends Model
{
    protected $table = "reservations";
    protected $fillable = ['client_id', 'service_id', 'date', 'time', 'code', 'deleted'];
}
