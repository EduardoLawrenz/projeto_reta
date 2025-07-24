<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <img src="https://upload.wikimedia.org/wikipedia/commons/9/9a/Logo_RETA.png" alt="RETA Logo" class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            Esqueceu sua senha? Sem problemas. Informe seu e-mail e enviaremos um link para você redefini-la.
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="text-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- E-mail -->
            <div class="mt-4">
                <x-label for="email" value="E-mail" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    Enviar link de redefinição
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>