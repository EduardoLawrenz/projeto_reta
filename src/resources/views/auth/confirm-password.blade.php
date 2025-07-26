<<<<<<< HEAD
@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Confirmar Senha</h1>

    <p class="mb-4 text-muted">
        Esta é uma área segura do sistema. Por favor, confirme sua senha antes de continuar.
    </p>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <div class="mb-3">
            <label for="password" class="form-label">Senha</label>
            <input id="password" type="password" name="password" class="form-control" required autocomplete="current-password">
            @if ($errors->has('password'))
                <div class="text-danger mt-1">{{ $errors->first('password') }}</div>
            @endif
        </div>

        <div class="d-flex justify-content-end mt-4">
            <button type="submit" class="btn btn-primary">Confirmar</button>
        </div>
    </form>
=======
@extends('layouts.guest')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <h2 class="mb-4 text-center">Confirme sua Senha</h2>

            <p>Por favor, confirme sua senha antes de continuar.</p>

            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf

                <div class="mb-3">
                    <label for="password" class="form-label">Senha</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" autofocus>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary w-100">Confirmar</button>
            </form>
        </div>
    </div>
>>>>>>> d624a76 (Corrigindo diversos erros)
</div>
@endsection
