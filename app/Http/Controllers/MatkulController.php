<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matkul;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
class MatkulController extends Controller
{
    public function create()
    {
        return view('admin.creatematkul');
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|string|max:10|unique:matkul,code',
            'name' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'semester'=> 'required|string|max:2',
        ]);

        Matkul::create([
            'code' => $request->input('code'),
            'name' => $request->input('name'),
            'semester'=>$request->input('semester'),
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Matkul created successfully.');
    }

    public function edit($id)
    {
        $matkul = Matkul::findOrFail($id);
        return view('admin.matkulupdate', compact('matkul'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'code' => 'required|string|max:6|unique:matkul,code,'.$id,
            'name' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'semester'=> 'nullable|string|max:2',
        ]);

        $matkul = Matkul::findOrFail($id);
        $matkul->code = $request->input('code');
        $matkul->name = $request->input('name');
        $matkul->semester = $request->input('semester');

        // Update photo if provided
        if ($request->hasFile('photo')) {
            // Hapus foto lama jika ada
            if ($matkul->photo) {
                Storage::delete('public/photos/' . $matkul->photo);
            }

            // Simpan foto baru ke storage
            $path = $request->file('photo')->store('photos', 'public');

            // Ambil nama file dari path baru untuk disimpan di database
            $fileName = basename($path);
            $matkul->photo = $fileName; // Store file path, not the file itself
        }

        // Simpan perubahan
        $matkul->save();
        return redirect()->route('admin.dashboard')->with('success', 'Matkul updated successfully.');
    }


    public function destroy($id)
    {
        $matkul = Matkul::findOrFail($id);
        $matkul->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Matkul deleted successfully.');
    }

}