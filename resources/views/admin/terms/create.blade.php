@extends('admin.layouts.app')

@section('content')
<div class="max-w-4xl mx-auto">

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-xl font-bold">Create Terms & Conditions</h1>

        <a href="{{ route('admin.terms.index') }}"
           class="text-sm text-gray-500 hover:text-pink-600">
            ← Back
        </a>
    </div>

    <div class="bg-white rounded-lg shadow p-6">

        <form action="{{ route('admin.terms.store') }}" method="POST">
            @csrf

            {{-- TITLE --}}
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">
                    Title
                </label>
                <input type="text"
                       name="title"
                       value="{{ old('title') }}"
                       class="w-full rounded border-gray-300 focus:border-pink-500 focus:ring-pink-500"
                       required>

                @error('title')
                    <small class="text-red-500">{{ $message }}</small>
                @enderror
            </div>

            {{-- CONTENT --}}
            <div class="mb-6">
                <label class="block text-sm font-medium mb-1">
                    Content
                </label>
                <textarea name="content"
                          rows="8"
                          class="w-full rounded border-gray-300 focus:border-pink-500 focus:ring-pink-500"
                          required>{{ old('content') }}</textarea>

                @error('content')
                    <small class="text-red-500">{{ $message }}</small>
                @enderror
            </div>

            {{-- ACTION --}}
            <div class="flex justify-end gap-3">
                <a href="{{ route('admin.terms.index') }}"
                   class="px-4 py-2 rounded border text-gray-600 hover:bg-gray-50">
                    Cancel
                </a>

                <button type="submit"
                        class="px-6 py-2 bg-pink-500 text-white rounded hover:bg-pink-600">
                    Save Terms
                </button>
            </div>

        </form>

    </div>
</div>
@endsection
