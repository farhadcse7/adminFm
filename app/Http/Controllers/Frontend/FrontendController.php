<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    public function index($page_slug)
    {
        $page = Page::findBySlug($page_slug);
        return view('about-us', compact('page'));
    }
}
