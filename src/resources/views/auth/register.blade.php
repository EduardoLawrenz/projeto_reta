@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Cadastro</h1>

    <form method="POST" action="{{ route('register') }}">
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
            <label for="name" class="form-label">Nome</label>
            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Senha</label>
            <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password">
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirme a Senha</label>
            <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>
        </div>

        <button type="submit" class="btn btn-success">Cadastrar</button>
    </form>
</div>
@endsection