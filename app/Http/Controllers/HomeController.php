<?php

namespace App\Http\Controllers;

use App\Models\Produit;  
use App\Models\Commande; 
use App\Models\Collection;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index_admin()
    {
    // Total Sales
    $currentMonthSales = Commande::whereMonth('created_at', now()->month)
        ->sum('total');
    $lastMonthSales = Commande::whereMonth('created_at', now()->subMonth()->month)
        ->sum('total');
    $salesPercentageChange = $this->calculatePercentageChange($currentMonthSales, $lastMonthSales);

    // New Orders
    $currentMonthOrders = Commande::whereMonth('created_at', now()->month)->count();
    $lastMonthOrders = Commande::whereMonth('created_at', now()->subMonth()->month)->count();
    $ordersPercentageChange = $this->calculatePercentageChange($currentMonthOrders, $lastMonthOrders);

    // Products
    $totalProducts = Produit::count();
    $newThisWeek = Produit::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->count();

    // Customers
    $totalCustomers = User::count();
    $newToday = User::whereDate('created_at', today())->count();

    // Latest Orders (for order list)
    $latestOrders = Commande::with('user')
        ->orderBy('created_at', 'DESC')
        ->take(5)
        ->get();

    return view('admin.index', compact(
        'currentMonthSales',
        'salesPercentageChange',
        'currentMonthOrders',
        'ordersPercentageChange',
        'totalProducts',
        'newThisWeek',
        'totalCustomers',
        'newToday',
        'latestOrders'
    ));
}
    

    private function calculatePercentageChange($current, $previous)
    {
        if ($previous == 0) return 0;
        return (($current - $previous) / $previous) * 100;
    }

    public function index()
    {
        return view('index1');
    }

    public function userProducts()
    {
        $products = Produit::all();
        $collections = Collection::all();
        return view('user.products', compact('products', 'collections'));
    }

    public function userCollections()
    {
        $collections = Collection::all();
        $products = Produit::all();
        return view('user.collections', compact('collections', 'products'));
    }

    public function userProductsDetails($id)
    {
        $product = Produit::findOrFail($id);
        $collections = Collection::all();
        return view('user.productDetails', compact('product', 'collections'));
    }

    public function userCollectionsDetails($id)
    {
        $collection = Collection::findOrFail($id);
        $products = Produit::all();
        return view('user.collectionDetails', compact('collection', 'products'));
    }
}