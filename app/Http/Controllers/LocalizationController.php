<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
class LocalizationController extends Controller
{
    public function index($locale)
    {
        session(['locale' => $locale]);
        App::setLocale($locale);
        
    
        return \redirect()->back();
    }
}
