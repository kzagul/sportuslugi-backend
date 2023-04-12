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

class InstitutionController extends BaseController
{
    public function getInstitutions() {
        $institutions = Institution::with('services')->get();
         return response()->json([
            'status' => 200,
            'institutions' => $institutions
         ], 200);
    }

    public function getInstitution($institution_id) {
        $institution = Institution::where('id', $institution_id)->with('services')->get();
         return response()->json([
            'status' => 200,
            'institution' => $institution
         ], 200);
    }

    public function getInstitutionByName($institution_name) {
        $institution = Institution::where('name', $institution_name)->with('services')->get();
         return response()->json([
            'status' => 200,
            'institution' => $institution
         ], 200);
    }

    public function postInstitution(Request $request) {
        // working
        $institution = Institution::create([
            'name' => $request->name
        ]);
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


        
        // $institution = new Institution;
        // $institution->name = $request->input('name');
        // // $institution = Institution::create([
        // //     'name' => $request->name
        // // ]);
        // $institution->save();

        // // $services = $request->input('services');
        // $services = $request->get('services');
        // // $institution->services()->attach($services);
        // $institution->services()->sync($services);

        // // $service = $institution->services()->create([
        // //     'name' => 'My Service',
        // // ]);

        // if($institution) {
        //     return response()->json([
        //         'status' => 200, 
        //         'message' => 'institution created',
        //         'data' => $institution
        //     ], 200);
        // } else {
        //     return response()->json([
        //         'status' => 500,
        //         'message' => 'something went wrong',
        //     ], 500);
        // }
    }

    public function putInstitution(Request $request, $institution_id) {
        $institution = Institution::find($institution_id);

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

    public function deleteInstitution($institution_id) {
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