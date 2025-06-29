<!-- resources/views/cancheo/player/booking/list-courts.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="fw-bold mb-4">Canchas disponibles</h2>

    <div class="row">
        @forelse ($courts as $court)
            <div class="col-md-6 mb-4">
                <div class="card border-0 rounded-4 overflow-hidden">
                    @if (!empty($court->images) && is_array($court->images))
                        <img src="{{ asset('storage/' . $court->images[0]) }}" class="card-img-top" style="height: 250px; object-fit: cover;">
                    @else
                        <img src="https://via.placeholder.com/600x250.png?text=Cancha" class="card-img-top" style="height: 250px; object-fit: cover;">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title fw-bold">{{ $court->name }}</h5>
                        <p class="mb-1 text-muted">{{ $court->venue->province }}, {{ $court->venue->canton }}, {{ $court->venue->district }}</p>
                        <p class="mb-2 text-muted">{{ $court->venue->address }}</p>
                        <p class="mb-3 fw-semibold">₡{{ number_format($court->schedules->first()->price ?? 0, 0) }} por hora</p>

                        <div class="d-flex gap-2">
                            <a href="https://waze.com/ul?ll={{ $court->venue->latitude }},{{ $court->venue->longitude }}&navigate=yes" target="_blank" class="btn btn-outline-secondary btn-sm" style="border-radius: 0.75rem;">
                                Waze
                            </a>
                            <a href="#" class="btn btn-success btn-sm" style="border-radius: 0.75rem;">
                                Reservar cancha
                            </a>
                            <a href="{{ route('player.venue.show', $court->id) }}" class="btn btn-outline-primary btn-sm" style="border-radius: 0.75rem;">
                                Ver detalles
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-muted">No se encontraron canchas para esta búsqueda.</p>
        @endforelse
    </div>
</div>
@endsection
