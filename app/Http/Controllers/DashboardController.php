<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class DashboardController extends Controller

{
    public function dashboard()
    {
        $user = Auth::user(); // Asumsi bahwa Anda menggunakan autentikasi Laravel dan user telah login
        return view('dashboard', compact('user'));
    }
    
    
}