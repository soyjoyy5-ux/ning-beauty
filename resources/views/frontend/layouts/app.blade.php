<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>@yield('title') - Ning Beauty</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

{{-- Bootstrap --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

{{-- Google Font --}}
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

<style>
/* ================= GLOBAL ================= */
body{
    font-family:'Poppins',sans-serif;
    background:#f9fafb;
}
:root{
    --pink:#ec4899;
    --pink-dark:#db2777;
}
.text-pink{color:var(--pink)}
.bg-pink-soft{background:rgba(236,72,153,.12)}
.bg-soft-pink{background:#fff5f8}

/* ================= BUTTON ================= */
.btn-pink{
    background:var(--pink);
    color:#fff;
    border-radius:50px;
}
.btn-pink:hover{background:var(--pink-dark);color:#fff}
.btn-outline-pink{
    border:1px solid var(--pink);
    color:var(--pink);
    border-radius:50px;
}
.btn-outline-pink:hover{background:var(--pink);color:#fff}

/* ================= HERO ================= */
.hero-section{height:85vh;position:relative}
.hero-img{width:100%;height:100%;object-fit:cover}
.hero-overlay{
    position:absolute;inset:0;
    background:linear-gradient(to right,rgba(0,0,0,.65),rgba(0,0,0,.15));
    display:flex;align-items:center;
}

/* ================= SECTION ================= */
.section-padding{padding:90px 0}

/* ================= SERVICE ================= */
.service-card{
    background:#fff;
    border-radius:22px;
    overflow:hidden;
    transition:.3s;
}
.service-card:hover{
    transform:translateY(-6px);
    box-shadow:0 30px 60px rgba(0,0,0,.08);
}
.service-image img{
    width:100%;
    height:220px;
    object-fit:cover;
}

/* ================= GALLERY ================= */
.gallery-thumb{
    width:100%;
    aspect-ratio:1/1;
    border-radius:14px;
    overflow:hidden;
    cursor:pointer;
    box-shadow:0 6px 20px rgba(0,0,0,.08);
    transition:.3s;
}
.gallery-thumb img{
    width:100%;
    height:100%;
    object-fit:cover;
}
.gallery-thumb:hover{
    transform:scale(1.05);
}

/* ================= TESTIMONIAL ================= */
.testimonial-card{
    background:#fff;
    border-radius:18px;
    padding:26px;
    box-shadow:0 10px 35px rgba(0,0,0,.06);
    transition:.3s;
}
.testimonial-card:hover{
    transform:translateY(-5px);
    box-shadow:0 15px 45px rgba(0,0,0,.1);
}
.testimonial-text{
    font-style:italic;
    color:#555;
    line-height:1.6;
}

/* ================= LIGHTBOX ================= */
.lightbox{
    position:fixed;
    inset:0;
    background:rgba(0,0,0,.85);
    display:none;
    align-items:center;
    justify-content:center;
    z-index:9999;
}
.lightbox img{
    max-width:90%;
    max-height:85%;
    border-radius:18px;
}
.lightbox span{
    position:absolute;
    top:30px;
    right:40px;
    font-size:40px;
    color:#fff;
    cursor:pointer;
}

/* ================= FLOATING WA ================= */
.floating-wa{
    position:fixed;
    bottom:24px;
    right:24px;
    background:#25D366;
    color:#fff;
    width:56px;
    height:56px;
    display:flex;
    align-items:center;
    justify-content:center;
    border-radius:50%;
    font-size:26px;
    box-shadow:0 12px 30px rgba(0,0,0,.25);
    z-index:999;
}

/* === CAROUSEL CONTROLS (PRECISION FIX) === */
.carousel {
    position: relative;
    padding: 0 60px; /* ruang aman kiri-kanan */
}

.carousel-control-prev,
.carousel-control-next {
    width: 44px;
    height: 44px;
    background: #ffffff;
    border-radius: 50%;
    top: 50%;
    transform: translateY(-50%);
    opacity: 1;
    box-shadow: 0 8px 20px rgba(0,0,0,0.15);
}

/* posisi keluar dari konten */
.carousel-control-prev {
    left: 10px;
}

.carousel-control-next {
    right: 10px;
}

/* icon */
.carousel-control-prev-icon,
.carousel-control-next-icon {
    width: 18px;
    height: 18px;
    filter: invert(0);
}

/* hover */
.carousel-control-prev:hover,
.carousel-control-next:hover {
    background: var(--pink);
}

.carousel-control-prev:hover .carousel-control-prev-icon,
.carousel-control-next:hover .carousel-control-next-icon {
    filter: invert(1);
}

/* === MOBILE ADJUSTMENT === */
@media (max-width: 768px) {
    .carousel {
        padding: 0 20px;
    }

    .carousel-control-prev {
        left: 0;
    }

    .carousel-control-next {
        right: 0;
    }
}


/* ================= FOOTER ================= */
footer a i{
    transition:.25s;
}
footer a:hover i{
    transform:translateY(-3px) scale(1.1);
    color:var(--pink-dark);
}
</style>
</head>

<body>

{{-- NAVBAR --}}
<nav class="navbar navbar-expand-lg bg-white shadow-sm sticky-top navbar-light">
<div class="container">
<a class="navbar-brand fw-bold text-pink" href="{{ route('home') }}">
    Ning Beauty
</a>

<button class="navbar-toggler" type="button"
        data-bs-toggle="collapse"
        data-bs-target="#nav">
    <span class="navbar-toggler-icon"></span>
</button>

<div id="nav" class="collapse navbar-collapse justify-content-end">
<ul class="navbar-nav gap-3 align-items-lg-center">

    <li class="nav-item">
        <a class="nav-link" href="#layanan">Services</a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="#gallery">Gallery</a>
    </li>

    <li class="nav-item">
        <a class="nav-link"
           href="#"
           data-bs-toggle="modal"
           data-bs-target="#termsModal">
            Terms & Conditions
        </a>
    </li>

    <li class="nav-item">
        <a class="btn btn-pink px-4"
           href="https://wa.me/6287850110424"
           target="_blank">
            WhatsApp
        </a>
    </li>

</ul>
</div>
</div>
</nav>

<main>
@yield('content')
</main>

{{-- FLOATING WHATSAPP --}}
<a href="https://wa.me/6287850110424" target="_blank" class="floating-wa">
    <i class="bi bi-whatsapp"></i>
</a>

{{-- LIGHTBOX --}}
<div id="lightbox" class="lightbox">
<span onclick="closeLightbox()">×</span>
<img id="lightbox-img">
</div>

{{-- FOOTER --}}
<footer class="bg-white border-top mt-5">
<div class="container py-5">

<div class="row g-4">

<div class="col-md-4">
<h5 class="fw-bold text-pink">
{{ $footer->studio_name ?? 'Ning Beauty' }}
</h5>
<p class="text-muted small">
{{ $footer->description ?? '' }}
</p>
</div>

<div class="col-md-4">
<h6 class="fw-semibold mb-3">Contact</h6>
<p class="mb-1">📞 {{ $footer->phone ?? '-' }}</p>
<p class="mb-1">⏰ {{ $footer->working_hours ?? '-' }}</p>
<p class="small text-muted">By appointment only</p>
</div>

<div class="col-md-4">
<h6 class="fw-semibold mb-3">Location</h6>
<p class="mb-1">📍 {{ $footer->location_label ?? '-' }}</p>
<p class="text-muted small">{{ $footer->location_note ?? '' }}</p>

<div class="d-flex gap-3 mt-3">
@if(!empty($footer?->instagram))
<a href="{{ $footer->instagram }}" target="_blank" class="text-pink fs-5">
<i class="bi bi-instagram"></i>
</a>
@endif

@if(!empty($footer?->tiktok))
<a href="{{ $footer->tiktok }}" target="_blank" class="text-pink fs-5">
<i class="bi bi-tiktok"></i>
</a>
@endif
</div>
</div>

</div>

<hr class="my-4">

<div class="text-center text-muted small">
© {{ date('Y') }} {{ $footer->studio_name ?? 'Ning Beauty' }}. All rights reserved.
</div>

</div>
</footer>

{{-- TERMS MODAL --}}
<div class="modal fade" id="termsModal" tabindex="-1">
<div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
<div class="modal-content rounded-4">

<div class="modal-header">
<h5 class="modal-title fw-bold">
{{ $terms->title ?? 'Terms & Conditions' }}
</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
</div>

<div class="modal-body text-muted">
{!! nl2br(e($terms->content ?? '')) !!}
</div>

<div class="modal-footer">
<button class="btn btn-outline-pink" data-bs-dismiss="modal">
Close
</button>
</div>

</div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
function openLightbox(img){
    document.getElementById('lightbox').style.display='flex';
    document.getElementById('lightbox-img').src=img;
}
function closeLightbox(){
    document.getElementById('lightbox').style.display='none';
}
</script>

</body>
</html>
