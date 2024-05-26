<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class LeaderboardController extends Controller
{
    //
    public function scoreboard()
    {
        // Mengambil semua pengguna dan mengurutkan berdasarkan skor secara descending
        $users = User::orderBy('score', 'desc')->get();
    
        // Melewatkan data pengguna ke view
        return view('leaderboard', compact('users'));
    }
}
