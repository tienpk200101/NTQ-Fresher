<?php

namespace App\Http\Controllers;

use App\Services\HomeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

class HomeController extends Controller
{
    protected $homeService;

    public function __construct(HomeService $homeService)
    {
        $this->homeService = $homeService;
    }

    public function index() {
        $products = $this->homeService->showHome();

        return view('client_2.index', [
            'products' => $products,
            'title_head' => 'Home'
        ]);
    }
}
