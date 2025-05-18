@extends('../../main')

@section('title', 'Dashboard Registrasi Siswa')

@section('content')
    @include('Module.PendaftaranSiswa.Component.toats')
    @php
        $activeTab = session('tab', 'calonMahasiswa'); // default tab: calonMahasiswa
    @endphp
    <div class="border-b border-gray-200 dark:border-gray-700" style="margin-top: 80px">
        <ul
            class="flex flex-wrap -mb-px text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700">
            <li class="me-2">
                <a href="#" onclick="loadTabContent('calonMahasiswa', event)"
                    class="tab-link inline-flex items-center justify-center p-4 border-b-2 rounded-t-lg
               {{ $activeTab == 'calonMahasiswa' ? 'text-blue-600 border-blue-600 dark:text-blue-500 dark:border-blue-500' : 'text-gray-500 border-transparent' }}">
                    <svg class="w-4 h-4 me-2" ...></svg>
                    Calon Siswa
                </a>
            </li>
            <li class="me-2">
                <a href="#" onclick="loadTabContent('bayarUangPendaftaran', event)"
                    class="tab-link inline-flex items-center justify-center p-4 border-b-2 rounded-t-lg
               {{ $activeTab == 'bayarUangPendaftaran' ? 'text-blue-600 border-blue-600 dark:text-blue-500 dark:border-blue-500' : 'text-gray-500 border-transparent' }}">
                    <svg class="w-4 h-4 me-2" ...></svg>
                    Pembayaran
                </a>
            </li>
            <li class="me-2">
                <a href="#" onclick="loadTabContent('formulirPendaftaran', event)"
                    class="tab-link inline-flex items-center justify-center p-4 border-b-2 rounded-t-lg
               {{ $activeTab == 'formulirPendaftaran' ? 'text-blue-600 border-blue-600 dark:text-blue-500 dark:border-blue-500' : 'text-gray-500 border-transparent' }}">
                    <svg class="w-4 h-4 me-2" ...></svg>
                    Formulir
                </a>
            </li>
        </ul>

    </div>

    <div id="tab-content" class="mt-4">
        @if ($activeTab == 'calonMahasiswa')
            @include('Module.BuktiPendaftaran.Partials.indentitas-siswa')
        @elseif($activeTab == 'bayarUangPendaftaran')
            @include('Module.BuktiPendaftaran.Partials.bayar-uang-pendaftaran')
        @elseif($activeTab == 'formulirPendaftaran')
            @include('Module.BuktiPendaftaran.Partials.formulir-pendaftaran')
        @else
            @include('Module.BuktiPendaftaran.Partials.indentitas-siswa') {{-- fallback --}}
        @endif
    </div>

    <div id="tab-calonMahasiswa" class="hidden">
        @include('Module.BuktiPendaftaran.Partials.indentitas-siswa')
    </div>
    <div id="tab-bayarUangPendaftaran" class="hidden">
        @include('Module.BuktiPendaftaran.Partials.bayar-uang-pendaftaran')
    </div>
    <div id="tab-formulirPendaftaran" class="hidden">
        @include('Module.BuktiPendaftaran.Partials.formulir-pendaftaran')
    </div>



    <script>
        function loadTabContent(name, event) {
            // Ubah style tab aktif
            document.querySelectorAll('.tab-link').forEach(link => {
                link.classList.remove('text-blue-600', 'border-blue-600', 'dark:text-blue-500',
                    'dark:border-blue-500');
                link.classList.add('text-gray-500', 'border-transparent');
            });

            // Tambahkan class aktif ke tab yang diklik
            const clickedLink = event.currentTarget;
            clickedLink.classList.add('text-blue-600', 'border-blue-600', 'dark:text-blue-500', 'dark:border-blue-500');
            clickedLink.classList.remove('text-gray-500', 'border-transparent');

            // Update isi konten tab
            const content = document.getElementById(`tab-${name}`);
            const displayArea = document.getElementById("tab-content");

            if (content && displayArea) {
                displayArea.innerHTML = content.innerHTML;
            } else {
                displayArea.innerHTML = "<div class='text-red-500'>Konten tidak ditemukan.</div>";
            }
        }

        function showSuccessToast(message) {
            const toast = document.getElementById('toast-success');
            const toastMessage = document.getElementById('toast-success-message');
            toastMessage.innerText = message;
            toast.classList.remove('hidden');
            toast.classList.add('flex');

            setTimeout(() => {
                hideSuccessToast();
            }, 5000);
        }

        function hideSuccessToast() {
            const toast = document.getElementById('toast-success');
            toast.classList.add('hidden');
            toast.classList.remove('flex');
        }
    </script>

@endsection
