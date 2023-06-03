<?php

namespace App\Http\Controllers;

use App\Http\Requests\Api\CreateService;
use App\Models\Institution;
use App\Models\Role;
use App\Models\Service;
use App\Models\User;
use App\Models\Sport;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class ServiceController extends BaseController
{
    public function getServices(): JsonResponse {
        $services = Service::with('institutions')
            ->with('sports')
            ->get();
         return response()->json([
            'status' => 200,
            'services' => $services
         ], 200); 
    }

    public function getService($service_id): JsonResponse {
        $service = Service::where('id', $service_id)
            ->with('institutions')
            ->with('sports')
            ->get();
        // ->with('institutions')->get();
         return response()->json([
            'status' => 200,
            'service' => $service[0]
         ], 200);
    }

    public function filterServices(): JsonResponse {
        $services = QueryBuilder::for(Service::class)
        ->allowedFilters(['name', 'type', 'isFree', 'price', 'sports.id', 'sports.name'])
        ->with('institutions')
        ->with('sports')
        ->get();
        return response()->json([
            'status' => 200,
            'services' => $services
         ], 200);
    }





    public function postService(CreateService $request): JsonResponse {
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

        $institutions_request = $request->institutions;
        $institutions = Institution::find($institutions_request);
        $service->institutions()->attach($institutions);
        
        // $array_sports = $request->input('sports');
        // foreach ($array_sports as $array_sport) {
        //     $sport = new Sport();
        //     $sport->name = $array_sport['name'];
        //     $sport->save();
        //     $service->sports()->attach($sport);
        // }
        // $service->institutions()->attach($institutions);

        // $sports = Sport::find(10);
        
        $sports_request = $request->sports;

        $sports = Sport::findMany($sports_request);
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

    public function putService(Request $request, $service_id): JsonResponse {
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

    public function deleteService($service_id): JsonResponse {
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