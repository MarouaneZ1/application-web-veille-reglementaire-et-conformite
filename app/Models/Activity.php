<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;
    public $table = "activity";
    protected $fillable = [
        'name',
        'enabled',
        'n2_activity_id',
        'code',
        'section_id',
        'n1_activity_id'
    ];
}
