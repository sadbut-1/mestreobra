<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class ParceiroController extends Controller
{


    public function __construct()
    {
    }

    public function index()
    {
        return view('admin.config.parceiros-config');
    }

}
