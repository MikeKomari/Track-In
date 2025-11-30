@extends('layout.index')

@section('content')
    @include('pages.users.details.index')
    <section class="h-full flex flex-col">
        @include('pages.users.header')
        @include('pages.users.table')
    </section>
@endsection
