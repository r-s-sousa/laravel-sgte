@props(['pagination' => null])

@if ($pagination)
    <div class="py-4">
        {{ $pagination->links() }}
    </div>
@endif
