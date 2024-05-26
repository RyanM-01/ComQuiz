<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class CustomizeController extends Controller
{
    //
    public function Customize()    {
        $user = Auth::user(); // Asumsi bahwa Anda menggunakan autentikasi Laravel dan user telah login
        return view('customize', compact('user'));
    }
}
