<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request){
        $email = $request->input('email');
        $password = $request->input('password');
        $user = new Auth();
        // $user->Name = $request->;
        $user->Email = $email;
        $user->Password = $password;
        $user = Auth::where('email', $email)
        ->where('password', $password)
        ->first();

        if ($user) {
            return 1;
        } else {
            return 0;
        }
    }
}
