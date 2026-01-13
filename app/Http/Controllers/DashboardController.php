<?php

namespace App\Http\Controllers;

use App\Models\PengajuanPerbaikan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            $totalPengajuan = PengajuanPerbaikan::count();
            $pendingPengajuan = PengajuanPerbaikan::where('status', 'Menunggu')->count();

            return view('admin.dashboard', compact('totalPengajuan', 'pendingPengajuan'));
        } else {
            return view('user.dashboard');
        }
    }
}
