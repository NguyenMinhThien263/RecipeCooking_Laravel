<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    //
    public function dashboard()
    {
        $all_recipe = Recipe::with('user')->when(request()->has('search'), function ($query) {
            $query->search(request('search', ''));
        })->orderBy('created_at', 'DESC')->paginate(5);
        // dd($all_recipe);
        return view('clients.dashboard', compact('all_recipe'));
    }
}
