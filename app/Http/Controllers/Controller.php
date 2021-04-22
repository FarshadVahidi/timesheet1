<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(): \Illuminate\Contracts\View\View
    {

        if(auth()->user()->hasRole('superadministrator'))
        {
            return View::make('Super.dashboard');
        }
        if(auth()->user()->hasRole('administrator'))
        {
            return View::make('Admin.dashboard');
        }
        if(auth()->user()->hasRole('user'))
        {
            return View::make('User.dashboard');
        }
        abort(403);
    }
}
