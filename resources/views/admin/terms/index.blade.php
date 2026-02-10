@extends('admin.layouts.app')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-xl font-bold">Terms & Conditions</h1>

    @if(!$terms)
        <a href="{{ route('admin.terms.create') }}"
           class="btn btn-pink">
            + Create Terms
        </a>
    @else
        <a href="{{ route('admin.terms.edit', $terms->id) }}"
           class="btn btn-outline-pink">
            Edit
        </a>
    @endif
</div>

@if($terms)
    <div class="bg-white p-6 rounded shadow">
        <h2 class="font-semibold mb-2">{{ $terms->title }}</h2>
        <div class="prose max-w-none">
            {!! $terms->content !!}
        </div>
    </div>
@else
    <p class="text-gray-500">No Terms & Conditions created yet.</p>
@endif
@endsection
