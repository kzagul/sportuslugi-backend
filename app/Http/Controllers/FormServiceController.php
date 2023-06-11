<?php

namespace App\Http\Controllers;

use App\Models\Institution;
use App\Models\Role;
use App\Models\Service;
use App\Models\User;
use App\Models\FormService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class FormServiceController extends BaseController
{
    public function get(): JsonResponse {
        $formServices = FormService::get();
            // ::with('services')
            // ->with('institutions')
            // ->get();
         return response()->json([
            'status' => 200,
            'form_services' => $formServices
         ], 200);
    }

    public function getByUserId($user_id): JsonResponse {
        $formServices = FormService::where('user_id', $user_id)->get();;
            // ::with('services')
            // ->with('institutions')
            // ->get();
         return response()->json([
            'status' => 200,
            'form_services' => $formServices
         ], 200);
    }

    public function getByServiceId(): JsonResponse {
        $formServices = FormService::get();
            // ::with('services')
            // ->with('institutions')
            // ->get();
         return response()->json([
            'status' => 200,
            'form_services' => $formServices
         ], 200);
    }

    public function post(Request $request): JsonResponse {
        $formService = FormService::create([
            'user_id' => $request->user_id,
            'service_id' => $request->service_id,
            'title' => $request->title,
            'content' => $request->content,
            'sent_at' => $request->sent_at,
        ]);
        if($formService) {
            return response()->json([
                'status' => 200,
                'message' => 'created',
                'form_service' => $formService
            ], 200);
        } else {
            return response()->json([
                'status' => 500,
                'message' => 'something went wrong',
            ], 500);
        }
    }
}