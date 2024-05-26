<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Models\Matkul;

class AdminController extends Controller
{
    //

    public function index()
    {
        // Fetch the authenticated user
        $user = Auth::user();

        // Fetch all Matkuls from the database
        $matkuls = Matkul::all();

        // Pass both user and Matkul data to the view
        return view('admin.dashboard', compact('user', 'matkuls'));
    }
    
    public function scoreboard()
    {
    $user = Auth::user();
    // Mengambil semua pengguna dan mengurutkan berdasarkan skor secara descending
    $users = User::orderBy('score', 'desc')->get();

    // Melewatkan data pengguna dan pengguna yang sedang login ke view
    return view('admin.scoreboard', compact('users', 'user'));
    }


    public function GetShop()
    {
        $user = Auth::user();
        return view('admin.shop', compact('user'));
    }

    public function profile()
    {
        $user = Auth::user();
        return view('admin.profile', compact('user'));
    }




    
    public function addSubject(Request $request)
    {
        // Logika untuk menambahkan matakuliah
    }

    public function createQuiz(Request $request)
    {
        // Logika untuk membuat kuis
    }

    public function deleteQuiz($id)
    {
        // Logika untuk menghapus kuis
    }

    public function addChapter(Request $request)
    {
        // Logika untuk menambahkan bab
    }
}
