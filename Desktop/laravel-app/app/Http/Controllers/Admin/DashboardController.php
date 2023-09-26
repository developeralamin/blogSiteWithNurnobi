<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Dashboad method
     */
    public function dashboard()
    {
        return view('admin.layout');
    }
}
