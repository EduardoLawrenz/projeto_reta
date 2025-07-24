@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Entrar</h1>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Erro!</strong> Verifique os campos obrigatórios.<br><br>
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="mb-3">
            <label for="email" class="form-label">Endereço de E-mail</label>
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Senha</label>
            <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password">
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" name="remember" id="remember">
            <label class="form-check-label" for="remember">Lembrar-me</label>
        </div>

        <button type="submit" class="btn btn-primary">Entrar</button>
    </form>
</div>
@endsection