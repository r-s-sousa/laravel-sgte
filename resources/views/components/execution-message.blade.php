<div class="flex justify-left my-2">
    @if ($errors->onValidation->isNotEmpty())
        <div class="bg-red-800 text-white py-2 px-4 rounded">
            <span class="block">{{ implode('|', $errors->onValidation->all()) }}</span>
        </div>
    @elseif(session('success_message'))
        <div class="bg-green-700 text-white py-2 px-4 rounded">
            <span class="block">{{ session('success_message') }}</span>
        </div>
    @endif
</div>
