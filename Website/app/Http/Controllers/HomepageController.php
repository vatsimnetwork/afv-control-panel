<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RunwayConfiguration;

class HomepageController extends Controller
{
    public function __invoke()
    {
        if(auth()->check()) {
            // Get user permissions
        } else {
            // $permissions = [];
        }

        return view('index');
    }
}
