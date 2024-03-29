<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = [];  

    public function services() {
        return $this->belongsToMany(Service::class);
    }

    public function institutions() {
        return $this->belongsToMany(Institution::class);
    }
}
