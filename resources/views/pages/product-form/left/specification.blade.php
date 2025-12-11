<div class="text-sm">
    <p class="font-medium text-lg">{{ __('messages.inventory.create.specification.h3') }}</p>
    <p class="text-secondary mt-0.5">
        {{ __('messages.inventory.create.specification.h3_desc') }}
    </p>

    <div class="pt-4">
        <div class="flex flex-col gap-4">
            @include('pages.product-form.left.radio-button')
            <p class="text-secondary italic mb-2">*{{ __('messages.inventory.create.specification.additional') }}
            </p>
            <div class="flex gap-4 relative z-20">
                <x-input label="{{ __('messages.inventory.create.specification.size') }}" placeholder="8" class="mt-0.5"
                    name="size" :value="old('size', $product->size ?? '')" :error="$errors->first('size')" />
                <x-input-dropdown triggerClass="py-3" label="{{ __('messages.inventory.create.specification.unit') }}"
                    name="unit" :items="$units" :value="old('unit', $product->unit ?? '')" :error="$errors->first('unit')">
                </x-input-dropdown>
            </div>
            <div class="flex">
                <x-input-dropdown triggerClass="py-3"
                    label="{{ __('messages.inventory.create.specification.material') }}" name="material_family"
                    :items="$materialFamilies" :value="old('material_family')" :error="$errors->first('material_family')">
                </x-input-dropdown>
            </div>
        </div>
    </div>
</div>
