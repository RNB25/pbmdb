@extends('../../main')

@section('title', 'Berita & Kegiatan')

@section('content')
<div class="container py-16">
    <div class="flex flex-col items-center text-center mb-12">
        <h1 class="text-3xl font-bold">Galeri Foto</h1>
        <div class="w-20 h-1 bg-blue-600 mt-4 mb-6"></div>
        <p class="max-w-3xl text-gray-600">Dokumentasi kegiatan dan momen berkesan di SMP Karya Guna.</p>
    </div>

    <!-- Filter Buttons -->
    <div class="flex flex-wrap justify-center gap-4 mb-8">
        <button class="px-4 py-2 rounded-md bg-blue-600 text-white" data-filter="all">Semua</button>
        <button class="px-4 py-2 rounded-md bg-gray-100 hover:bg-gray-200" data-filter="kegiatan">Kegiatan</button>
        <button class="px-4 py-2 rounded-md bg-gray-100 hover:bg-gray-200" data-filter="fasilitas">Fasilitas</button>
        <button class="px-4 py-2 rounded-md bg-gray-100 hover:bg-gray-200" data-filter="prestasi">Prestasi</button>
    </div>

    <!-- Gallery Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4" id="gallery-grid">
        @php
            $galleryItems = [
                [
                    'image' => asset('asset/img/smpnya.jpg'),
                    'title' => 'Gedung SMP Karya Guna',
                    'category' => 'fasilitas',
                    'description' => 'Gedung utama SMP Karya Guna Jaya'
                ],
                [
                    'image' => asset('asset/img/seni_tari.jpg'),
                    'title' => 'Pentas Seni Tari',
                    'category' => 'kegiatan',
                    'description' => 'Pentas seni tari dalam rangka perayaan hari besar'
                ],
                [
                    'image' => asset('asset/img/marching_band.jpg'),
                    'title' => 'Marching Band',
                    'category' => 'prestasi',
                    'description' => 'Tim Marching Band SMP Karya Guna dalam kompetisi'
                ],
                [
                    'image' => 'https://images.pexels.com/photos/256401/pexels-photo-256401.jpeg?auto=compress&w=600&q=80',
                    'title' => 'Kegiatan Belajar',
                    'category' => 'kegiatan',
                    'description' => 'Siswa sedang belajar di kelas'
                ],
                [
                    'image' => 'https://images.pexels.com/photos/1181671/pexels-photo-1181671.jpeg?auto=compress&w=600&q=80',
                    'title' => 'Diskusi Kelompok',
                    'category' => 'kegiatan',
                    'description' => 'Siswa melakukan diskusi kelompok'
                ],
                [
                    'image' => 'https://images.pexels.com/photos/3059741/pexels-photo-3059741.jpeg?auto=compress&w=600&q=80',
                    'title' => 'Guru Mengajar',
                    'category' => 'kegiatan',
                    'description' => 'Guru sedang mengajar di kelas'
                ],
                [
                    'image' => 'https://images.pexels.com/photos/1466335/pexels-photo-1466335.jpeg?auto=compress&w=600&q=80',
                    'title' => 'Belajar Kelompok',
                    'category' => 'kegiatan',
                    'description' => 'Siswa belajar dalam kelompok'
                ],
                [
                    'image' => 'https://images.pexels.com/photos/256455/pexels-photo-256455.jpeg?auto=compress&w=600&q=80',
                    'title' => 'Perpustakaan',
                    'category' => 'fasilitas',
                    'description' => 'Perpustakaan sekolah'
                ],
                [
                    'image' => 'https://images.pexels.com/photos/207691/pexels-photo-207691.jpeg?auto=compress&w=600&q=80',
                    'title' => 'Lapangan Olahraga',
                    'category' => 'fasilitas',
                    'description' => 'Lapangan olahraga sekolah'
                ],
                [
                    'image' => 'https://images.pexels.com/photos/301926/pexels-photo-301926.jpeg?auto=compress&w=600&q=80',
                    'title' => 'Membaca di Perpustakaan',
                    'category' => 'kegiatan',
                    'description' => 'Siswa membaca di perpustakaan'
                ],
                [
                    'image' => 'https://images.pexels.com/photos/256369/pexels-photo-256369.jpeg?auto=compress&w=600&q=80',
                    'title' => 'Laboratorium',
                    'category' => 'fasilitas',
                    'description' => 'Laboratorium sekolah'
                ],
                [
                    'image' => 'https://images.pexels.com/photos/1337387/pexels-photo-1337387.jpeg?auto=compress&w=600&q=80',
                    'title' => 'Kegiatan Outdoor',
                    'category' => 'kegiatan',
                    'description' => 'Kegiatan outdoor siswa'
                ],
            ];
        @endphp

        @foreach($galleryItems as $item)
        <div class="gallery-item" data-category="{{ $item['category'] }}">
            <div class="relative group cursor-pointer" onclick="openLightbox('{{ $item['image'] }}', '{{ $item['title'] }}', '{{ $item['description'] }}')">
                <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}" class="w-full h-64 object-cover rounded-lg transition-transform duration-300 group-hover:scale-105">
                <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-50 transition-opacity duration-300 rounded-lg flex items-center justify-center">
                    <div class="text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300 text-center p-4">
                        <h3 class="font-bold text-lg mb-2">{{ $item['title'] }}</h3>
                        <p class="text-sm">{{ $item['description'] }}</p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Lightbox Modal -->
<div id="lightbox" class="fixed inset-0 bg-black bg-opacity-90 z-50 hidden flex items-center justify-center">
    <div class="relative max-w-4xl w-full mx-4">
        <button onclick="closeLightbox()" class="absolute -top-12 right-0 text-white hover:text-gray-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
        <img id="lightbox-image" src="" alt="" class="w-full h-auto rounded-lg">
        <div class="mt-4 text-white text-center">
            <h3 id="lightbox-title" class="text-xl font-bold mb-2"></h3>
            <p id="lightbox-description" class="text-gray-300"></p>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Filter functionality
    document.querySelectorAll('[data-filter]').forEach(button => {
        button.addEventListener('click', () => {
            const filter = button.dataset.filter;
            
            // Update active button
            document.querySelectorAll('[data-filter]').forEach(btn => {
                btn.classList.remove('bg-blue-600', 'text-white');
                btn.classList.add('bg-gray-100', 'hover:bg-gray-200');
            });
            button.classList.remove('bg-gray-100', 'hover:bg-gray-200');
            button.classList.add('bg-blue-600', 'text-white');
            
            // Filter items
            document.querySelectorAll('.gallery-item').forEach(item => {
                if (filter === 'all' || item.dataset.category === filter) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    });

    // Lightbox functionality
    function openLightbox(image, title, description) {
        const lightbox = document.getElementById('lightbox');
        const lightboxImage = document.getElementById('lightbox-image');
        const lightboxTitle = document.getElementById('lightbox-title');
        const lightboxDescription = document.getElementById('lightbox-description');
        
        lightboxImage.src = image;
        lightboxTitle.textContent = title;
        lightboxDescription.textContent = description;
        lightbox.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function closeLightbox() {
        const lightbox = document.getElementById('lightbox');
        lightbox.classList.add('hidden');
        document.body.style.overflow = 'auto';
    }

    // Close lightbox when clicking outside the image
    document.getElementById('lightbox').addEventListener('click', (e) => {
        if (e.target.id === 'lightbox') {
            closeLightbox();
        }
    });

    // Close lightbox with escape key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            closeLightbox();
        }
    });
</script>
@endpush

@endsection 