<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstitutionVisit extends Model
{
    use HasFactory;

    protected $guarded = [];  

    protected $fillable = [
        'user_id',
        'institution_id',
        'visited_at',
    ];
}
