<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Institution;

class CountVisits
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //Get the first row that contain the dashboard information
        $institution = Institution::where('id', 1)->first(); 
        
        //Get the current visits counter
        $counter = $institution->view_count;
        $updated_counter = $counter++;

        //Update the field
        $institution->update([
            'view_count' => $updated_counter
        ]);

        return $next($request);
    }
}
