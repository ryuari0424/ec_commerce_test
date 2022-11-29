<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{

    public function index(){
        return Inertia::render('Admin/Index');
    }
}
