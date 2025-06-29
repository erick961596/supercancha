<!-- resources/views/cancheo/player/booking/court-detail.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-7">
            @if (!empty($court->images) && is_array($court->images))
                <img src="{{ asset('storage/' . $court->images[0]) }}" class="img-fluid rounded-4 mb-3" style="width: 100%; object-fit: cover;">
            @else
                <img src="https://via.placeholder.com/800x400.png?text=Cancha" class="img-fluid rounded-4 mb-3" style="width: 100%; object-fit: cover;">
            @endif
            <p class="text-muted">{{ $court->rules ?? 'Sin reglas específicas para esta cancha.' }}</p>
        </div>
        <div class="col-md-5">
            <h2 class="fw-bold">{{ $court->name }}</h2>
            <p class="mb-1 text-muted">{{ $court->venue->province }}, {{ $court->venue->canton }}, {{ $court->venue->district }}</p>
            <p class="text-muted">{{ $court->venue->address }}</p>
            <p><strong>Deporte:</strong> {{ $court->sport->name }}</p>
            <p><strong>Precio:</strong> ₡{{ number_format($court->schedules->first()->price ?? 0, 0) }} por hora</p>

            <div class="d-flex gap-2 mb-3">
                <a href="https://waze.com/ul?ll={{ $court->venue->latitude }},{{ $court->venue->longitude }}&navigate=yes" target="_blank" class="btn btn-outline-secondary" style="border-radius: 0.75rem;">Ir con Waze</a>
                <a href="#" class="btn btn-success" style="border-radius: 0.75rem;">Reservar ahora</a>
            </div>

            <div>
                <h6 class="fw-semibold">Contacto</h6>
                <p class="mb-1">Correo: {{ $court->venue->email }}</p>
                <p>Teléfono/SINPE: {{ $court->venue->phone }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
