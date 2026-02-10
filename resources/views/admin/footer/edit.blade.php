@extends('admin.layouts.app')

@section('content')
<div class="max-w-3xl mx-auto">

    <h1 class="text-xl font-bold mb-1">Website Settings</h1>
    <p class="text-sm text-gray-500 mb-6">
        Manage footer & public information
    </p>

    @if(session('success'))
        <div class="bg-green-50 text-green-600 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('admin.footer.update') }}" class="space-y-4">
        @csrf

        <div>
            <label class="text-sm">Studio Name</label>
            <input class="form-input w-full" name="studio_name" value="{{ $footer->studio_name }}">
        </div>

        <div>
            <label class="text-sm">Description</label>
            <textarea class="form-textarea w-full" name="description">{{ $footer->description }}</textarea>
        </div>

        <div>
            <label class="text-sm">WhatsApp</label>
            <input class="form-input w-full" name="phone" value="{{ $footer->phone }}">
        </div>

        <div>
            <label class="text-sm">Instagram URL</label>
            <input class="form-input w-full"
                name="instagram"
                value="{{ $footer->instagram }}"
                placeholder="https://instagram.com/_ningbeauty">
        </div>

        <div>
            <label class="text-sm">TikTok URL</label>
            <input class="form-input w-full"
                name="tiktok"
                value="{{ $footer->tiktok }}"
                placeholder="https://www.tiktok.com/@username">
        </div>


        <div>
            <label class="text-sm">Working Hours</label>
            <input class="form-input w-full" name="working_hours" value="{{ $footer->working_hours }}">
        </div>

        <div>
            <label class="text-sm">Location Title</label>
            <input class="form-input w-full" name="location_label" value="{{ $footer->location_label }}">
        </div>

        <div>
            <label class="text-sm">Location Note</label>
            <textarea class="form-textarea w-full" name="location_note">{{ $footer->location_note }}</textarea>
        </div>

        <button class="bg-pink-500 text-white px-6 py-2 rounded-lg">
            Save Settings
        </button>
    </form>

</div>
@endsection
