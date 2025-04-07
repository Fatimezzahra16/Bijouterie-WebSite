<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Collection;

class CollectionController extends Controller
{
    public function index(){
        $collections = Collection::all();
        return view('collections.index',['collections' => $collections]);
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
    public function create(){
        return view('collections.create');
    }
    public function store(Request $request){
        $data = $request -> validate([
            'nom' => 'required',
            'description'=> 'required',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $imageName = time().'.'.$request->photo->extension();
            $request->photo->move(public_path('images/collections'), $imageName);
            $data['photo'] = $imageName;
        }

        $NewCollection=Collection::create($data);
        return redirect(route('collection.index'));

    }
    public function edit(Collection $collection){
        return view('collections.edit',['collection' => $collection]);

    }
    public function update(Collection $collection , Request $request){
        $data = $request -> validate([
            'nom' => 'required',
            'description'=> 'required',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            // 🔥 Supprimer l'ancienne image si elle existe
            if ($collection->photo && file_exists(public_path('images/collections/' . $collection->photo))) {
                unlink(public_path('images/collections/' . $collection->photo));
            }
                // ✅ Enregistrer la nouvelle image
                  $imageName = time() . '.' . $request->photo->extension();
                  $request->photo->move(public_path('images/collections'), $imageName);
                  $data['photo'] = $imageName;
            }

        $collection -> update($data);
        return redirect(route("collection.index"))->with('success','la collection a été modifier avec succés!');
    }

    public function delete(Collection $collection){
        $collection->delete();
        return redirect(route("collection.index"))->with('success','la collection a été supprimer avec succés!');
    }
}
