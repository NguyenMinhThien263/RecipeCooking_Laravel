<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Recipe;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // show user dashboard
    public function showUserDashBoard()
    {
        $all_user = User::all();
        // dd($all_user);
        return view('admin.listuser', compact('all_user'));
    }
    public function showRecipeDashBoard()
    {
        $all_recipe = Recipe::select(['id', 'title', 'image'])->get();
        return view('admin.listrecipe', compact('all_recipe'));
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
