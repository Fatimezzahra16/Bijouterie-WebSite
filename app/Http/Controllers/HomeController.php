<?php

namespace App\Http\Controllers;
use App\Models\Produit;
use App\Models\Collection;
use App\Models\User;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index_admin(){
        return view('admin.index');
    }
    public function index(){
        return view('index1');
    }
    public function userProducts(){
        $products= Produit::all();
        $collections= Collection::all();
        return view('user.products',compact('products','collections'));
    }
    public function userCollections(){
        $collections= Collection::all();
        $products= Produit::all();
        return view('user.collections',compact('collections','products'));
       
    }
    public function userProductsDetails($id){
        $product= Produit::find($id);
        $collections= Collection::all();
        return view('user.productDetails',compact('product','collections'));
    }
    public function userCollectionsDetails($id){
        $collection= Collection::find($id);
        $products= Produit::all();
        return view('user.collectionDetails',compact('collection','products'));
    }

    /*
    public function userProfile(){
        $user= User::all();
        return view('user.profile',compact('user'));
    }
    public function userProfileEdit($id){
        $user= User::find($id);
        return view('user.profileEdit',compact('user'));
    }
    public function userProfileUpdate(Request $request, $id){
        $user= User::find($id);
        $user->name= $request->name;
        $user->email= $request->email;
        $user->password= bcrypt($request->password);
        $user->save();
        return redirect()->route('user.profile');
    }
    public function userProfileDelete($id){
        $user= User::find($id);
        $user->delete();
        return redirect()->route('home.index');
    }
    public function userProfileShow($id){
        $user= User::find($id);
        return view('user.profileShow',compact('user'));
    }
        */
}
