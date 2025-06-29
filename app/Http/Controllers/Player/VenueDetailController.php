<?php

namespace App\Http\Controllers\Player;

use App\Http\Controllers\Controller;
use App\Models\Court;

class VenueDetailController extends Controller
{
    public function show($id)
    {
        $court = Court::with('venue', 'sport')->findOrFail($id);
        return view('cancheo.player.booking.court-detail', compact('court'));
    }
}
