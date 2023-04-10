<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VprContentPerson;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserLogincontroller extends Controller
{
	public function index(Request $request)
	{
		// dd($request);
		$credentials = [
			'user_id' => $request['username'],
			'password' => $request['password'],
		];
		// dd(Auth::user());
		if (Auth::guard('front')->attempt($credentials)) {
			return redirect('/');
		} else {
			// return response()->json([
			// 	'status' => 0,
			// 	'message' => 'Thông tin đăng nhập không chính xác'
			// ]);
			return redirect()->back()->withErrors(['message' => 'Thông tin đăng nhập không chính xác']);
		}
	}

	public function logout(Request $request)
        {
            Auth::guard('front')->logout();
        
            // $request->session()->invalidate();
        
            // $request->session()->regenerateToken();
        
            return redirect('/');
        }
}
