@extends('admin.layouts.app')

@section('content')

{{-- HEADER --}}
<div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">
    <div>
        <h1 class="text-2xl font-bold text-gray-800">Gallery</h1>
        <p class="text-sm text-gray-500">
            Kelola foto hasil perawatan & suasana klinik
        </p>
    </div>

    <a href="{{ route('admin.galleries.create') }}"
       class="inline-flex items-center gap-2 bg-pink-500 hover:bg-pink-600 text-white px-5 py-2.5 rounded-lg shadow transition">
        <i class="bi bi-plus-lg"></i>
        Tambah Foto
    </a>
</div>

{{-- ALERT --}}
@if(session('success'))
    <div class="mb-6 rounded-lg bg-green-50 border border-green-200 text-green-700 px-4 py-3">
        {{ session('success') }}
    </div>
@endif

{{-- TABLE CARD --}}
<div class="bg-white rounded-xl shadow-sm overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-gray-50 text-gray-600 uppercase text-xs">
            <tr>
                <th class="px-6 py-4 text-left w-20">Foto</th>
                <th class="px-6 py-4 text-left">Judul</th>
                <th class="px-6 py-4 text-right w-20">Aksi</th>
            </tr>
        </thead>

        <tbody class="divide-y">
        @forelse($galleries as $gallery)
            <tr class="hover:bg-gray-50 transition">
                {{-- IMAGE --}}
                <td class="px-6 py-4">
                    <img src="{{ asset('storage/'.$gallery->image) }}"
                         alt="{{ $gallery->title }}"
                         class="h-14 w-14 rounded-lg object-cover border">
                </td>

                {{-- TITLE --}}
                <td class="px-6 py-4">
                    <p class="font-medium text-gray-800">
                        {{ $gallery->title ?? 'Tanpa Judul' }}
                    </p>
                    <p class="text-xs text-gray-400">
                        ID: {{ $gallery->id }}
                    </p>
                </td>

                {{-- ACTION --}}
                <td class="px-6 py-4 text-right">
                    <form method="POST"
                          action="{{ route('admin.galleries.destroy', $gallery) }}"
                          onsubmit="return confirm('Yakin ingin menghapus foto ini?')">
                        @csrf
                        @method('DELETE')

                        <button class="inline-flex items-center gap-1 text-red-500 hover:text-red-700 text-sm">
                            <i class="bi bi-trash"></i>
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3" class="px-6 py-12 text-center text-gray-500">
                    <i class="bi bi-images text-3xl mb-3 block text-pink-400"></i>
                    Belum ada foto di gallery
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>

@endsection
