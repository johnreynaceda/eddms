@php
    $name = \App\Models\Category::where('id', request('id'))->first();
@endphp
@section('title', $name->name . ' - ' . $name->type)

<x-admin-layout>
    <div>
        <livewire:program-chair.document-open />
    </div>
</x-admin-layout>
