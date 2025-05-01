@extends('../../main')

@section('title', 'Dashboard Registrasi Siswa')

@section('content')
    <div class="flex h-screen bg-gray-50 text-gray-900">
        <aside class="w-64">
            <nav class="px-4 space-y-2 mt-24">
                <ul class="space-y-2">
                    <!-- Beranda -->
                    <li>
                        <button data-section="beranda" onclick="setContent('beranda', 'Info Alur Pendaftaran Online')"
                            class="w-full text-black rounded-lg p-2 flex items-center space-x-2 text-sm font-medium hover:bg-green-200">
                            <span>
                                <!-- Icon -->
                            </span>
                            <span>Info Alur Pendaftaran Online</span>
                        </button>
                    </li>

                    <!-- Dropdown Pendaftaran -->
                    <li>
                        <div>
                            <button onclick="toggleDropdown(this)"
                                class="w-full text-black rounded-lg p-2 flex items-center justify-between text-sm font-medium hover:bg-green-200 dropdown-toggle">
                                <span class="flex items-center space-x-2">
                                    <!-- Icon -->
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

                            <!-- Dropdown Menu -->
                            <ul class="hidden mt-1 ml-6 space-y-1 text-sm text-gray-700" id="dropdown-pendaftaran">
                                <li>
                                    <button data-section="pendaftaran" onclick="setContent('pendaftaran', 'Siswa Baru')"
                                        class="w-full text-left p-2 rounded hover:bg-green-100">Siswa Baru</button>
                                </li>
                                <li>
                                    <button data-section="pendaftaran" onclick="setContent('pendaftaran', 'Siswa Lama')"
                                        class="w-full text-left p-2 rounded hover:bg-green-100">Siswa Lama</button>
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

            <!-- Konten utama -->
            <div id="content-area" class="overflow-y-auto max-h-[calc(100vh-180px)]">
                @include('Module.PendaftaranSiswa.Partials.informasi')
            </div>
        </main>
    </div>

    <!-- Konten Tersembunyi -->
    <div id="beranda-content" class="hidden">
        @include('Module.PendaftaranSiswa.Partials.informasi')
    </div>
    <div id="pendaftaran-content" class="hidden">
        @include('Module.PendaftaranSiswa.Partials.pendaftaran-siswa')
    </div>
    <div id="komputer-content" class="hidden">
        <div class="p-4 border rounded bg-white shadow">
            Ini halaman Komputer (Contoh konten statis).
        </div>
    </div>

    <!-- Script -->
    <script>
        function setContent(section, title = '') {
            // Reset semua tombol
            document.querySelectorAll('button[data-section]').forEach(btn => {
                btn.classList.remove('bg-green-100', 'font-bold');
            });

            // Tandai tombol aktif
            const activeBtns = document.querySelectorAll(`button[data-section="${section}"]`);
            activeBtns.forEach(btn => {
                btn.classList.add('bg-green-100', 'font-bold');
            });

            // Set judul
            const titleEl = document.getElementById("main-title");
            if (titleEl && title) titleEl.innerText = title;

            // Set konten
            const contentMap = {
                beranda: document.getElementById("beranda-content")?.innerHTML || '<div>Konten tidak ditemukan</div>',
                pendaftaran: document.getElementById("pendaftaran-content")?.innerHTML || '<div>Konten tidak ditemukan</div>',
                komputer: document.getElementById("komputer-content")?.innerHTML || '<div>Konten tidak ditemukan</div>',
            };
            document.getElementById("content-area").innerHTML = contentMap[section];

            // Buka dropdown jika submenu aktif
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
