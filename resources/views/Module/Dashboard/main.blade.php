@extends('../../main')

@section('title', 'Dashboard')

@section('content')
    @include('Module.Dashboard.Component.toats')

    <section class="hero is-fullheight-with-navbar">
        @include('Module.Dashboard.Partials.beranda')
    </section>


@endsection
