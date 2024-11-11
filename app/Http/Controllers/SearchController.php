<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    //
    public function getSearchFrom()
    {
        $user = Auth::user();
        if ($user && $user->isadmin) {
            return redirect()->intended('admin/recipe')->with('routename', 'admin.search');
        } else {
            return redirect()->intended('/')->with('routename', 'client.search');
        }
    }
}
