@extends('admin.layouts.app')

@section('title','Banner')
@section('page-title','Banner')

@section('content')
<div class="space-y-6">

    {{-- Header --}}
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Banner</h1>
            <p class="text-sm text-gray-500">
                Kelola banner halaman utama
            </p>
        </div>

        <a href="{{ route('admin.banners.create') }}"
           class="btn-pink px-5 py-2 rounded-lg shadow">
            + Tambah Banner
        </a>
    </div>

    @if (session('success'))
        <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <div class="card-admin overflow-x-auto">
        <table class="w-full table-auto table-admin">
            <thead class="bg-gray-50 border-b">
                <tr>
                    <th class="p-4">#</th>
                    <th class="p-4">Gambar</th>
                    <th class="p-4">Judul</th>
                    <th class="p-4">Status</th>
                    <th class="p-4">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse($banners as $banner)
                <tr class="hover:bg-gray-50">
                    <td class="p-4">{{ $loop->iteration }}</td>
                    <td class="p-4">
                        <img src="{{ asset('storage/'.$banner->image) }}"
                             class="h-16 w-32 object-cover rounded shadow">
                    </td>
                    <td class="p-4 font-medium">
                        {{ $banner->title }}
                        <div class="text-xs text-gray-500">{{ $banner->subtitle }}</div>
                    </td>
                    <td class="p-4">
                        <span class="px-3 py-1 text-xs rounded-full
                        {{ $banner->is_active ? 'bg-green-100 text-green-700' : 'bg-gray-200 text-gray-600' }}">
                            {{ $banner->is_active ? 'Aktif' : 'Nonaktif' }}
                        </span>
                    </td>
                    <td class="p-4 flex gap-2">
                        <a href="{{ route('admin.banners.edit',$banner) }}"
                           class="px-3 py-1 bg-blue-500 text-white rounded text-sm">
                            Edit
                        </a>
                        <form action="{{ route('admin.banners.destroy',$banner) }}"
                              method="POST"
                              onsubmit="return confirm('Hapus banner?')">
                            @csrf @method('DELETE')
                            <button class="px-3 py-1 bg-red-500 text-white rounded text-sm">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="p-6 text-center text-gray-400">
                        Belum ada banner
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection
