<!-- resources/views/admin/dashboard.blade.php -->
@extends('layouts.app')
@section('content')
<h1 class="mb-4">Panel de Administrador</h1>
<div class="row">
    <div class="col-md-4">
        <div class="card card-custom p-4">
            <h5 class="text-muted">Usuarios registrados</h5>
            <h2>123</h2>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-custom p-4">
            <h5 class="text-muted">Canchas activas</h5>
            <h2>58</h2>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-custom p-4">
            <h5 class="text-muted">Reservas hoy</h5>
            <h2>32</h2>
        </div>
    </div>
</div>
@endsection
