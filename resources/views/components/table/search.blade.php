@props(['search' => null, 'routeName' => null])

<div {{ $attributes->merge(['class' => 'flex justify-end mt-4']) }}>
    <form action="{{ route($routeName) }}" method="GET" class="flex items-center">
        <input type="text" name="search" placeholder="Search..." value="{{ $search ?? '' }}"
            class="px-4 py-2 mr-1 rounded-md focus:outline-none focus:ring focus:border-blue-300 bg-gray-800 text-gray-300 placeholder-gray-500 w-72 sm:w-auto">
        <button type="submit"
            class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-md">Search</button>
    </form>
</div>
