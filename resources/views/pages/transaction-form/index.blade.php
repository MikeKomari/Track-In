@extends('layout.index')

@section('content')
    <form transaction-form-submit action="{{ route('create.transaction') }}" method="POST">
        @csrf
        @include('pages.transaction-form.header')
        <div class="grid">
            @include('pages.transaction-form.information')
            @include('pages.transaction-form.form')

            <div class="w-full text-sm relative px-6">
                <div class="grid grid-cols-3 gap-6">
                    @foreach ($products as $product)
                        @php
                            $code = $product->code;

                        @endphp
                        @include('pages.transaction-form.card', [
                            'item' => $product,
                            'value' => $code && old('products') ? old('products')[$code] : null,
                        ])
                    @endforeach
                </div>
            </div>
        </div>
    </form>
@endsection
