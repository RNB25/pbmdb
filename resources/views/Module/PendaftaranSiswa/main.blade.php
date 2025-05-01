@extends('../../main')

@section('title', 'Dashboard')

@section('content')
    <div class="flex h-screen bg-gray-50 text-gray-900">
        <aside class="w-64">
            <nav class="px-4 space-y-2 mt-24">
                <ul class="space-y-2">
                    <li>
                        <button data-section="beranda" onclick="setContent('beranda', 'Alur Pendaftaran')"
                            class="w-full text-black rounded-lg p-2 flex items-center space-x-2 text-sm font-medium hover:bg-green-200">
                            <span>
                                <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M11.293 3.293a1 1 0 0 1 1.414 0l6 6 2 2a1 1 0 0 1-1.414 1.414L19 12.414V19a2 2 0 0 1-2 2h-3a1 1 0 0 1-1-1v-3h-2v3a1 1 0 0 1-1 1H7a2 2 0 0 1-2-2v-6.586l-.293.293a1 1 0 0 1-1.414-1.414l2-2 6-6Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                            <span>Alur Pendaftaran</span>
                        </button>
                    </li>
                </ul>
            </nav>
        </aside>

        <main class="flex-1 p-6 overflow-hidden bg-white rounded-2xl mt-24 mr-16">
            <div class="mb-4">
                <span class="text-2xl font-bold text-gray-800 mb-4"></span><span id="main-title"
                    class="text-2xl font-bold text-gray-800 mb-4"></span>
            </div>

            <!-- Konten yang akan langsung ditampilkan saat pertama kali halaman diakses -->
            <div id="content-area" class="overflow-y-auto max-h-[calc(100vh-180px)]">
                @include('Module.PendaftaranSiswa.Partials.informasi')
            </div>
        </main>
    </div>

    <!-- Konten lain yang tersembunyi dan bisa dipilih -->
    <div id="beranda-content" class="hidden">
        @include('Module.PendaftaranSiswa.Partials.informasi')
    </div>
    <div id="drive-content" class="hidden">
        @include('Module.PendaftaranSiswa.Partials.pendaftaran-siswa')
    </div>
    <div id="komputer-content" class="hidden">
        <div class="p-4 border rounded bg-white shadow">
            Ini halaman Komputer (Contoh konten statis).
        </div>
    </div>

    <script>
        function setContent(section, title = '') {
            document
                .querySelectorAll('button[data-section]')
                .forEach(btn => {
                    btn.classList.remove('bg-green-100')
                });

            const activeBtn = document.querySelector(`button[data-section="${section}"]`);
            if (activeBtn) {
                activeBtn.classList.add('bg-green-100');
            }

            const titleEl = document.getElementById("main-title");
            if (titleEl && title) titleEl.innerText = title;

            const contentMap = {
                beranda: document.getElementById("beranda-content")?.innerHTML || '<div>Konten tidak ditemukan</div>',
                drive: document.getElementById("drive-content")?.innerHTML || '<div>Konten tidak ditemukan</div>',
                komputer: document.getElementById("komputer-content")?.innerHTML || '<div>Konten tidak ditemukan</div>',
            };
            document.getElementById("content-area").innerHTML = contentMap[section];
        }

        document.addEventListener('DOMContentLoaded', () => {
            setContent('beranda', 'Alur Pendaftaran'); // Menampilkan konten pertama kali
        });
    </script>
@endsection
