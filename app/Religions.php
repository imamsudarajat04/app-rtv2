<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Religions extends Model
{
    protected $table = 'religions';
    protected $fillable = ['name'];
}
