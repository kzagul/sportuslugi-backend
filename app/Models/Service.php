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

    public function users() {
        return $this->belongsToMany(User::class);
    }

    public function comments() {
        return $this->belongsToMany(Comment::class);
    }
}
