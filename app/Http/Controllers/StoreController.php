<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class StoreController extends Controller
{
    //
    public function store(){
        $user = Auth::user(); // Asumsi bahwa Anda menggunakan autentikasi Laravel dan user telah login
        return view('store', compact('user'));
    }
}

