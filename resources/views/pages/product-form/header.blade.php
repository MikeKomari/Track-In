<div class="flex gap-4 items-center border-b py-5 px-8">
    <a href="{{ route('inventory') }}" class="rounded-full bg-background w-10 h-10 flex items-center justify-center">
        <iconify-icon icon="tabler:chevron-left" width="20"></iconify-icon>
    </a>
    <div>
        <h2 class="font-semibold text-2xl">
            {{ $isEdit ? __('messages.inventory.edit.h3') : __('messages.inventory.create.title') }}
        </h2>
        <p class="text-secondary font-normal tracking-normal text-sm mt-0.5">
            {{ $isEdit ? __('messages.inventory.edit.h3_desc') : __('messages.inventory.create.desc') }}
        </p>
    </div>
</div>
