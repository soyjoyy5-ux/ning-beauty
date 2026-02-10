@extends('admin.layouts.app')

@section('content')
<h1 class="text-xl font-bold mb-4">Tambah Produk</h1>

<form method="POST" enctype="multipart/form-data"
      action="{{ route('admin.products.store') }}">
@csrf

<input type="text" name="name" placeholder="Nama Produk" class="border p-2 w-full mb-2">
<input type="number" name="price" placeholder="Harga" class="border p-2 w-full mb-2">
<input type="file" name="image" class="mb-2">

<textarea name="description" placeholder="Deskripsi" class="border p-2 w-full mb-2"></textarea>
<textarea name="benefits" placeholder="Manfaat" class="border p-2 w-full mb-2"></textarea>

<label>
    <input type="checkbox" name="is_active" value="1" checked> Aktif
</label>

<button class="bg-pink-500 text-white px-4 py-2 mt-3 rounded">
    Simpan
</button>
</form>
@endsection
