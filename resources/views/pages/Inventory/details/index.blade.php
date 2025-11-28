<x-window width="35rem" key="code" name="inventory" class="">
    <div class="flex items-center gap-4">
        <div data-inventory-details-code class="text-2xl">M0097</div>
        <div data-inventory-details-type class="shadow-soft border px-4 flex items-center gap-2 rounded-md py-0.5">
            <div class="bg-green w-2 h-2 rounded-full"></div>
            <p>Material</p>
        </div>
    </div>
    @include("pages.inventory.details.commercial")
</x-window>
