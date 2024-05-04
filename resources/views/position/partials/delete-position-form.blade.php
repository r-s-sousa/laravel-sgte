<x-danger-button x-data=""
    x-on:click.prevent="$dispatch('open-modal', 'confirm-position-deletion-{{ $position->id }}')">{{ __('Deletar') }}</x-danger-button>

<x-modal name="confirm-position-deletion-{{ $position->id }}" focusable>
    <form method="post" action="{{ route('position.destroy', $position->id) }}" class="p-6">
        @csrf
        @method('delete')

        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __("Você tem certeza que quer deletar a graduação: {$position->name}?") }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Você só conseguirá deletar a graduação de {$position->name}, se nenhum militar estiver relacionado a ela. Se deletada será de forma definitiva.") }}
        </p>

        <div class="mt-6">
            <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

            <x-text-input id="password_{{ $position->id }}" name="password" type="password" class="mt-1 block w-3/4"
                placeholder="{{ __('Password') }}" required />
        </div>

        <div class="mt-6 flex justify-end">
            <x-secondary-button x-on:click="$dispatch('close')">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-danger-button class="ms-3">
                {{ __('Deletar') }}
            </x-danger-button>
        </div>
    </form>
</x-modal>
