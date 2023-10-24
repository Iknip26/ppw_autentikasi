<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\datacvs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class web_controller extends Controller
{
    public function index(){
        $CV = datacvs::latest()->paginate(3);
        return view('home2', compact('CV'));
    }
}
