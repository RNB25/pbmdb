@extends('../../main')

@section('title', 'Dashboard Registrasi Siswa')

@section('content')
@include('Module.PendaftaranSiswa.Component.toats')


    <div class="flex h-screen bg-gray-50 text-gray-900">
        <aside class="w-64">
            <nav class="px-4 space-y-2 mt-24">
                <ul class="space-y-2">
                    <li>
                        <button data-section="beranda" onclick="setContent('beranda', 'Info Alur Pendaftaran Online')"
                            class="w-full text-black rounded-lg p-2 flex items-center space-x-2 text-sm font-medium hover:bg-green-200">
                            <span>
                            </span>
                            <span>Info Alur Pendaftaran Online</span>
                        </button>
                    </li>

                    <li>
                        <div style="justify-content: space-around" >
                            <button onclick="toggleDropdown(this)"
                                class="w-full text-black rounded-lg p-2 flex items-center justify-between text-sm font-medium hover:bg-green-200 dropdown-toggle">
                                <span class="flex justify-space-around space-x-2">
                                    <svg class="w-6 h-6 text-gray-800" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="..." />
                                    </svg>
                                    <span>Daftar Siswa</span>
                                </span>
                                <svg class="w-4 h-4 transition-transform transform" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.08 1.04l-4.25 4.25a.75.75 0 01-1.08 0L5.21 8.27a.75.75 0 01.02-1.06z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>

                            <ul class="hidden mt-1 ml-6 space-y-1 text-sm text-gray-700" id="dropdown-pendaftaran">
                                <li>
                                    <button data-section="registrasi" onclick="setContent('registrasi', 'Registrasi')"
                                        class="w-full text-left p-2 rounded hover:bg-green-100">Registrasi</button>
                                </li>
                                <li>
                                    <button onclick="window.location.href='/login'"
                                        class="w-full text-left p-2 rounded hover:bg-green-100">Login</button>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </nav>
        </aside>

        <main class="flex-1 p-6 overflow-hidden bg-white rounded-2xl mt-24 mr-16">
            <div class="mb-4">
                <span class="text-2xl font-bold text-gray-800 mb-4" id="main-title"></span>
            </div>

            <div id="content-area" class="overflow-y-auto max-h-[calc(100vh-180px)]">
                @include('Module.PendaftaranSiswa.Partials.informasi')
            </div>
        </main>
    </div>

    <div id="beranda-content" class="hidden">
        @include('Module.PendaftaranSiswa.Partials.informasi')
    </div>
    {{-- <div id="calon-siswa-content" class="hidden">
        @include('Module.PendaftaranSiswa.Partials.PendaftaranSiswa.pendaftaran-siswa')
    </div> --}}
    <div id="registrasi-content" class="hidden">
        @include('Module.PendaftaranSiswa.Partials.PendaftaranSiswa.registrasi-siswa')
    </div>
    <div id="komputer-content" class="hidden">
        <div class="p-4 border rounded bg-white shadow">
            Ini halaman Komputer (Contoh konten statis).
        </div>
    </div>

    <script>
        function setContent(section, title = '') {
            document.querySelectorAll('button[data-section]').forEach(btn => {
                btn.classList.remove('bg-green-100', 'font-bold');
            });

            const activeBtns = document.querySelectorAll(`button[data-section="${section}"]`);
            activeBtns.forEach(btn => {
                btn.classList.add('bg-green-100', 'font-bold');
            });

            const titleEl = document.getElementById("main-title");
            if (titleEl && title) titleEl.innerText = title;

            const contentMap = {
                beranda: document.getElementById("beranda-content")?.innerHTML || '<div>Konten tidak ditemukan</div>',
                calonSiswa: document.getElementById("calon-siswa-content")?.innerHTML || '<div>Konten tidak ditemukan</div>',
                registrasi: document.getElementById("registrasi-content")?.innerHTML || '<div>Konten tidak ditemukan</div>',
                login: document.getElementById("login")?.innerHTML || '<div>Konten tidak ditemukan</div>',
                komputer: document.getElementById("komputer-content")?.innerHTML || '<div>Konten tidak ditemukan</div>',
            };
            document.getElementById("content-area").innerHTML = contentMap[section];

            toggleDropdownBySection(section);
        }

        function toggleDropdown(button) {
            const dropdown = button.nextElementSibling;
            const arrowIcon = button.querySelector('svg:last-child');

            dropdown.classList.toggle('hidden');
            arrowIcon.classList.toggle('rotate-180');
        }

        function toggleDropdownBySection(section) {
            const dropdown = document.getElementById("dropdown-pendaftaran");
            const button = dropdown?.previousElementSibling;

            if (section === "pendaftaran" && dropdown && button) {
                dropdown.classList.remove("hidden");
                button.querySelector('svg:last-child')?.classList.add("rotate-180");
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
            setContent('beranda', 'Info Alur Pendaftaran Online');
        });
    </script>
@endsection
