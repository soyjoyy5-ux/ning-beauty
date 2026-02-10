@extends('admin.layouts.app')

@section('title','Dashboard')
@section('page-title','Dashboard')

@section('content')
<div class="space-y-6">

    {{-- Header --}}
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Dashboard</h1>
            <p class="text-sm text-gray-500">Ringkasan data Ning Beauty</p>
        </div>

        {{-- Quick Action --}}
        <div class="flex gap-2">
            <a href="{{ route('admin.products.create') }}"
               class="btn-pink px-4 py-2 rounded-lg shadow">
                + Produk
            </a>
            <a href="{{ route('admin.banners.create') }}"
               class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg shadow">
                + Banner
            </a>
        </div>
    </div>

    {{-- Cards --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <div class="card-admin p-6 flex items-center gap-4 hover:scale-[1.02] transition">
            <div class="bg-pink-100 text-pink-600 p-3 rounded-xl">
                <i class="bi bi-box-seam text-2xl"></i>
            </div>
            <div>
                <p class="text-sm text-gray-500">Total Produk</p>
                <p class="text-3xl font-bold">{{ $totalProducts }}</p>
            </div>
        </div>

        <div class="card-admin p-6 flex items-center gap-4 hover:scale-[1.02] transition">
            <div class="bg-blue-100 text-blue-600 p-3 rounded-xl">
                <i class="bi bi-images text-2xl"></i>
            </div>
            <div>
                <p class="text-sm text-gray-500">Total Banner</p>
                <p class="text-3xl font-bold">{{ $totalBanners }}</p>
                <p class="text-xs text-gray-400">
                    Aktif: {{ $activeBanners }}
                </p>
            </div>
        </div>

        <div class="card-admin p-6 flex items-center gap-4 hover:scale-[1.02] transition">
            <div class="bg-green-100 text-green-600 p-3 rounded-xl">
                <i class="bi bi-bar-chart text-2xl"></i>
            </div>
            <div>
                <p class="text-sm text-gray-500">Status Banner</p>
                <p class="text-lg font-semibold">
                    Aktif {{ $activeBanners }} | Nonaktif {{ $inactiveBanners }}
                </p>
            </div>
        </div>

    </div>

    {{-- Chart --}}
    <div class="card-admin p-6">
        <h3 class="font-semibold mb-4 text-gray-700">Statistik Banner</h3>
        <canvas id="bannerChart" height="100"></canvas>
    </div>

</div>

<script>
const ctx = document.getElementById('bannerChart');

new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['Aktif', 'Nonaktif'],
        datasets: [{
            data: [{{ $activeBanners }}, {{ $inactiveBanners }}],
            backgroundColor: ['#22c55e', '#e5e7eb'],
            borderWidth: 0
        }]
    },
    options: {
        plugins: {
            legend: {
                position: 'bottom'
            }
        }
    }
});
</script>
@endsection
