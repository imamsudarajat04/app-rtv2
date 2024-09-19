<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Religions extends Model
{
    protected $table = 'religions';
    protected $fillable = ['name'];

    
    public function data_wargas(): HasMany
    {
        return $this->hasMany('App\Data_warga', 'religions_id', 'id');
    }
}
