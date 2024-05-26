<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class SignUpController extends Controller
{
    //
    public function index()
    {
        return view('signup');
    }

    public function signup(Request $request)
    {
        $data = $request->all();
        User::create($data);
        return redirect()->route('welcome')->with('success', 'Register berhasil!');
    }
}
