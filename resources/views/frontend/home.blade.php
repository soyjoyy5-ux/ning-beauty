@extends('frontend.layouts.app')
@section('title','Ning Beauty')

@section('content')

{{-- HERO --}}
<section class="hero-section">
    <img src="{{ asset('storage/'.$banners->first()->image) }}" class="hero-img">
    <div class="hero-overlay">
        <div class="container">
            <div class="col-lg-6 text-white">
                <span class="badge bg-pink-soft text-pink mb-3">Private Home Studio</span>
                <h1 class="fw-bold display-4">{{ $banners->first()->title }}</h1>
                <p class="lead mb-4">{{ $banners->first()->subtitle }}</p>
                <a href="#layanan" class="btn btn-pink btn-lg px-5">Lihat Layanan</a>
            </div>
        </div>
    </div>
</section>

{{-- SERVICES --}}
<section id="layanan" class="section-padding">
    <div class="container">

        {{-- Section Heading --}}
        <div class="text-center mb-5">
            <h2 class="fw-bold">Our Signature Services</h2>
            <p class="text-muted">
                Professional, personalized, and exclusive beauty treatments
            </p>
        </div>

        {{-- Services List --}}
        <div class="row g-4">
            @foreach($products as $product)
            <div class="col-md-4">
                <div class="service-card h-100">

                    {{-- Service Image --}}
                    <div class="service-image">
                        <img src="{{ asset('storage/'.$product->image) }}"
                             alt="{{ $product->name }}">
                    </div>

                    {{-- Service Content --}}
                    <div class="p-4">
                        <h5 class="fw-semibold mb-2">
                            {{ $product->name }}
                        </h5>

                        <p class="text-pink fw-semibold mb-2">
                            Starting from IDR {{ number_format($product->price) }}
                        </p>

                        <p class="text-muted small mb-3">
                            {{ Str::limit($product->description, 80) }}
                        </p>

                        <a href="{{ route('frontend.products.show',$product->id) }}"
                           class="btn btn-outline-pink w-100">
                            Book via WhatsApp
                        </a>
                    </div>

                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>


{{-- GALLERY --}}
<section id="gallery" class="section-padding bg-white">
    <div class="container">

        <div class="text-center mb-5">
            <h3 class="fw-bold">Gallery</h3>
            <p class="text-muted">Our Latest Works</p>
        </div>

        <div id="galleryCarousel"
             class="carousel slide"
             data-bs-ride="carousel"
             data-bs-interval="3000"
             data-bs-touch="true"
             data-bs-pause="hover">

            <div class="carousel-inner">

                @foreach($galleries->chunk(4) as $index => $chunk)
                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                    <div class="row g-4 justify-content-center">

                        @foreach($chunk as $gallery)
                        <div class="col-6 col-md-3">
                            <div class="gallery-thumb"
                                 onclick="openLightbox('{{ asset('storage/'.$gallery->image) }}')">
                                <img src="{{ asset('storage/'.$gallery->image) }}"
                                     class="img-fluid"
                                     alt="Gallery Image">
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
                @endforeach

            </div>

            {{-- Controls --}}
            <button class="carousel-control-prev"
                    type="button"
                    data-bs-target="#galleryCarousel"
                    data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>

            <button class="carousel-control-next"
                    type="button"
                    data-bs-target="#galleryCarousel"
                    data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>

        </div>
    </div>
</section>



{{-- TESTIMONIAL --}}
<section class="section-padding bg-soft-pink">
    <div class="container">

        <div class="text-center mb-5">
            <h2 class="fw-bold">Client Feedback</h2>
            <p class="text-muted">Trusted by Our Lovely Clients</p>
        </div>

        <div id="testimonialCarousel"
             class="carousel slide"
             data-bs-ride="carousel"
             data-bs-interval="5000"
             data-bs-touch="true">

            <div class="carousel-inner">

                @foreach($testimonials->chunk(3) as $i => $chunk)
                <div class="carousel-item {{ $i == 0 ? 'active' : '' }}">
                    <div class="row g-4">

                        @foreach($chunk as $item)
                        <div class="col-md-4">
                            <div class="testimonial-card h-100">

                                <div class="mb-3 text-warning">
                                    @for($s = 1; $s <= 5; $s++)
                                        <i class="bi {{ $s <= $item->rating ? 'bi-star-fill' : 'bi-star' }}"></i>
                                    @endfor
                                </div>

                                <p class="testimonial-text">
                                    “{{ $item->note }}”
                                </p>

                                <div class="mt-4 border-top pt-3">
                                    <h6 class="fw-semibold mb-0">{{ $item->name }}</h6>
                                    <small class="text-pink">{{ $item->service }}</small>
                                </div>

                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
                @endforeach

            </div>

            {{-- Controls --}}
            <button class="carousel-control-prev"
                    type="button"
                    data-bs-target="#testimonialCarousel"
                    data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>

            <button class="carousel-control-next"
                    type="button"
                    data-bs-target="#testimonialCarousel"
                    data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>

        </div>
    </div>
</section>


{{-- LIGHTBOX --}}
<div id="lightbox" class="lightbox">
    <span onclick="closeLightbox()">×</span>
    <img id="lightbox-img">
</div>

@endsection
