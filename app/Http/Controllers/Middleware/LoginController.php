<?php

namespace App\Http\Controllers\Middleware;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Apartment;

class LoginController extends Controller
{
    
    public function login(){
        $apartments = Apartment::all();
        $requireLogin = 1;
        return view('guest.index' , compact('requireLogin' , 'apartments'));
    }
}
