@extends('layouts.guest')

@section('content')
<div class="container text-center mt-5">
    <h1 class="display-1 text-danger">404</h1>
    <h2 class="mb-4">Página não encontrada</h2>
    <p class="mb-4">A página que você está procurando não existe ou foi removida.</p>
    <a href="{{ url('/') }}" class="btn btn-primary">Voltar para Início</a>
</div>
@endsection