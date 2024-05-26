<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{

    public function index()
    {
        return view('welcome');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($request->only('username', 'password'))) {
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('dashboard');
            }
        } else {
            return 'Username or Password is incorrect';
        }
    }
    
    public function profile(){
        $user = auth()->user();
        return view('profile', compact('user'));
    }
    public function update(Request $request, string $id)
{
    // Validasi data
    $request->validate([
        'fullname' => 'required',
        'username' => 'required',
        'email' => 'required|email',
        'password' => 'nullable',
        'gender' => 'required|in:L,P',
        'url_foto' => 'nullable|image|max:2048',
    ]);

    // Cari user berdasarkan ID
    $user = User::findOrFail($id);

    // Update data user
    $user->fullname = $request->fullname;
    $user->username = $request->username;
    $user->email = $request->email;
    if ($request->filled('password')) {
        $user->password = Hash::make($request->password); // Hash the password before saving
    }
    $user->gender = $request->gender;

    // Update foto jika ada
    if ($request->hasFile('url_foto')) {
        // Hapus foto lama jika ada
        if ($user->photo) {
            Storage::delete('public/photos/' . $user->photo);
        }

        // Simpan foto baru ke storage
        $path = $request->file('url_foto')->store('photos', 'public');

        // Ambil nama file dari path baru untuk disimpan di database
        $fileName = basename($path);
        $user->photo = $fileName;
    }

    // Simpan perubahan
    $user->save();

    $update = 'Data berhasil di edit';
    if (Auth::user()->role === 'admin') {
        return redirect()->route('admin.profile')->with(compact('update'));
    }

    return redirect()->route('profile')->with(compact('update'));
}


    public function logout(Request $request)
    {
        Auth::logout(); // Keluar dari sesi pengguna

        // Invalidate the session
        $request->session()->invalidate();

        // Regenerate CSRF token
        $request->session()->regenerateToken();

        // Redirect to the login page or homepage
        return redirect('welcome')->with('success', 'Logout berhasil!');
    }
 
}


