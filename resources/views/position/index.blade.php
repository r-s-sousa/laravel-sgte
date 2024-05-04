<x-app-layout>
    <x-body-layout>
        <div class="flex justify-end mt-4">
            <form action="{{ route('position.search') }}" method="GET" class="flex items-center">
                <input type="text" name="search" placeholder="Search..." value="{{ $search ?? '' }}"
                    class="px-4 py-2 mr-1 rounded-md focus:outline-none focus:ring focus:border-blue-300 bg-gray-800 text-gray-300 placeholder-gray-500 w-72 sm:w-auto">
                <button type="submit"
                    class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-md">Search</button>
            </form>
        </div>

        <table class="min-w-full divide-y divide-gray-600">
            <thead>
                <tr>
                    <th
                        class="px-6 py-3 bg-gray-800 text-left text-xs leading-4 font-medium text-gray-300 uppercase tracking-wider">
                        {{ __('Abreviação') }}
                    </th>
                    <th
                        class="px-6 py-3 bg-gray-800 text-left text-xs leading-4 font-medium text-gray-300 uppercase tracking-wider">
                        {{ __('Nome') }}
                    </th>
                    <th
                        class="px-6 py-3 bg-gray-800 text-left text-xs leading-4 font-medium text-gray-300 uppercase tracking-wider">
                        {{ __('Prioridade') }}
                    </th>
                    <th class="px-6 py-3 bg-gray-800 text-gray-300">
                        {{ __('Ações') }}
                    </th>
                </tr>
            </thead>
            <tbody class="bg-gray-700 divide-y divide-gray-600">
                @foreach ($positions as $position)
                    <tr>
                        <td class="px-6 py-1 whitespace-no-wrap text-gray-300">
                            {{ $position->shortName }}
                        </td>
                        <td class="px-6 py-1 whitespace-no-wrap text-gray-300">
                            {{ $position->name }}
                        </td>
                        <td class="px-6 py-1 whitespace-no-wrap text-gray-300">
                            {{ $position->priority }}
                        </td>
                        <td class="px-6 py-1 whitespace-no-wrap">
                            <div class="flex justify-center items-center space-x-2">
                                <button class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-1 px-4 rounded">
                                    Edit
                                </button>
                                <button class="bg-red-600 hover:bg-red-700 text-white font-bold py-1 px-4 rounded">
                                    Delete
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="py-4">
            {{ $positions->links() }}
        </div>

    </x-body-layout>
</x-app-layout>
