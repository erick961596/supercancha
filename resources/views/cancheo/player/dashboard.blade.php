<!-- resources/views/cancheo/player/dashboard.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="mb-4">
        <h2 class="fw-bold">¡Hola {{ Auth::user()->name }}!</h2>
        <p class="text-muted">Estas son tus últimas reservas:</p>
    </div>

    <div class="row mb-5">
        <div class="col-md-4">
            <div class="bg-white p-4 rounded-4 border">
                <h5 class="text-muted">Total de reservas</h5>
                <h2 class="text-success">{{ $total }}</h2>
            </div>
        </div>
        <div class="col-md-8">
            <div class="bg-white p-4 rounded-4 border">
                <h5 class="mb-3">Recientes</h5>
                @forelse ($reservas as $reserva)
                    <div class="mb-2">
                        <strong>{{ $reserva->court->name }}</strong> - {{ $reserva->date }} a las {{ \Carbon\Carbon::parse($reserva->start_time)->format('H:i') }}
                    </div>
                @empty
                    <p class="text-muted">No tenés reservas aún.</p>
                @endforelse
            </div>
        </div>
    </div>

    <div class="text-center">
        <a href="{{ route('player.booking.sport') }}" class="btn btn-lg btn-success px-5 py-3" style="border-radius: 1rem; font-weight: bold; font-size: 1.25rem;">
            ¿Listo para jugar?
        </a>
    </div>
</div>
@endsection
