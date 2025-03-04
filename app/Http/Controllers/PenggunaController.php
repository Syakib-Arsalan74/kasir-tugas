<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    function index()
    {
        return view('kasirPanel.pengguna', ['users' => User::search(request(['search', 'role']))->latest()->get(), 'roles' => ['kasir', 'admin']]);
    }

    public function createPengguna(Request $request)
    {
        $data = $request->validate([
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required|in:kasir,admin'
        ]);
        $data['password'] = bcrypt($data['password']);
        User::create($data);

        return redirect()->route('pengguna');
    }

    public function editPengguna(User $pengguna)
    {
        $pengguna = User::where('id', $pengguna->id)->first();
        return view('kasirPanel.editPengguna', ['pengguna' => $pengguna, 'roles' => ['kasir', 'admin']]);
    }

    public function updatePengguna(Request $request, $id)
    {
        $data = User::where('id', $id)->firstOrFail();
        $validateData = $request->validate([
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required|in:kasir,admin'
        ]);
        $data->update($validateData);
        return redirect()->route('pengguna')->with('status', 'Data Pengguna Berhasil Diedit');
    }

    function destroyPengguna(User $pengguna)
    {
        $pengguna->delete();
        return redirect()->route('pengguna')->with('status', 'Data Pengguna Berhasil Dihapus');
    }
}
