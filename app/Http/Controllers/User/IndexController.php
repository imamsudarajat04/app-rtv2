<?php

namespace App\Http\Controllers\User;

use App\Faq;
use App\About;
use App\GlobalSetting;
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
        $globalSettings = GlobalSetting::first();
        $faqs = Faq::all();
        return view('welcome', [
            'faqs'           => $faqs,
            'globalSettings' => $globalSettings,
            'footerSettings' => $footerSettings,
            'headerSettings' => $headerSettings,
        ]);
    }
}
