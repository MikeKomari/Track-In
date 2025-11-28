@extends("layout.index")

@section("content")
    <section class="h-full flex flex-col">
        @include("pages.inventory.header")
        @include("pages.inventory.utils")
        @include("pages.inventory.table")
    </section>
@endsection
