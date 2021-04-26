<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardAdminController extends AdminController
{
    public function __invoke()
    {
        return view('admin.dashboard.show');
    }
}
