<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LangController extends Controller
{
    public function setLang($lang, Request $request)
    {
        $acceptedLangs = ['en', 'ar'];

        if (!in_array($lang, $acceptedLangs)) {
            $lang = 'en';
        }

        // حفظ اللغة في الجلسة
        $request->session()->put('lang', $lang);

        // ضبط اللغة في التطبيق
        App::setLocale($lang);

        return back();
    }
}
