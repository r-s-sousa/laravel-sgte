<div class="flex justify-left my-2">
    @if ($errors->any())
        <div class="bg-red-800 text-white py-2 px-4 rounded">
            <span class="block">{{ implode('<br>', $errors->all()) }}</span>
        </div>
    @elseif(session('success_message'))
        <div class="bg-green-700 text-white py-2 px-4 rounded">
            <span class="block">{{ session('success_message') }}</span>
        </div>
    @endif
</div>
