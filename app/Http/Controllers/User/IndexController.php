<?php

namespace App\Http\Controllers\User;

use App\Faq;
use App\About;
use App\GlobalSetting;
use App\FooterSettings;
use App\HeaderSettings;
use App\ManfaatSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $faqs = Faq::all();
        $abouts = About::first();
        $globalSettings = GlobalSetting::first();
        $footerSettings = FooterSettings::first();
        $headerSettings = HeaderSettings::first();
        $manfaatSettings = ManfaatSetting::first(); 

        return view('welcome', [
            'faqs'            => $faqs,
            'abouts'          => $abouts,
            'globalSettings'  => $globalSettings,
            'footerSettings'  => $footerSettings,
            'headerSettings'  => $headerSettings,
            'manfaatSettings' => $manfaatSettings,
        ]);
    }
}
