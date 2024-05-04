@props(['lines' => null])

<tbody {{ $attributes->merge(['class' => 'bg-gray-700 divide-y divide-gray-600']) }}>

    @if ($lines === 0)
        <x-table.tr>
            <x-table.td colspan="4" class="text-center">{{ __('Nenhum registro encontrado') }}</x-table.td>
        </x-table.tr>
    @endif

    {{ $slot }}
</tbody>
