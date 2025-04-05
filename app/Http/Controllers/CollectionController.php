<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CollectionController extends Controller
{
    public function index(){
        return view('collections.index');
    }
    public function index_or(){
        return view('collections.or');
    }
    public function index_argent(){
        return view('collections.argent');
    }
    public function index_diamant(){
        return view('collections.diamants');
    }
}
