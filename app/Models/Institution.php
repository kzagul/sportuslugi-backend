<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    use HasFactory;

    protected $guarded = [];  

    public function services() {
        return $this->belongsToMany(Service::class);
    }

    public function sports() {
        return $this->belongsToMany(Sport::class);
    }

    public function contactUsers() {
        return $this->belongsToMany(User::class);
    }

    public function comments() {
        return $this->belongsToMany(Comment::class);
    }
}
