<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocalizationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function setLanguage (Request $request, $locale)
    {
        app()->setLocale($locale);
        session()->put('locale', $locale);
        // dd(session()->get('locale'));
        return redirect()->back();
     }

    
}
