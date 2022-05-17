<?php

namespace App\Http\Controllers\User;

use App\FooterSettings;
use App\HeaderSettings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $footerSettings = FooterSettings::first();
        $headerSettings = HeaderSettings::first();
        return view('welcome', [
            'footerSettings' => $footerSettings,
            'headerSettings' => $headerSettings,
        ]);
    }
}
