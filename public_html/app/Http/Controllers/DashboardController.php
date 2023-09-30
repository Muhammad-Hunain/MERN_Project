<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    
    public function index()
    {

        $pageTitle = 'Dashboard';
        $pageHead = 'Dashboard';
        $activeMenu = 'dashboard';

        $total_cats = Category::count();

        return view('dashboard',compact('pageTitle','pageHead','activeMenu','total_cats'));

    }

}
