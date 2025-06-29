<!-- resources/views/cancheo/player/booking/reserve-time.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="fw-bold mb-4">Reservar en {{ $court->name }}</h2>
    <p class="text-muted mb-4">Seleccioná la fecha y hora para tu partido.</p>

    <form action="{{ route('player.reservations.store') }}" method="POST">
        @csrf
        <input type="hidden" name="court_id" value="{{ $court->id }}">

        <div class="mb-3">
            <label for="date" class="form-label">Fecha</label>
            <input type="date" name="date" id="date" class="form-control" required min="{{ now()->toDateString() }}">
        </div>

        <div class="mb-3">
            <label for="start_time" class="form-label">Hora</label>
            <select name="start_time" id="start_time" class="form-select" required>
                @foreach ($availableTimes as $time)
                    <option value="{{ $time }}">{{ $time }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="payment_type" class="form-label">Método de pago</label>
            <select name="payment_type" id="payment_type" class="form-select" required>
                <option value="sinpe">SINPE móvil</option>
                <option value="efectivo">Pago en sitio</option>
            </select>
        </div>

        <div class="d-grid">
            <button type="submit" class="btn btn-success" style="border-radius: 0.75rem; font-weight: bold;">
                Confirmar reserva
            </button>
        </div>
    </form>
</div>
@endsection
