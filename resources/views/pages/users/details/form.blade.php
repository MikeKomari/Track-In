<div data-update-user-form data-user-id="{{ $user->id }}" class="mt-8 flex flex-col flex-1 gap-6 px-8 pb-6">
    @csrf
    <x-input label="Username" placeholder="John Doe" inputClass="rounded-lg! py-3.5!" class="mt-0.5" name="name"
        :value="old('name') ?? $user->name" :error="$errors->first('name')" />
    <x-input label="Email" placeholder="Johndoe@gmail.com" inputClass="rounded-lg! py-3.5!" class="mt-0.5" name="email"
        :value="old('email') ?? $user->email" :error="$errors->first('email')" />
    <x-input label="Phone" placeholder="032432984" inputClass="rounded-lg! py-3.5!" class="mt-0.5" name="phone"
        :value="old('phone') ?? $user->phone" :error="$errors->first('phone')" />
    @include('pages.users.details.role-selector')
    <div class="flex-1"></div>
    <button data-submit-button
        class="flex items-center gap-2 justify-center bg-accent animate-cta hover:opacity-75 text-white px-5 py-3 rounded-md shadow-[0_0_10px_0_rgba(118,120,255,0.21)]">
        <iconify-icon class="text-xl" icon="material-symbols:save-outline"></iconify-icon>
        <p class="text-sm">Simpan</p>
    </button>
</div>
