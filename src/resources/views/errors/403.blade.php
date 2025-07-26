@extends('layouts.guest')

@section('content')
<div class="container text-center mt-5">
    <h1 class="display-1 text-danger">403</h1>
    <h2 class="mb-4">Acesso Negado</h2>
    <p class="mb-4">Você não tem permissão para acessar esta página.</p>
    <a href="{{ url('/') }}" class="btn btn-primary">Voltar para Início</a>
</div>
@endsection