<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = "clients";
    protected $fillable = ['name', 'surname', 'mail', 'phone', 'serial_number', 'deleted'];
}
