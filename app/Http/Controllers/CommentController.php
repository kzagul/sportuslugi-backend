<?php

namespace App\Http\Controllers;

use App\Http\Requests\Api\CreateService;
use App\Models\Institution;
use App\Models\Role;
use App\Models\Service;
use App\Models\User;
use App\Models\Sport;
use App\Models\Comment;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class CommentController extends BaseController
{
    public function getComments(): JsonResponse {
        $comments = Comment::with('services')
        ->get();
         return response()->json([
            'status' => 200,
            'comments' => $comments
         ], 200); 
    }
}
