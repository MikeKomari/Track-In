@props([
    "href" => "#",
    "id" => null,
    "key" => "active",
])

@php
    $selected = request()->query($key) === $id;
@endphp

<a data-dropdown-key="{{ $key }}" data-dropdown-item data-dropdown-id="{{ $id }}"
    @class([
        "flex items-center justify-between gap-2 px-2 py-1.5 hover:bg-secondary/5 rounded-md",
        "bg-secondary/7.5 [&_p]:text-primary!" => $selected,
    ])>
    {{ $slot }}
</a>
