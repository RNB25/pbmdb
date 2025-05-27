@extends('Module.Dashboard.layouts.superadmin')

@section('title', 'Tambah Berita')

@section('content')
<div class="container mx-auto">
    <div class="max-w-2xl mx-auto">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Tambah Berita Baru</h1>

        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('superadmin.news.store') }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                    Judul Berita
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('title') border-red-500 @enderror"
                    id="title" type="text" name="title" value="{{ old('title') }}" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="published_date">
                    Tanggal Publikasi
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('published_date') border-red-500 @enderror"
                    id="published_date" type="date" name="published_date" value="{{ old('published_date', date('Y-m-d')) }}" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="content">
                    Konten Berita
                </label>
                <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('content') border-red-500 @enderror"
                    id="content" name="content" rows="6" required>{{ old('content') }}</textarea>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="image">
                    Gambar Berita
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('image') border-red-500 @enderror"
                    id="image" type="file" name="image" accept="image/*" required>
                <p class="text-gray-600 text-xs italic mt-1">Format yang didukung: JPG, JPEG, PNG. Maksimal 2MB</p>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">
                    Status Publikasi
                </label>
                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <input type="radio" name="is_published" value="1" {{ old('is_published', '1') == '1' ? 'checked' : '' }} class="form-radio">
                        <span class="ml-2">Publish</span>
                    </label>
                    <label class="inline-flex items-center ml-6">
                        <input type="radio" name="is_published" value="0" {{ old('is_published') == '0' ? 'checked' : '' }} class="form-radio">
                        <span class="ml-2">Draft</span>
                    </label>
                </div>
            </div>

            <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    Simpan Berita
                </button>
                <a href="{{ route('superadmin.news.index') }}" class="text-gray-600 hover:text-gray-800">
                    Kembali ke Daftar Berita
                </a>
            </div>
        </form>
    </div>
</div>
@endsection 