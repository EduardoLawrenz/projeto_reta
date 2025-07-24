<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <img src="https://upload.wikimedia.org/wikipedia/commons/9/9a/Logo_RETA.png" alt="RETA Logo" class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            Obrigado por se registrar! Antes de começar, por favor verifique seu e-mail clicando no link que enviamos.
            Se você não recebeu o e-mail, enviaremos outro.
        </div>

        @if (session('status') === 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                Um novo link de verificação foi enviado para o e-mail fornecido.
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <div>
                    <x-button>
                        Reenviar e-mail
                    </x-button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                    Sair
                </button>
            </form>
        </div>
    </x-auth-card>
</x-guest-layout>
