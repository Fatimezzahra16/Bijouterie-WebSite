<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index_admin(){
        return view('admin.index');
    }
    public function index(){
        return view('index1');
    }
}
