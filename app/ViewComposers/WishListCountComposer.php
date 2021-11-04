<?php


namespace App\ViewComposers;


use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class WishListCountComposer
{
        public function compose(View $view)
        {
            $wishCount = Session::get('wishlist');
            if (isset($wishCount)) {
                $wishlistCount = count($wishCount);
            } else {
                $wishlistCount = 0;
            }
            $view->with('wishlistCount',$wishlistCount);
        }
}
