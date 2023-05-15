<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Entities
use Modules\Package\Entities\Package;
use Modules\Theme\Entities\Theme;

class PageController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all package
        $packages = Package::all();
        $themes = Theme::all();

        $data = [
            "packages" => $packages,
            "themes" => $themes,
        ];

        return view('user.dashboard.index', compact('data'));
    }

}
