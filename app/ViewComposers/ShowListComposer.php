<?php


namespace App\ViewComposers;


use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class ShowListComposer
{
        public function compose(View $view)
        {
            $showProductList = Session::get('cart');
            $showList = [];
            if (isset($showProductList)) {
                foreach ($showProductList as $id => $item) {
                    $showList[] = Product::query()->find($id)->getAttributes();
                }
            }
            $view->with('showList',$showList);
        }
}
