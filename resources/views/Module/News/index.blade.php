@extends('../../main')

@section('title', 'Berita & Kegiatan')

@section('content')
<div class="py-16">
    <div class="container">
        <div class="flex flex-col items-center text-center mb-12">
            <h1 class="text-3xl font-bold">Berita & Kegiatan</h1>
            <div class="w-20 h-1 bg-blue-600 mt-4 mb-6"></div>
            <p class="max-w-3xl text-gray-600">Informasi terbaru tentang kegiatan dan prestasi SMP Karya Guna.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @forelse ($news as $item)
                <div class="rounded-lg border bg-card text-card-foreground shadow-sm overflow-hidden">
                    <div class="h-48 relative">
                        @if($item->image)
                            <img src="{{ asset($item->image) }}" alt="{{ $item->title }}" class="object-cover w-full h-full">
                        @else
                            <img src="https://via.placeholder.com/600x400?text=No+Image" alt="{{ $item->title }}" class="object-cover w-full h-full">
                        @endif
                        <div class="absolute top-0 left-0 bg-blue-600 text-white px-3 py-1 text-sm">
                            {{ $item->published_date->format('d M Y') }}
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-lg mb-2">{{ $item->title }}</h3>
                        <p class="text-gray-600 mb-4 line-clamp-3">
                            {{ Str::limit(strip_tags($item->content), 150) }}
                        </p>
                        <a href="{{ route('news.show', $item->slug) }}" class="text-blue-600 font-medium flex items-center">
                            Baca selengkapnya
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ml-1 h-4 w-4">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-3 text-center py-12">
                    <p class="text-gray-600">Belum ada berita yang dipublikasikan.</p>
                </div>
            @endforelse
        </div>

        <div class="mt-8">
            {{ $news->links() }}
        </div>
    </div>
</div>
@endsection 