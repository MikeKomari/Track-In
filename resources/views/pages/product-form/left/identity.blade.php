<div class="text-sm">
    <p class="font-medium text-lg mb-5">{{ __('messages.inventory.create.identity.h2') }}</p>
    <p class="text-primary">{{ __('messages.inventory.create.identity.h3') }}</p>
    <p class="text-secondary mt-0.5">
        {{ __('messages.inventory.create.identity.h3_desc') }}
    </p>

    @include('components.type-selector', [
        'selected' => $product?->type,
        'error' => $errors->first('type'),
    ])

    <div class="pt-4">
        <x-input label="{{ __('messages.inventory.create.identity.input.desc') }}" placeholder="Flange 8'' #150 Blind.."
            class="mt-1" name="description" :value="old('description', $product->description ?? '')" :error="$errors->first('description')" />
    </div>
    <hr class="mt-10" />
</div>
