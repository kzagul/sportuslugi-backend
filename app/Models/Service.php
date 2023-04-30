<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $guarded = [];  

    public function institutions() {
        return $this->belongsToMany(Institution::class);
        // return $this->belongsTo(Institution::class);
    }

    public function sports() {
        return $this->belongsToMany(Sport::class);
    }
}
