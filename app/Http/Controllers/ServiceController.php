<?php

namespace App\Http\Controllers;

use App\Models\Institution;
use App\Models\Role;
use App\Models\Service;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class ServiceController extends BaseController
{
    public function getServices() {
        $services = Service::with('institutions')->get();
         return response()->json([
            'status' => 200,
            'services' => $services
         ], 200);
    }

    public function getService($service_id) {
        $service = Service::where('id', $service_id)->with('institutions')->get();
        // ->with('institutions')->get();
         return response()->json([
            'status' => 200,
            'service' => $service
         ], 200);
    }

    public function postService(Request $request) {
        $service = Service::create([
            'name' => $request->name
        ]);
        // $service = Service::create($request->all());
        if($service) {
            return response()->json([
                'status' => 200,
                'message' => 'service created',
                'data' => $service
            ], 200);
        } else {
            return response()->json([
                'status' => 500,
                'message' => 'something went wrong',
            ], 500);
        }
    }
}