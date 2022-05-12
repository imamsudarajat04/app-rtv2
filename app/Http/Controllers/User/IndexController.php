<?php

namespace App\Http\Controllers\User;

use App\FooterSettings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $footerSettings = FooterSettings::first();
        return view('welcome', [
            'footerSettings' => $footerSettings
        ]);
    }
}
