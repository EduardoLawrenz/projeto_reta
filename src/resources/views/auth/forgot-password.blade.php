@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Esqueceu sua senha?</h1>

    <p class="mb-4 text-muted">
        Sem problemas. Informe seu e-mail e enviaremos um link para redefinir sua senha.
    </p>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">
            Enviar link de redefinição
        </button>
    </form>
</div>
@endsection