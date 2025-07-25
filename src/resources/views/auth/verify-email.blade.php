@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Verifique seu e-mail</h1>

    <p class="mb-4 text-muted">
        Obrigado por se registrar! Antes de começar, verifique seu e-mail clicando no link que enviamos.
        Se você não recebeu o e-mail, enviaremos outro.
    </p>

    @if (session('status') === 'verification-link-sent')
        <div class="alert alert-success">
            Um novo link de verificação foi enviado para o e-mail fornecido.
        </div>
    @endif

    <div class="mt-4 d-flex justify-content-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit" class="btn btn-primary">
                Reenviar e-mail
            </button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-link text-danger">
                Sair
            </button>
        </form>
    </div>
</div>
@endsection