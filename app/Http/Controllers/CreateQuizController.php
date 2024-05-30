<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Quiz;
use App\Models\Matkul;
use App\Models\Bab;
use Illuminate\Support\Facades\DB;
class CreateQuizController extends Controller
{

    
    public function create($matkulCode, $bab_id)
    {
        $user = Auth::user();
        $matkuls = DB::table('matkul')->get();
        $matkul = DB::table('matkul')->where('code', $matkulCode)->first();
        
        $babs = DB::table('bab')->get();
        $bab = DB::table('bab')->find($bab_id);
        
        if (!$matkul) {
            return redirect()->route('admin.dashboard')->withErrors('Matkul tidak ditemukan');
        }
        
        if (!$bab) {
            return redirect()->route('bab.index', ['matkulCode' => $matkul->code])->withErrors('Bab tidak ditemukan');
        }
        
        // Pastikan nama tabel yang benar
        $quizzes = DB::table('quiz')->where('bab_id', $bab_id)->get();

        return view('admin.createlistquiz', compact('user', 'matkuls', 'matkul', 'babs', 'bab', 'quizzes'));
    }
    
    
    public function edit($matkulCode, $bab_id, $quiz_id)
    {
        $user = Auth::user();

        $matkuls = DB::table('matkul')->get();
        $matkul = DB::table('matkul')->where('code', $matkulCode)->first();

        $babs = DB::table('bab')->get();
        $bab = DB::table('bab')->find($bab_id);

        // Pastikan nama tabel yang benar
        $quizzes = DB::table('quiz')->where('bab_id', $bab_id)->get();
        $quiz = DB::table('quiz')->where('id', $quiz_id)->first();

        if (!$matkul) {
            return redirect()->route('admin.dashboard')->withErrors('Matkul tidak ditemukan');
        }

        if (!$bab) {
            return redirect()->route('bab.index', ['matkulCode' => $matkul->code])->withErrors('Bab tidak ditemukan');
        }

        if (!$quiz) {
            return redirect()->route('bab.index', ['matkulCode' => $matkul->code])->withErrors('Quiz tidak ditemukan');
        }

        return view('admin.createquiz', compact('user', 'matkuls', 'matkul', 'babs', 'bab', 'quizzes', 'quiz'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'bab_id' => 'required|exists:bab,id',
            'quiz_desc' => 'required|string|max:255',
        ]);
    
        // Buat kuis baru
        Quiz::create([
            'bab_id' => $request->input('bab_id'),
            'quiz_desc' => $request->input('quiz_desc'),
            'matkul_code' => Bab::find($request->input('bab_id'))->matkul_code,
        ]);
    
        return redirect()->route('bab.index', $request->input('bab_id'))->with('success', 'Quiz created successfully.');
    }
}
