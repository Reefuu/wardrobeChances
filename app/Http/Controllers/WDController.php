<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class WDController extends Controller
{
    public function index(Request $request){
        if($request->has('search')){
            return view('index', [
                "pagetitle" => "Writers",
                "maintitle" => "Writers in My Library",
                "users" => User::all(),
                "searches" => $request->search,
            ]);
        }
        else{
            return view('index', [
                "pagetitle" => "Writers",
                "maintitle" => "Writers in My Library",
                "users" => User::all(),
            ]);
        }
    }
}
