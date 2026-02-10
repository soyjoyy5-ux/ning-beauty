<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Banner;

class DashboardController extends Controller
{
    public function index()
{
    return view('admin.dashboard', [
        'totalProducts' => Product::count(),
        'totalBanners'  => Banner::count(),
        'activeBanners' => Banner::where('is_active', true)->count(),
        'inactiveBanners' => Banner::where('is_active', false)->count(),
    ]);
}

}
