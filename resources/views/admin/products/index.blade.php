@extends('admin.layouts.app')

@section('title','Produk')
@section('page-title','Produk')

@section('content')
<div class="space-y-6">

    <div class="flex justify-between items-center">
        <h1 class="text-2xl font-bold text-gray-800">Produk</h1>

        <a href="{{ route('admin.products.create') }}"
           class="btn-pink px-5 py-2 rounded-lg shadow">
            + Tambah Produk
        </a>
    </div>

    <div class="card-admin overflow-x-auto">
        <table class="w-full table-auto table-admin">
            <thead class="bg-gray-50 border-b">
                <tr>
                    <th class="p-4">Nama</th>
                    <th class="p-4">Harga</th>
                    <th class="p-4">Status</th>
                    <th class="p-4">Aksi</th>
                </tr>
            </thead>

            <tbody class="divide-y">
                @foreach($products as $product)
                <tr>
                    <td class="p-4 font-medium">{{ $product->name }}</td>
                    <td class="p-4">Rp {{ number_format($product->price) }}</td>
                    <td class="p-4">
                        {{ $product->is_active ? 'Aktif' : 'Nonaktif' }}
                    </td>
                    <td class="p-4 flex gap-2">

                        {{-- EDIT --}}
                        <a href="{{ route('admin.products.edit', $product->id) }}"
                           class="btn-edit">
                            Edit
                        </a>

                        {{-- DELETE --}}
                        <form action="{{ route('admin.products.destroy', $product->id) }}"
                              method="POST"
                              onsubmit="return confirm('Yakin hapus produk?')">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn-delete">
                                Hapus
                            </button>
                        </form>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection
