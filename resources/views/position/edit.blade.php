<x-app-layout>
    <x-body-layout>
        <section class="sm:py-4 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <header>
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    {{ __('Graduação') }}
                </h2>

                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Atualize as informações da graduação.') }}
                </p>
            </header>

            <form method="post" action="{{ route('position.update', $position->id) }}" class="mt-6 space-y-6">
                @csrf
                @method('patch')

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <x-input-label for="shortName" :value="__('Abreviação')" />
                        <x-text-input id="shortName" name="shortName" type="text" class="mt-1 block w-full"
                            :value="old('shortName', $position->shortName)" required autofocus autocomplete="shortName" />
                        <x-input-error class="mt-2" :messages="$errors->get('shortName')" />
                    </div>

                    <div>
                        <x-input-label for="name" :value="__('Nome')" />
                        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                            :value="old('name', $position->name)" required autocomplete="name" />
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>

                    <div>
                        <x-input-label for="priority" :value="__('Prioridade')" />
                        <x-text-input id="priority" name="priority" type="number" class="mt-1 block w-full"
                            :value="old('priority', $position->priority)" required autofocus autocomplete="priority" />
                        <x-input-error class="mt-2" :messages="$errors->get('priority')" />
                    </div>
                </div>

                <div class="flex items-center mt-6">
                    <x-secondary-link-button class="mr-4"
                        href="{{ route('position.index') }}">{{ __('Listar') }}</x-secondary-link-button>
                    <x-primary-button>{{ __('Salvar') }}</x-primary-button>
                    @if (session('status') === 'position-updated')
                        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 5000)"
                            class="ml-4 text-md text-green-600 dark:text-green-400">
                            {{ __('Salvo com sucesso.') }}</p>
                    @endif
                </div>
            </form>
        </section>
    </x-body-layout>
</x-app-layout>
