<?php

namespace App\Http\Controllers;

use App\Models\Institution;
use App\Models\Service;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function institutions() {
        $institutions = Institution::with('services')->get();
         return response()->json([
             'institutions' => $institutions
         ], 200);
    }

}
