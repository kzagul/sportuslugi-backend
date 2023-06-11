<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormService extends Model
{
    use HasFactory;

    protected $guarded = [];  

    protected $fillable = [
        'user_id',
        'service_id',
        'title',
        'content',
        'sent_at',
    ];
}
