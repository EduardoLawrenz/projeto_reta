<<<<<<< HEAD
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
=======
@extends('layouts.guest')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 text-center">
            <h2 class="mb-4">Verifique seu E-mail</h2>

            @if (session('status') == 'verification-link-sent')
                <div class="alert alert-success" role="alert">
                    Link de verificação enviado para seu e-mail.
                </div>
            @endif

            <p>Antes de continuar, por favor verifique seu e-mail clicando no link enviado.</p>
            <p>Se não recebeu o e-mail, clique no botão abaixo para reenviar.</p>

            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit" class="btn btn-primary">Reenviar E-mail de Verificação</button>
            </form>

            <form method="POST" action="{{ route('logout') }}" class="mt-3">
                @csrf
                <button type="submit" class="btn btn-secondary">Sair</button>
            </form>
        </div>
    </div>
</div>
@endsection
>>>>>>> d624a76 (Corrigindo diversos erros)
