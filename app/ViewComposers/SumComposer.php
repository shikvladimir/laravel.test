<?php


namespace App\ViewComposers;


use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class SumComposer
{
        public function compose(View $view)
        {
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
            $view->with('sum',$sum);
        }
}
