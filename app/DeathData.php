<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int id
 * @property string no_akte_kematian
 * @property string no_ktp
 * @property string name
 * @property string address
 * @property Carbon created_at
 * @property Carbon updated_at
 */
class DeathData extends Model
{
    protected $table = "death_data";

    protected $fillable = [
        "no_akte_kematian",
        "no_ktp",
        "name",
        "address"
    ];
}
