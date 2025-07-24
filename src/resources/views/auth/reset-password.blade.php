<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <img src="https://upload.wikimedia.org/wikipedia/commons/9/9a/Logo_RETA.png" alt="RETA Logo" class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="text-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('password.store') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- E-mail -->
            <div class="mt-4">
                <x-label for="email" value="E-mail" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus />
            </div>

            <!-- Senha -->
            <div class="mt-4">
                <x-label for="password" value="Nova senha" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required />
            </div>

            <!-- Confirmação -->
            <div class="mt-4">
                <x-label for="password_confirmation" value="Confirmar nova senha" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    Redefinir senha
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
