<?php

namespace App\Http\Controllers\Player;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Reservation;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $reservas = Reservation::where('user_id', $user->id)
            ->latest()
            ->take(3)
            ->get();

        $total = Reservation::where('user_id', $user->id)->count();

        return view('cancheo.player.dashboard', compact('reservas', 'total'));
    }
}
