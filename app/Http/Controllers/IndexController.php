<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

/**
 * Class IndexController
 * @package App\Http\Controllers
 */
class IndexController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show()
    {

        $this->setTitle('Главная страница');

        return view('index',[
            'products' => Product::all()->take(6) //выбираем продукты из БД с помощью ORM
        ]);
    }
}
