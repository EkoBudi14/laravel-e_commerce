<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardSettingController extends Controller
{
    public function account()
    {
        return view('pages.dashboard-account');
    }

    public function setting()
    {
        return view('pages.dashboard-setting');
    }
}

