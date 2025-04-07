<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Produit;
use App\Models\Collection;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $products = Produit::with('collection')->get();
        $collections = Collection::all();
        //return view('products.index',['products' => $products]);
        return view('products.index', compact('products','collections'));
    }
    // filtrer les produits
    public function filtrer(Request $request)
{
    $query = Produit::query();

    if ($request->filled('nom')) {
        $query->where('nom', 'like', '%' . $request->nom . '%');
    }

    if ($request->filled('collection_id')) {
        $query->where('collection_id', $request->collection_id);
    }

    if ($request->filled('prix_min')) {
        $query->where('prix', '>=', $request->prix_min);
    }

    if ($request->filled('prix_max')) {
        $query->where('prix', '<=', $request->prix_max);
    }

    if ($request->has('stock_only')) {
        $query->where('stock', '>', 0);
    }

    if ($request->filled('sort_by')) {
        $query->orderBy($request->sort_by, 'asc');
    }

    $products = $query->paginate(10); // Pagination ici
    $collections = Collection::all();

    return view('products.index', compact('products', 'collections'));
}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $collections = \App\Models\Collection::all();
        //dd($collections);
        return view('products.create', compact('collections'));
   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request -> validate([
            'nom' => 'required',
            'description'=> 'required',
            'prix' => 'required|decimal:0,2',
            'stock' => 'required|numeric',
            'collection_id' => 'required|exists:collections,id',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        //dd($data);
        //dd($request->all());
        //dd($request->file('photo'));
        //dd($request->photo);
        //dd($request->hasFile('photo'))
        if ($request->hasFile('photo')) {
            $imageName = time().'.'.$request->photo->extension();
            $request->photo->move(public_path('images/products'), $imageName);
            $data['photo'] = $imageName;
        }

        $newProduct = Produit::create($data);
        return redirect(route('product.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    /*
    public function show(Produit $produit)
    {
        //
    }
    */
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function edit(Produit $product)
    {
        $collections = \App\Models\Collection::all();
        return view('products.edit', compact('product','collections'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produit $product)
    {
        $data = $request -> validate([
            'nom' => 'required',
            'description'=> 'required',
            'prix' => 'required|decimal:0,2',
            'stock' => 'required|numeric',
            'collection_id' => 'required|exists:collections,id',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $imageName = time().'.'.$request->photo->extension();
            $request->photo->move(public_path('images/products'), $imageName);
            $data['photo'] = $imageName;
        }
        //dd($data);
        //dd($product);
        $product->update($data) ;
        return redirect(route('product.index'))->with('success','Le produit a été modifier avec succés');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function delete(Produit $product)
    {
        $product->delete();
        return redirect(route('product.index'))->with('success','Le produit a été supprimer avec succés');

    }

    public function show(Produit $product)
    {
        return view('products.show', compact('product'));
    }
    public function showByType($type)
    {
        $products = Produit::where('type', $type)->get();
        return view('products.index', compact('products'));
    }   
}
