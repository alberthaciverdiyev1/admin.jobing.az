<x-dynamic-component
    :component="$getFieldWrapperView()"
    :field="$field"
>
    <div x-data="{ state: $wire.$entangle('{{ $getStatePath() }}') }">
        <div class="text-left">
            <h1 class="font-medium text-sm">Search Engine Optimization (SEO)</h1>
            <div class="mt-4 text-gray-600 text-sm">
                {{ trans('SEO description') }}
            </div>
        </div>
    </div>
</x-dynamic-component>
