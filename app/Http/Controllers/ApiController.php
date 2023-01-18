<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Models
use App\Models\User;
use App\Models\Log;

class ApiController extends Controller
{
    public function index()
    {
        $users = User::all();
        return $users;
    }

    public function show(Request $request, User $user)
    {
        Log::create([
            'ip' => $request->ip(),
            'agent' => $request->header('user-agent')
        ]);

        return $user->transactions;
    }
}
