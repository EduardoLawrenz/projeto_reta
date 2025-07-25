@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Redefinir Senha</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input id="email" type="email" name="email" value="{{ old('email', $request->email) }}" required class="form-control" autofocus>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Nova senha</label>
            <input id="password" type="password" name="password" required class="form-control">
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirmar nova senha</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required class="form-control">
        </div>

        <button type="submit" class="btn btn-success">
            Redefinir senha
        </button>
    </form>
</div>
@endsection
