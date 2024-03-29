<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
    use HasFactory;

    protected $guarded = [];  

    public function institutions() {
        return $this->belongsToMany(Institution::class);
    }
    
    public function services() {
        return $this->belongsToMany(Service::class);
    }
}
