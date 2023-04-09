<?php

namespace App\Http\Controllers;

use App\Models\Institution;
use App\Models\Role;
use App\Models\Service;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class InstitutionController extends BaseController
{
    public function institutions() {
        $institutions = Institution::with('services')->get();
         return response()->json([
             'institutions' => $institutions
         ], 200);
    }
}