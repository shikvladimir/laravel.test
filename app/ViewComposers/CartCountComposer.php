<?php


namespace App\ViewComposers;


use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class CartCountComposer
{
        public function compose(View $view)
        {
            $cartCount = Session::get('cart');
            if (isset($cartCount)) {
                $show = count($cartCount);
            } else {
                $show = 0;
            }
            $view->with('show',$show,);
        }
}
