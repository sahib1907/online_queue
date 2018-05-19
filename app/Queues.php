<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Queues extends Model
{
    protected $table = "queues";
    protected $fillable = ['client_id', 'service_id', 'date', 'queue', 'code', 'deleted'];
}
