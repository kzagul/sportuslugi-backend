<?php

namespace App\Http\Controllers;

use App\Models\Institution;
use App\Models\Role;
use App\Models\Service;
use App\Models\User;
use App\Models\Sport;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class ServiceController extends BaseController
{
    public function getServices() {
        $services = Service::with('institutions')
            ->with('sports')
            ->get();
         return response()->json([
            'status' => 200,
            'services' => $services
         ], 200);
    }

    public function getService($service_id) {
        $service = Service::where('id', $service_id)
            ->with('institutions')
            ->with('sports')
            ->get();
        // ->with('institutions')->get();
         return response()->json([
            'status' => 200,
            'service' => $service
         ], 200);
    }

    public function postService(Request $request) {
        // working
        // $service = Service::create([
        //     'name' => $request->name
        // ]);
        // if($service) {
        //     return response()->json([
        //         'status' => 200,
        //         'message' => 'service created',
        //         'data' => $service
        //     ], 200);
        // } else {
        //     return response()->json([
        //         'status' => 500,
        //         'message' => 'something went wrong',
        //     ], 500);
        // }

        $service = Service::create([
            'name' => $request->name
        ]);

        $institutions = Institution::find(1);
        $sports = Sport::find(1);
        $service->institutions()->attach($institutions);
        $service->sports()->attach($sports);
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

    public function putService(Request $request, $service_id) {
        $service = Service::find($service_id);

        if($service){
            $service->update([
                'name' => $request->name
            ]);
            return response()->json([
                'status' => 200,
                'message' => 'service updated',
                'data' => $service
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'something went wrong',
            ], 404);
        }
    }

    public function deleteService($service_id) {
        $service = Service::find($service_id);

        if($service){
            $service->delete();
            return response()->json([
                'status' => 200,
                'message' => 'service deleted',
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'something went wrong',
            ], 404);
        }
    }
}