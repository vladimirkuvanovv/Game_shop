<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use App\Models\Product;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use SEO;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Controller constructor.
     */
    public function __construct()
    {
        view()->composer(  //передаем данные с помощью composer  во все шаблоны
            '*', // подключаем ко всем шаблонам
            function ($view) {
                /* @var $view View */
                $view->with('user', auth()->user()); //позволяет установить во всех view глобально пееременную user
                $view->with('cart', session()->get('cart', []));
            }
        );

        view()->share(
            [
                'pageTitle' => 'Empty title',
            ]
        );  //default значение

        if (\Request::is('admin*')) { //поиск в текущем url по данному шаблону
             view()->share( // передаем данные во все шаблоны
                [
                    'sidebarCats' => [
                        [
                            'name' => 'Товары',
                            'url' => route('admin.products.index'),
                        ],
                        [
                            'name' => 'Категории',
                            'url' => route('admin.categories.index'),
                        ],
                        [
                            'name' => 'Новости',
                            'url' => route('admin.news.index'),
                        ],
                    ],
                ]
            );
        } else {
            view()->share(
                [
                    'menuTitle' => 'Категории',
                    'sidebarCats' => Category::all(),
                    'randomProduct' => Product::inRandomOrder()->first(),
                    'lastNews' => News::all()->take(3),
                ]
            );
        }


    }

    /**
     * @param string $title
     */
    public function setTitle($title = 'Page title')
    {
        SEO::setTitle($title);

        \View::share('pageTitle', $title);
    }

}
