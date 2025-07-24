<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Perfil do Usuário') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('profile.update') }}">
                    @csrf
                    @method('PATCH')

                    <!-- Nome -->
                    <div>
                        <x-input-label for="name" :value="__('Nome')" />
                        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>

                    <!-- Email -->
                    <div class="mt-4">
                        <x-input-label for="email" :value="__('E-mail')" />
                        <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
                        <x-input-error class="mt-2" :messages="$errors->get('email')" />
                    </div>

                    <div class="flex items-center gap-4 mt-4">
                        <x-primary-button>{{ __('Salvar') }}</x-primary-button>

                        @if (session('status') === 'profile-updated')
                            <p
                                x-data="{ show: true }"
                                x-show="show"
                                x-transition
                                x-init="setTimeout(() => show = false, 3000)"
                                class="text-sm text-green-600"
                            >{{ __('Perfil atualizado.') }}</p>
                        @endif
                    </div>
                </form>
            </div>

            <!-- Form para deletar perfil -->
            <div class="mt-6 bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('profile.destroy') }}">
                    @csrf
                    @method('DELETE')

                    <x-danger-button onclick="return confirm('Tem certeza que deseja deletar seu perfil? Esta ação não pode ser desfeita.')">
                        {{ __('Deletar Perfil') }}
                    </x-danger-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
