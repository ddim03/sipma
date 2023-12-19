<?php

namespace App\Http\Controllers;

use App\Models\Arsip;
use App\Models\Post;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard.index', [
            'total' => Post::count(),
            'validated' => Post::where('is_validated', 1)->count(),
            'waiting' => Post::where('is_validated', 0)->count(),
            'arsips' => Arsip::count()
        ]);
    }
}
