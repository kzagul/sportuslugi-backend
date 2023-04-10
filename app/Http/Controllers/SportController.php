<?php

namespace App\Http\Controllers;

use App\Models\Institution;
use App\Models\Role;
use App\Models\Service;
use App\Models\Sport;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class SportController extends BaseController
{
    public function getSports() {
        $sports = Sport::with('services')->get();
         return response()->json([
            'status' => 200,
            'sports' => $sports
         ], 200);
    }
}