<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin Panel')</title>

    {{-- Bootstrap (dropdown & icon helper) --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">

<div class="flex min-h-screen">

    {{-- SIDEBAR --}}
    <aside class="w-64 bg-white border-r shadow-sm">
        @include('admin.partials.sidebar')
    </aside>

    {{-- MAIN --}}
    <div class="flex-1 flex flex-col">

        {{-- NAVBAR --}}
        @include('admin.partials.navbar')

        {{-- CONTENT --}}
        <main class="flex-1 p-6">
            @yield('content')
        </main>

        {{-- FOOTER --}}
        <footer class="bg-white border-t text-center py-2 text-sm text-gray-400">
            © {{ date('Y') }} Ning Beauty Admin
        </footer>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</body>
</html>
