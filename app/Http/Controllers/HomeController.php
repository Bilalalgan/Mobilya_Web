<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class HomeController extends Controller
{
    public function __construct()
    {
        // Eğer kullanıcı oturum açmışsa bilgilerini tüm view'lara paylaş
        if (Auth::check()) {
            view()->share('user', Auth::user());
        }
    }

    public function index() 
    {
        return view('index');
    }

    public function urunlerimiz() 
    {
        return view('product');
    }

    public function urundetay() 
    {
        return view('product-detail');
    }

    public function uygulamalarimiz() 
    {
        return view('blog');
    }

    public function uygulama_detay() 
    {
        return view('blog-detail');
    }

    public function hakkimizda() 
    {
        return view('about');
    }

    public function iletisim() 
    {
        return view('contact');
    }

    
}
