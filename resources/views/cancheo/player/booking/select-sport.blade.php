<!-- resources/views/cancheo/player/booking/select-sport.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="fw-bold mb-4">¿Qué deporte querés jugar?</h2>

    <div class="row">
        @forelse ($sports as $sport)
            <div class="col-md-4 mb-4">
                <div class="card h-100 border-0 rounded-4 shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title fw-semibold">{{ $sport->name }}</h5>
                        <a href="{{ route('player.booking.location', ['sport_id' => $sport->id]) }}" class="btn btn-success mt-3 w-100" style="border-radius: 0.75rem;">
                            Elegir {{ strtolower($sport->name) }}
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-muted">No hay deportes disponibles en este momento.</p>
        @endforelse
    </div>
</div>
@endsection
