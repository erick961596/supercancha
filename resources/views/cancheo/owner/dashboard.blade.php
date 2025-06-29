<!-- resources/views/owner/dashboard.blade.php -->
@extends('layouts.app')
@section('content')
<h1 class="mb-4">Panel del Dueño</h1>
<div class="row">
    <div class="col-md-6">
        <div class="card card-custom p-4 mb-4">
            <h5 class="text-muted">Tus canchas registradas</h5>
            <ul>
                <li>Cancha El Mirador</li>
                <li>Fútbol 5 San José</li>
            </ul>
            <a href="#" class="btn btn-success mt-2">Añadir nueva cancha</a>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card card-custom p-4 mb-4">
            <h5 class="text-muted">Reservas de hoy</h5>
            <ul>
                <li>09:00 - El Mirador (Reservado)</li>
                <li>11:00 - Fútbol 5 SJ (Pendiente)</li>
            </ul>
        </div>
    </div>
</div>
@endsection
