<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        return view(
            'admin.dashboard',
            [
                'toggle_class' => false
            ]
        );
    }

    public function users() {
        return view('admin.users');
    }
}
