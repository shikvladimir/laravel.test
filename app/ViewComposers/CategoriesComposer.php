<?php


namespace App\ViewComposers;


use App\Models\Category;
use Illuminate\View\View;

class CategoriesComposer
{
        public function compose(View $view)
        {
            $categories = Category::all();
            $view->with('categories',$categories);
        }
}
