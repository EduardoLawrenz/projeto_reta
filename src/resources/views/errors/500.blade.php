@extends('layouts.guest')

@section('content')
<div class="container text-center mt-5">
    <h1 class="display-1 text-danger">500</h1>
    <h2 class="mb-4">Erro Interno do Servidor</h2>
    <p class="mb-4">Algo deu errado no servidor. Por favor, tente novamente mais tarde.</p>
    <a href="{{ url('/') }}" class="btn btn-primary">Voltar para Início</a>
</div>
@endsection