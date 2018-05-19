<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CurrentQueue extends Model
{
    protected $table = "current_queue";
    protected $fillable = ['queue'];
}
