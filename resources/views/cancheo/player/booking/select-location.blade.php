<!-- resources/views/cancheo/player/booking/select-location.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="fw-bold mb-4">Seleccioná tu ubicación</h2>

    <form action="{{ route('player.booking.courts') }}" method="GET">
        <input type="hidden" name="sport_id" value="{{ $sport_id }}">

        <div class="row mb-4">
            <div class="col-md-4">
                <label class="form-label">Provincia</label>
                <select name="provincia" class="form-select" required>
                    <option value="">Seleccioná</option>
                    <option>San José</option>
                    <option>Alajuela</option>
                    <option>Cartago</option>
                    <option>Heredia</option>
                    <option>Puntarenas</option>
                    <option>Limón</option>
                    <option>Guanacaste</option>
                </select>
            </div>
            <div class="col-md-4">
                <label class="form-label">Cantón</label>
                <select name="canton" class="form-select">
                    <option value="">Seleccioná</option>
                </select>
            </div>
            <div class="col-md-4">
                <label class="form-label">Distrito</label>
                <select name="distrito" class="form-select">
                    <option value="">Seleccioná</option>
                </select>
            </div>
        </div>

        <div class="d-flex justify-content-between align-items-center mb-4">
            <button type="submit" class="btn btn-success px-4" style="border-radius: 0.75rem;">
                Ver canchas por ubicación
            </button>
            <a href="{{ route('player.booking.courts', ['sport_id' => $sport_id, 'nearby' => true]) }}" class="btn btn-outline-primary px-4" style="border-radius: 0.75rem;">
                Ver 5 más cercanas
            </a>
        </div>
    </form>
</div>
@endsection
