@php
    $tabs = [
        [
            "type" => "materials",
            "display" => __('messages.category_mat'),
            "icon" => "icon-park-outline:ad-product",
        ],
        [
            "type" => "chemicals",
            "display" =>  __('messages.category_chem'),
            "icon" => "solar:flame-bold",
        ],
        [
            "type" => "raw-parts",
            "display" =>  __('messages.category_raw_parts'),
            "icon" => "ri:wrench-line",
        ],
        [
            "type" => "consumables",
            "display" =>  __('messages.category_consumeables'),
            "icon" => "mingcute:paper-line",
        ],
    ];
@endphp
<div class=" pt-6 px-8 pb-4">
    <h1 class="text-[1.6rem] tracking-tight mb-6">{{ __('messages.inventory_title') }}</h1>
    <div class="flex gap-4 items-center border-b">
        @foreach ($tabs as $tab)
            @php
                $isSelected = request()->query("type") === $tab["type"];

                // Merge with the current query to retain previous states
                $href = route("inventory", array_merge(request()->query(), ["type" => $tab["type"], "page" => null]));
            @endphp

            <a @class([
                "flex gap-3 items-center text-secondary relative pb-3 px-4",
                "hover:opacity-50 animate-cta" => !$isSelected,
            ]) href={{ $href }}>
                <iconify-icon @class(["text-xl", "text-primary" => $isSelected]) icon={{ $tab["icon"] }}></iconify-icon>
                <div @class(["text-sm", "text-primary" => $isSelected])>{{ $tab["display"] }}</div>
                <div @class([
                    "bg-accent h-[3px] w-full absolute bottom-0 left-0 right-0 opacity-0",
                    "opacity-100" => $isSelected,
                ])></div>
            </a>
        @endforeach
    </div>
</div>
