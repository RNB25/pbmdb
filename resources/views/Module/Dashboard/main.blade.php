@extends('../../main')

@section('title', 'Dahboard')

@section('content')
    <section class="hero is-fullheight-with-navbar"
        style="background: linear-gradient(to right,rgba(0, 128, 0, 0.465) , white);">
        @include('Module.Dashboard.Partials.beranda')
    </section>
    <section>
        @include('Module.Dashboard.Partials.pendaftaran')
    </section>
    <section class="hero is-fullheight-with-navbar" >
        @include('Module.Dashboard.Partials.struktur-organisasi')
    </section>
@endsection
