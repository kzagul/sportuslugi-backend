<?php

namespace App\Http\Controllers;

use App\Models\Institution;
use App\Models\InstitutionVisit;
use App\Models\ServiceVisit;
use Illuminate\Http\Request;

class VisitController extends Controller
{
    public function institutionCountVisits($institution_id)
    {
        $visitCount = InstitutionVisit::where('institution_id', $institution_id)->count();
        
        return response()->json(['visit_count' => $visitCount]);
    }

    public function serviceCountVisits($service_id)
    {
        $visitCount = ServiceVisit::where('service_id', $service_id)->count();
        
        return response()->json(['visit_count' => $visitCount]);
    }
}