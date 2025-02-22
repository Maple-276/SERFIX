@extends('layouts.app')

@section('content')
<div class="content-wrapper" style="background-image: url('{{ asset('storage/images/Fondo_servix.jpg') }}'); background-size: cover;">
    <h1>Gestión inteligente en un solo lugar</h1>
    <h2>Simplificamos la gestión, concéntrate en reparar</h2>
    <div class="button-container" style="text-align: center;">
        <button style="background-color: red; margin: 10px;">Botón 1</button>
        <button style="background-color: red; margin: 10px;">Botón 2</button>
        <button style="background-color: red; margin: 10px;">Botón 3</button>
    </div>
</div>
@endsection