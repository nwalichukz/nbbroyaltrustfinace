<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function home()
    {
        return view('index');
    }

    // Add one method per static page, each simply returning its view:
    // public function about() { return view('pages.about'); }
}
