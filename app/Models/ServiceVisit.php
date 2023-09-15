<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceVisit extends Model
{
    use HasFactory;

    protected $guarded = [];  

    protected $fillable = [
        'user_id',
        'service_id',
        'institution_id',
        'visited_at',
    ];
}
