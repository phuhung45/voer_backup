<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class LangController extends Controller
{
    public function changerLang($locale){
        $lang = $locale;
        Session::put('language', $lang);
        return redirect()->back();
    }
}
