<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    // show user dashboard
    public function showUserDashBoard()
    {
        return view('admin.listuser');
    }
    public function showRecipeDashBoard()
    {
        return view('admin.listrecipe');
    }
    public function showRecipeAddForm()
    {
        return view('admin.formaddrecipe');
    }
    public function showRecipeEditForm()
    {
        return view('admin.formeditrecipe');
    }
}
