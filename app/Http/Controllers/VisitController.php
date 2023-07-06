<?php

namespace App\Http\Controllers;

use App\Models\Institution;
use App\Models\InstitutionVisit;
use App\Models\ServiceVisit;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class VisitController extends Controller
{
    // Посещений конкретного учреждения
    public function institutionVisits($institution_id)
    {
        $visitCount = InstitutionVisit::where('institution_id', $institution_id)->get();
        
        return response()->json(['visits' => $visitCount]);
    }

    // Всего посещений всех учреждений
    public function institutionsAllVisits()
    {
        $visitCount = InstitutionVisit::get();
        
        return response()->json(['visits' => $visitCount]);
    }

    // кол-во посещений конкретного учреждения
    public function institutionCountVisits($institution_id)
    {
        $visitCount = InstitutionVisit::where('institution_id', $institution_id)->count();
        
        return response()->json(['visit_count' => $visitCount]);
    }

    public function institutionsAllCountVisits() 
    {
        $visitCount = InstitutionVisit::count();
        
        return response()->json(['visit_count' => $visitCount]);
    }

    // добавить посещение учреждению
    public function institutionAddVisit(Request $request): JsonResponse
    {
        $institutionVisit = InstitutionVisit::create([
            'user_id' => $request->user_id,
            'institution_id' => $request->institution_id,
            'visited_at' => $request->visited_at,
        ]);
        
        if($institutionVisit) {
            return response()->json([
                'status' => 200,
                'message' => 'created',
                'institution_visit' => $institutionVisit
            ], 200);
        } else {
            return response()->json([
                'status' => 500,
                'message' => 'something went wrong',
            ], 500);
        }
    }

    // посещения конкрентой услуги
    public function serviceVisits($service_id)
    {
        $visitCount = ServiceVisit::where('service_id', $service_id)->get();
        
        return response()->json(['visits' => $visitCount]);
    }

    // посещения всех услуг
    public function servicesAllVisits()
    {
        $visitCount = ServiceVisit::get();
        
        return response()->json(['visits' => $visitCount]);
    }

    // кол-во посещений конкрентой услуги
    public function serviceCountVisits($institution_id)
    {
        $visitCount = ServiceVisit::where('institution_id', $institution_id)->count();
        
        return response()->json(['visit_count' => $visitCount]);
    }

    // добавить посещение услуге
    public function serviceAddVisit(Request $request): JsonResponse
    {
        $serviceVisit = ServiceVisit::create([
            'user_id' => $request->user_id,
            'service_id' => $request->service_id,
            'institution_id' => $request->institution_id,
            'visited_at' => $request->visited_at,
        ]);
        
        if($serviceVisit) {
            return response()->json([
                'status' => 200,
                'message' => 'created',
                'service_visit' => $serviceVisit
            ], 200);
        } else {
            return response()->json([
                'status' => 500,
                'message' => 'something went wrong',
            ], 500);
        }
    }
}