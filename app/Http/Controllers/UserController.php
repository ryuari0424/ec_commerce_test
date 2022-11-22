<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function index(){

    $user = Auth::user();
    $products = Product::all();

    return Inertia::render('User/Index', ['user' => $user, 'products' => $products]);
    }


}
