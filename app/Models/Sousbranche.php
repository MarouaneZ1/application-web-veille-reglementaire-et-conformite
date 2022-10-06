<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sousbranche extends Model
{
    use HasFactory;
    public $table = "n2_activities";
    protected $fillable = [
        'n1_activity_id',
        'code',
        'name',
        'section_id'
    ];
    
}
