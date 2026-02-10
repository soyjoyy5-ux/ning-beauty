@extends('admin.layouts.app')

@section('content')
<div class="max-w-2xl mx-auto">

    <h1 class="text-xl font-bold mb-4">Add Client Feedback</h1>

    <form method="POST" action="{{ route('admin.testimonials.store') }}">
        @csrf

        <div class="mb-3">
            <label class="text-sm">Client Name</label>
            <input name="name" class="form-input w-full" required>
        </div>

        <div class="mb-3">
            <label class="text-sm">Service</label>
            <input name="service" class="form-input w-full" placeholder="Makeup / Nails / Eyelash">
        </div>

        <div class="mb-3">
            <label class="text-sm">Rating</label>
            <select name="rating" class="form-select w-full">
                @for($i=5; $i>=1; $i--)
                    <option value="{{ $i }}">{{ $i }} ⭐</option>
                @endfor
            </select>
        </div>

        <div class="mb-4">
            <label class="text-sm">Client Note</label>
            <textarea name="note" class="form-textarea w-full" rows="4" required></textarea>
        </div>

        <button class="bg-pink-500 text-white px-6 py-2 rounded-lg">
            Save Feedback
        </button>
    </form>

</div>
@endsection
