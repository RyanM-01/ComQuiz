<?php

// BabController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bab;
use App\Models\Matkul;
use Illuminate\Support\Facades\Auth;

class BabController extends Controller
{
    public function index($matkulCode)
    {
        $user = Auth::user();
        
        $matkul = Matkul::where('code', $matkulCode)->first();

        if (!$matkul) {
            return redirect()->route('admin.dashboard')->withErrors('Matkul tidak ditemukan');
        }

        $babs = Bab::where('matkul_code', $matkulCode)->get();

        return view('admin.bab', ['user' => $user, 'matkul' => $matkul, 'babs' => $babs]);
    }

    
    public function store(Request $request, $matkulCode)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Bab::create([
            'matkul_code' => $matkulCode,
            'name' => $request->name,
        ]);

        return redirect()->route('bab.index', $matkulCode);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $bab = Bab::find($id);
        $bab->name = $request->name;
        $bab->save();

        return redirect()->route('bab.index', $bab->matkul_code);
    }
}
