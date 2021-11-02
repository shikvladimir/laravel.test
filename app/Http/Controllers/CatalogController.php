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
        $cartCount = Session::get('cart');
        if (isset($cartCount)) {
            $show = count($cartCount);
        } else {
            $show = 0;
        }


        $wishCount = Session::all();
        if(isset($wishCount['wishlist'])){
            $wishlistCount = count($wishCount['wishlist']);
        }else{
            $wishlistCount = 0;
        }

        $showProductList = Session::get('cart');
        $showList = [];
        if (isset($showProductList)) {
            $productList = $showProductList;
            foreach ($productList as $id => $item) {
                $showList[] = Product::query()->find($id)->getAttributes();
            }
        }

        $result = Session::get('cart');;
        $sum = 0;
        $res = [];
        if (isset($result)) {
            foreach ($result as $id => $item){
                $res[] = Product::query()
                    ->find($id)['price'];
            }
            foreach ($res as $key => $value){
                $sum += $value;
            }
        }

        $categories = Category::all();
        $products = Product::query()
            ->paginate(9);

        return view('catalog.catalog',
            compact('categories', 'products','show','wishlistCount','showList','sum'));


    }

    public function category(Request $request, Category $category)
    {
        $cartCount = Session::get('cart');
        if (isset($cartCount)) {
            $show = count($cartCount);
        } else {
            $show = 0;
        }

        $wishCount = Session::all();
        if(isset($wishCount['wishlist'])){
            $wishlistCount = count($wishCount['wishlist']);
        }else{
            $wishlistCount = 0;
        }
        $categories = Category::all();
        $products = Product::query()
            ->paginate(9);

        $showProductList = Session::get('cart');
        $showList = [];
        if (isset($showProductList)) {
            $productList = $showProductList;
            foreach ($productList as $id => $item) {
                $showList[] = Product::query()->find($id)->getAttributes();
            }
        }

        $result = Session::get('cart');;
        $sum = 0;
        $res = [];
        if (isset($result)) {
            foreach ($result as $id => $item){
                $res[] = Product::query()
                    ->find($id)['price'];
            }
            foreach ($res as $key => $value){
                $sum += $value;
            }
            dump($sum);

        }

        return view('catalog.catalog',
            compact('category', 'categories', 'products','show','wishlistCount','showList','sum'));
    }

    public function product(Request $request, $category, $product)
    {
        return view('catalog.product');
    }
}
