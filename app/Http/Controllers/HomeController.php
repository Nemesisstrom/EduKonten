<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Halaman Beranda
    public function index()
    {
        return view('home');
    }

    // Halaman Tips
    public function tips()
    {
        $tips = [
            "Kenali audiens Anda",
            "Gunakan bahasa yang santun",
            "Saring informasi sebelum dibagikan",
            "Gunakan sumber terpercaya"
        ];

        return view('tips', compact('tips'));
    }
}
