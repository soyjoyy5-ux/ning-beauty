<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FooterSetting extends Model
{
    protected $fillable = [
    'studio_name',
    'description',
    'phone',
    'working_hours',
    'location_label',
    'location_note',
    'instagram',
    'tiktok',
];

}
