@extends('admin.layouts.app')

@section('content')

<h1 class="text-2xl font-bold mb-6">Tambah Foto Gallery</h1>

<form action="{{ route('admin.galleries.store') }}"
      method="POST"
      enctype="multipart/form-data"
      class="bg-white p-6 rounded shadow max-w-xl">

    @csrf

    <div class="mb-4">
        <label class="block mb-1 font-medium">Foto</label>
        <input type="file" name="image" required>
    </div>

    <div class="mb-4">
        <label class="block mb-1 font-medium">Judul</label>
        <input type="text" name="title"
               class="w-full border rounded p-2">
    </div>

    <button class="btn-pink px-6 py-2 rounded">
        Simpan
    </button>
</form>

@endsection
