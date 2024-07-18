<?php

namespace App\Composers;

use App\Models\Category;
use Illuminate\View\View;

class CategoryComposer
{
    /**
     * The user repository implementation.
     *
     * @var 
     */
    protected $category;

    /**
     * Create a new profile composer.
     *
     * @param  $category
     * @return void
     */
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('categories', $this->category->getParents());
    }
}