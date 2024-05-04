<x-app-layout>
    <x-body-layout>

        @include('components.table.search', ['routeName' => 'position.search', 'search' => $search ?? ''])
        @include('components.execution-message')

        <x-table.table>
            <x-table.thead>
                <x-table.tr>
                    <x-table.th>{{ __('Abreviação') }}</x-table.th>
                    <x-table.th>{{ __('Nome') }}</x-table.th>
                    <x-table.th>{{ __('Prioridade') }}</x-table.th>
                    <x-table.th-actions>{{ __('Ações') }}</x-table.th>
                </x-table.tr>
            </x-table.thead>
            <x-table.tbody :lines="count($positions)">
                @foreach ($positions as $position)
                    <x-table.tr>
                        <x-table.td>{{ $position->shortName }}</x-table.td>
                        <x-table.td>{{ $position->name }}</x-table.td>
                        <x-table.td>{{ $position->priority }}</x-table.td>
                        <x-table.td-actions>
                            <x-primary-link-button href="{{ route('position.edit', $position->id) }}">{{ __('Editar') }}
                            </x-primary-link-button>
                            @include('position.partials.delete-position-form', ['position' => $position])
                        </x-table.td-actions>
                    </x-table.tr>
                @endforeach
            </x-table.tbody>
        </x-table.table>
        @include('components.table.pagination', ['pagination' => $positions])
    </x-body-layout>
</x-app-layout>
