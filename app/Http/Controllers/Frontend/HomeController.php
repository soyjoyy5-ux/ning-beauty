<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Product;
use App\Models\Gallery;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index()
    {
        $banners = Banner::where('is_active', true)
            ->latest()
            ->get();

        $products = Product::where('is_active', true)
            ->latest()
            ->get();

        $galleries = Gallery::where('is_active', true)
            ->latest()
            ->take(8)
            ->get();

        $testimonials = Testimonial::where('is_active', true)
            ->latest()
            ->get();

        return view('frontend.home', compact(
            'banners',
            'products',
            'galleries',
            'testimonials'
        ));
    }
}
