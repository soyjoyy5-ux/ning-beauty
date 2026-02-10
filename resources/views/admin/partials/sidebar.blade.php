<div class="p-5 border-b">
    <h1 class="text-xl font-bold text-pink-500">Ning Beauty</h1>
    <p class="text-xs text-gray-400">Admin Panel</p>
</div>

<nav class="p-4 space-y-1">

    <a href="{{ route('admin.dashboard') }}"
       class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-pink-50 text-gray-700">
        <i class="bi bi-speedometer2"></i>
        Dashboard
    </a>

    <a href="{{ route('admin.banners.index') }}"
       class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-pink-50 text-gray-700">
        <i class="bi bi-images"></i>
        Banner
    </a>

    <a href="{{ route('admin.products.index') }}"
       class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-pink-50 text-gray-700">
        <i class="bi bi-box-seam"></i>
        Produk / Layanan
    </a>

    {{-- ✅ MENU GALLERY --}}
    <a href="{{ route('admin.galleries.index') }}"
       class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-pink-50 text-gray-700">
        <i class="bi bi-images-alt"></i>
        Gallery
    </a>

    {{-- WEBSITE SETTINGS --}}
    <a href="{{ route('admin.footer.edit') }}"
    class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-pink-50 text-gray-700">
        <i class="bi bi-gear"></i>
        Website Settings
    </a>
    <a href="{{ route('admin.testimonials.index') }}"
    class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-pink-50">
        <i class="bi bi-star-fill"></i>
        Testimonials
    </a>
        <a href="{{ route('admin.terms.index') }}"
        class="flex items-center gap-3 px-4 py-2 rounded-lg
        {{ request()->routeIs('admin.terms.*') ? 'bg-pink-100 text-pink-600' : '' }}">
            <i class="bi bi-file-earmark-text"></i>
            <span>Terms & Conditions</span>
        </a>




    <hr class="my-4">

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button class="w-full flex items-center gap-2 px-4 py-2 text-red-500 hover:bg-red-50 rounded-lg">
            <i class="bi bi-box-arrow-right"></i>
            Logout
        </button>
    </form>
</nav>

