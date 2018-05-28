<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Socials extends Model
{
    protected $table = "socials";
    protected $fillable = ['name', 'icon', 'link', 'deleted'];
}
