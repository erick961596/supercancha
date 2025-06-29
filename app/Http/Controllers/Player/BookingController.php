<?php

namespace App\Http\Controllers\Player;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sport;
use App\Models\Venue;
use App\Models\Court;

class BookingController extends Controller
{
    public function selectSport()
    {
        $sports = Sport::all();
        return view('cancheo.player.booking.select-sport', compact('sports'));
    }

    public function selectLocation(Request $request)
    {
        $sport_id = $request->input('sport_id');
        return view('cancheo.player.booking.select-location', compact('sport_id'));
    }

    public function listCourts(Request $request)
    {
        $sport_id = $request->input('sport_id');

        // Lógica para filtrar por ubicación o por geolocalización aquí

        $courts = Court::with('venue', 'sport')
            ->where('sport_id', $sport_id)
            ->get();

        return view('cancheo.player.booking.list-courts', compact('courts'));
    }
}
