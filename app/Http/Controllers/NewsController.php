<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Product;

/**
 * Class NewsController
 * @package App\Http\Controllers
 */
class NewsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() //View для страницы новости
    {
        $this->setTitle('Новости');

        $news = News::all();

        return view('news', compact('news'));
    }

    /**
     * @param News $news
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function detail(News $news) //метод для одной новости
    {
        $this->setTitle($news->name);
        $otherProducts = Product::inRandomOrder()->take(3)->get();

        return view('news-detail', compact('news', 'otherProducts'));
    }
}
