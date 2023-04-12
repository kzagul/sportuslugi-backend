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

    public function getSport($sport_id) {
        $sport = Sport::where('id', $sport_id)->with('services')->get();
         return response()->json([
            'status' => 200,
            'sports' => $sport
         ], 200);
    }

    public function postSport(Request $request) {
        $sport = Sport::create([
            'name' => $request->name
        ]);
        if($sport) {
            return response()->json([
                'status' => 200,
                'message' => 'sport created',
                'data' => $sport
            ], 200);
        } else {
            return response()->json([
                'status' => 500,
                'message' => 'something went wrong',
            ], 500);
        }
    }

    public function putSport(Request $request, $sport_id) {
        $sport = Sport::find($sport_id);

        if($sport){
            $sport->update([
                'name' => $request->name
            ]);
            return response()->json([
                'status' => 200,
                'message' => 'sport updated',
                'data' => $sport
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'something went wrong',
            ], 404);
        }
    }

    public function deleteSport($sport_id) {
        $sport = Sport::find($sport_id);

        if($sport){
            $sport->delete();
            return response()->json([
                'status' => 200,
                'message' => 'sport deleted',
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'something went wrong',
            ], 404);
        }
    }
}