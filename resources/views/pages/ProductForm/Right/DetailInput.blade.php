<div class="flex flex-col gap-4">
    <x-genericDropdown
        name="brand"
        label="Merk Produk (Brand)"
        :items="$brands"
        :value="old('brand')"
    />
    <x-input
        label="Kode HS"
        placeholder="73072110"
        class="mt-1"
        name="hs_code"
        :value="old(key: 'hs_code')"
        :error="$errors->first('hs_code')"
    />
    <x-input
        label="Origin (Negara)"
        placeholder="Germany"
        class="mt-1"
        name="country_origin"
        :value="old('country_origin')"
        :error="$errors->first('country_origin')"
    />
    <x-input
        label="SCH"
        placeholder="40S"
        class="mt-1"
        name="sch"
        :value="old('sch')"
        :error="$errors->first('sch')"
    />
</div>
