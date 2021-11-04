<?php

namespace App\Http\Controllers;

use App\Contracts\ProductServiceInterface;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CatalogController extends Controller
{
//    public function __construct(ProductServiceInterface $productService){
//        $this->productService = $productService;
//    }

    public function index(Request $request)
    {
        $products = Product::query()
            ->paginate(9);

        return view('catalog.catalog',
            compact('products'));


    }

    public function category(Request $request, Category $category)
    {

        $products = Product::query()
            ->paginate(9);


        return view('catalog.catalog',
            compact('category', 'products'));
    }

    public function product(Request $request, $category, $product)
    {
        return view('catalog.product');
    }
}
