<?php

namespace App\Http\Controllers;

use App\Models\Institution;
use App\Models\Role;
use App\Models\Service;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function users() {
        $users = User::with('roles')->get();
         return response()->json([
             'users' => $users
         ], 200);
    }

    public function roles() {
        $roles = Role::with('users')->get();
         return response()->json([
             'roles' => $roles
         ], 200);
    }

    public function services() {
        $roles = User::with('services')->get();
         return response()->json([
             'services' => $roles
         ], 200);
    }
}