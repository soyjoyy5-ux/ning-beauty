@extends('admin.layouts.app')

@section('content')

<div class="flex items-center justify-between mb-6">
    <div>
        <h1 class="text-2xl font-bold text-gray-800">Client Feedback</h1>
        <p class="text-sm text-gray-500">Manage customer testimonials</p>
    </div>

    <a href="{{ route('admin.testimonials.create') }}"
       class="bg-pink-500 hover:bg-pink-600 text-white px-5 py-2 rounded-lg text-sm shadow">
        + Add Feedback
    </a>
</div>

<div class="bg-white rounded-xl shadow overflow-x-auto">

    <table class="w-full text-sm">
        <thead class="bg-pink-50 text-gray-700">
            <tr>
                <th class="text-left px-4 py-3">Client</th>
                <th class="text-left px-4 py-3">Service</th>
                <th class="text-left px-4 py-3">Rating</th>
                <th class="text-right px-4 py-3">Action</th>
            </tr>
        </thead>

        <tbody class="divide-y">
        @forelse($testimonials as $item)
            <tr class="hover:bg-gray-50">
                <td class="px-4 py-3 font-medium text-gray-800">
                    {{ $item->name }}
                </td>

                <td class="px-4 py-3 text-gray-600">
                    {{ $item->service ?? '-' }}
                </td>

                <td class="px-4 py-3">
                    <div class="flex gap-1 text-yellow-400">
                        @for($i=1; $i<=5; $i++)
                            <i class="bi {{ $i <= $item->rating ? 'bi-star-fill' : 'bi-star' }}"></i>
                        @endfor
                    </div>
                </td>

                <td class="px-4 py-3 text-right">
                    <div class="inline-flex gap-3">
                        <a href="{{ route('admin.testimonials.edit',$item) }}"
                           class="text-blue-500 hover:underline">
                            Edit
                        </a>

                        <form method="POST"
                              action="{{ route('admin.testimonials.destroy',$item) }}"
                              onsubmit="return confirm('Delete this feedback?')">
                            @csrf
                            @method('DELETE')

                            <button class="text-red-500 hover:underline">
                                Delete
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="text-center py-10 text-gray-400">
                    No testimonials yet
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>

</div>

@endsection
