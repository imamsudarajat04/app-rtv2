<?php

namespace App\Http\Controllers\User;

use App\Faq;
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
        $faqs = Faq::all();
        return view('welcome', [
            'faqs'           => $faqs,
            'footerSettings' => $footerSettings,
            'headerSettings' => $headerSettings,
        ]);
    }
}
