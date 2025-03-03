<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PenggunaController extends Controller
{
    use AuthorizesRequests;
    function index()
    {
        $this->authorize('aksesPengguna', User::class);
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

    function destroyPengguna(User $pengguna)
    {
        $pengguna->delete();
        return redirect()->route('pengguna')->with('status', 'Data Pengguna Berhasil Dihapus');
    }
}
