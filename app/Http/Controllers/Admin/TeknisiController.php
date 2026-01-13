<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class TeknisiController extends Controller
{
    public function index()
    {
        $teknisis = User::where('role', 'teknisi')->get();
        return view('admin.teknisi.index', compact('teknisis'));
    }

    public function show(User $teknisi)
    {
        return view('admin.teknisi.show', compact('teknisi'));
    }

    public function create()
    {
        return view('admin.teknisi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|unique:users',
            'email' => 'required|string|email|unique:users',
            'departemen' => 'nullable|string',
            'phone' => 'nullable|string',
            'password' => 'required|string|min:6|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'role' => 'teknisi',
            'departemen' => $request->departemen,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.teknisi.index')->with('success', 'Teknisi berhasil ditambahkan.');
    }

    public function edit(User $teknisi)
    {
        return view('admin.teknisi.edit', compact('teknisi'));
    }

    public function update(Request $request, User $teknisi)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|unique:users,username,' . $teknisi->id,
            'email' => 'required|string|email|unique:users,email,' . $teknisi->id,
            'departemen' => 'nullable|string',
            'phone' => 'nullable|string',
        ]);

        $teknisi->update($request->only(['name','username','email','departemen','phone']));

        if ($request->filled('password')) {
            $teknisi->update([
                'password' => Hash::make($request->password),
            ]);
        }

        return redirect()->route('admin.teknisi.index')->with('success', 'Teknisi berhasil diupdate.');
    }

    public function destroy(User $teknisi)
    {
        $teknisi->delete();
        return redirect()->route('admin.teknisi.index')->with('success', 'Teknisi berhasil dihapus.');
    }
}
