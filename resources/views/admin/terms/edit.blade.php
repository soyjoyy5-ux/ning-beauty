@extends('admin.layouts.app')

@section('content')
<div class="max-w-4xl">

    <h1 class="text-2xl font-bold mb-6">
        Terms & Conditions
    </h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.terms.update', $terms->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-4">
        <label class="block font-semibold mb-2">
            Title
        </label>
        <input type="text"
               name="title"
               class="w-full border rounded-lg px-4 py-2"
               value="{{ old('title', $terms->title) }}"
               required>
    </div>

    <div class="mb-6">
        <label class="block font-semibold mb-2">
            Content
        </label>
        <textarea name="content"
                  rows="8"
                  class="w-full border rounded-lg px-4 py-2"
                  required>{{ old('content', $terms->content) }}</textarea>
    </div>

    <button class="bg-pink-500 text-white px-6 py-2 rounded">
        Update
    </button>
</form>


</div>
@endsection
