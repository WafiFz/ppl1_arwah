<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Entities

use Modules\Package\Entities\Package;

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

        $data = [
            "packages" => $packages
        ];

        return view('user.dashboard.index', compact('data'));
    }

}
