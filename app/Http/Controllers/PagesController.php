<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

/**
 * Class PagesController
 * @package App\Http\Controllers
 */
class PagesController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function about()
    {
        $this->setTitle('О магазине');

        $otherProducts = Product::inRandomOrder()->take(3)->get();

        return view('about', compact('otherProducts'));

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function feedback()
    {
        $this->setTitle('Напишите нам');

        $otherProducts = Product::inRandomOrder()->take(3)->get();

        return view('feedback', compact('otherProducts'));

    }

    public function feedbackSend(Request $request)
    {

        $this->validate(
            $request,
            [
                'name' => 'required|min:3',
                'email' => 'required|email',
                'text' => 'required',
            ]
        );

        \Session::flash('feedback_success', 'Ваше сообщение принято, Мы обязательно свяжемся с вами!');

        return redirect()->route('feedback');
    }
}
