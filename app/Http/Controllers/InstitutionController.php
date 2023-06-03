<?php

namespace App\Http\Controllers;

use App\Models\Institution;
use App\Models\Role;
use App\Models\Service;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class InstitutionController extends BaseController
{
    public function getInstitutions(): JsonResponse {
        $institutions = Institution::with('services')
            ->with('sports')
            // ->users
            ->with('contactUsers')
            ->get();
         return response()->json([
            'status' => 200,
            'institutions' => $institutions
         ], 200);
    }

    public function getInstitution($institution_id):JsonResponse {
        $institution = Institution::where('id', $institution_id)
            ->with('services')
            ->with('sports')
            ->with('contactUsers')
            ->get();
         return response()->json([
            'status' => 200,
            'institution' => $institution
         ], 200);
    }

    public function getInstitutionByName($institution_name): JsonResponse {
        $institution = Institution::where('name', $institution_name)->with('services')->get();
         return response()->json([
            'status' => 200,
            'institution' => $institution
         ], 200);
    }

    public function postInstitution(Request $request): JsonResponse {
        $institution = Institution::create([
            'name' => $request->name
        ]);

        // if($request->contactUsers){
        //     $contactUsers_request = $request->contactUsers;
        //     $contactUsers = User::find($contactUsers_request);
        // }
        
        if($institution) {
            return response()->json([
                'status' => 200,
                'message' => 'institution created',
                'data' => $institution
            ], 200);
        } else {
            return response()->json([
                'status' => 500,
                'message' => 'something went wrong',
            ], 500);
        }
    }

    public function putInstitution(Request $request, $institution_id): JsonResponse {
        $institution = Institution::find($institution_id);

        if($request->contact_users){
            $contactUsers_request = $request->contact_users;
            $contactUsers = User::find($contactUsers_request);
            // findMany
            // $contactUsers = User::where("email", $contactUsers_request->email);
            $institution->contactUsers()->attach($contactUsers);
        }

        // $institutions_request = $request->institutions;
        // $institutions = Institution::find($institutions_request);
        // $service->institutions()->attach($institutions);

        if($institution){
            // $institution->update([
            //     'name' => $request->name
            // ]);
            return response()->json([
                'status' => 200,
                'message' => 'institution updated',
                'data' => $institution
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'something went wrong',
            ], 404);
        }
    }

    public function putContactUser(Request $request, $institution_id): JsonResponse {
        $institution = Institution::find($institution_id);

        if($request->contactUser){
            $contact_users_request = $request->contactUser;
            $contactUsers = User::find($contact_users_request);
            // $contactUsers = User::where("email", $contactUsers_request->email);
            $institution->contactUsers()->attach($contactUsers);
        }

        if($institution){
            $institution->update([
                'name' => $request->name
            ]);
            return response()->json([
                'status' => 200,
                'message' => 'institution updated',
                'data' => $institution
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'something went wrong',
            ], 404);
        }
    }

    public function deleteInstitution($institution_id): JsonResponse {
        $institution = Institution::find($institution_id);

        if($institution){
            $institution->delete();
            return response()->json([
                'status' => 200,
                'message' => 'institution deleted',
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'something went wrong',
            ], 404);
        }
    }
}