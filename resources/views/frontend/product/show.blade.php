@extends('frontend.layouts.app')

@section('title', $product->name)

@section('content')

<section class="container py-5">
    <div class="row align-items-center g-5">

        <div class="col-lg-6">
            <img src="{{ asset('storage/'.$product->image) }}"
                 class="img-fluid rounded-4 shadow-soft w-100"
                 style="max-height:500px;object-fit:cover">
        </div>

        <div class="col-lg-6">
            <h1 class="fw-bold mb-3">
                {{ $product->name }}
            </h1>

            <h4 class="text-pink fw-semibold mb-4">
                Mulai Rp {{ number_format($product->price) }}
            </h4>

            <p class="text-muted mb-4" style="line-height:1.8">
                {{ $product->description }}
            </p>

            @php
                $waNumber = '628123456789';
                $message = urlencode(
                    "Halo Ning Beauty 👋\n\n".
                    "Saya ingin booking layanan:\n".
                    $product->name."\n".
                    "Harga mulai: Rp ".number_format($product->price)
                );
            @endphp

            <a href="https://wa.me/{{ $waNumber }}?text={{ $message }}"
               target="_blank"
               class="btn btn-pink btn-lg px-5 rounded-pill shadow">
                Booking Sekarang
            </a>
        </div>

    </div>
</section>

@endsection
