<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LandingPage;

class LandingPageController extends Controller
{
    public function getLP($url) {
    	return LandingPage::where('url', $url)
    			->where('publicada', 1)
    			->first();
    }
}
