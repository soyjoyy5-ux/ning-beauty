@extends('admin.layouts.app')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Tambah Banner</h1>
        <p class="text-gray-500 text-sm">
            Banner akan tampil di halaman utama website
        </p>
    </div>

    {{-- ERROR VALIDATION --}}
    @if ($errors->any())
        <div class="mb-4 bg-red-50 border border-red-200 text-red-700 p-4 rounded">
            <ul class="list-disc list-inside text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-white rounded-xl shadow p-6">
        <form method="POST"
              action="{{ url('admin/banners') }}"
              enctype="multipart/form-data"
              class="space-y-5">

            @csrf

            {{-- Judul --}}
            <div>
                <label class="block mb-1 font-semibold text-gray-700">
                    Judul Banner
                </label>
                <input type="text"
                       name="title"
                       value="{{ old('title') }}"
                       class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-pink-300"
                       required>
            </div>

            {{-- Subjudul --}}
            <div>
                <label class="block mb-1 font-semibold text-gray-700">
                    Sub Judul
                </label>
                <input type="text"
                       name="subtitle"
                       value="{{ old('subtitle') }}"
                       class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-pink-300">
            </div>

            {{-- Gambar --}}
            <div>
                <label class="block mb-1 font-semibold text-gray-700">
                    Gambar Banner
                </label>
                <input type="file"
                       name="image"
                       accept="image/*"
                       class="w-full border rounded-lg px-4 py-2 bg-gray-50"
                       required>

                <p class="text-xs text-gray-500 mt-1">
                    Rekomendasi: 1920x600px (JPG / PNG)
                </p>
            </div>

            {{-- Status --}}
            <div class="flex items-center gap-2">
                <input type="checkbox"
                       name="is_active"
                       value="1"
                       checked
                       class="accent-pink-500">
                <label class="text-gray-700 font-medium">
                    Aktifkan banner
                </label>
            </div>

            {{-- Action --}}
            <div class="flex gap-3 pt-4">
                <button type="submit"
                        class="bg-pink-500 hover:bg-pink-600 text-white px-6 py-2 rounded-lg shadow">
                    Simpan Banner
                </button>

                <a href="{{ url('admin/banners') }}"
                   class="px-6 py-2 border rounded-lg text-gray-600 hover:bg-gray-100">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
