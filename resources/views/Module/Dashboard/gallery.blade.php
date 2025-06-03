@extends('../../main')

@section('title', 'Galeri Foto')

@section('content')
<div class="container py-16">
    <div class="flex flex-col items-center text-center my-12">
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
        @foreach($galleries as $gallery)
        <div class="gallery-item" data-category="{{ $gallery->category }}">
            <div class="relative group cursor-pointer">
                <img src="{{ asset($gallery->image) }}" alt="{{ $gallery->title }}" class="w-full h-64 object-cover rounded-lg" onclick="openLightbox('{{ asset($gallery->image) }}', '{{ $gallery->title }}', '{{ $gallery->description }}', '{{ $gallery->category }}')">
                <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-50 transition-opacity duration-300 rounded-lg flex items-center justify-center">
                    <div class="text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300 text-center p-4">
                        <h3 class="font-bold text-lg mb-2">{{ $gallery->title }}</h3>
                        <p class="text-sm">{{ $gallery->description }}</p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="mt-8">
        {{ $galleries->links() }}
    </div>
</div>

<!-- Lightbox Modal -->
<div id="lightbox" class="fixed inset-0 bg-black bg-opacity-90 z-50 hidden">
    <div class="h-full w-full flex items-center justify-center p-4">
        <div class="relative max-w-6xl w-full bg-white rounded-lg overflow-hidden">
            <button onclick="closeLightbox()" class="absolute top-4 right-4 text-gray-600 hover:text-gray-800 z-10">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            
            <div class="flex flex-col md:flex-row">
                <!-- Image Section -->
                <div class="md:w-2/3">
                    <img id="lightbox-image" src="" alt="" class="w-full h-auto object-contain">
                </div>
                
                <!-- Details Section -->
                <div class="md:w-1/3 p-6 bg-white">
                    <div class="mb-4">
                        <span id="lightbox-category" class="inline-block px-3 py-1 rounded-full text-sm font-semibold bg-blue-100 text-blue-800"></span>
                    </div>
                    <h3 id="lightbox-title" class="text-2xl font-bold mb-4"></h3>
                    <p id="lightbox-description" class="text-gray-600 leading-relaxed"></p>
                </div>
            </div>
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
    function openLightbox(image, title, description, category) {
        const lightbox = document.getElementById('lightbox');
        const lightboxImage = document.getElementById('lightbox-image');
        const lightboxTitle = document.getElementById('lightbox-title');
        const lightboxDescription = document.getElementById('lightbox-description');
        const lightboxCategory = document.getElementById('lightbox-category');
        
        lightboxImage.src = image;
        lightboxTitle.textContent = title;
        lightboxDescription.textContent = description;
        lightboxCategory.textContent = category.charAt(0).toUpperCase() + category.slice(1);
        
        lightbox.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
        
        // Preload image
        const img = new Image();
        img.src = image;
        img.onload = function() {
            lightboxImage.src = image;
        }
    }

    function closeLightbox() {
        const lightbox = document.getElementById('lightbox');
        lightbox.classList.add('hidden');
        document.body.style.overflow = 'auto';
    }

    // Close lightbox when clicking outside the content
    document.getElementById('lightbox').addEventListener('click', (e) => {
        if (!e.target.closest('.max-w-6xl')) {
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