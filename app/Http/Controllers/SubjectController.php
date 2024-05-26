<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{
    //
    public function bab(){
        return view('bab');
    }
}
