<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

/**
 * Class ShopController
 * @package App\Http\Controllers
 */
class ShopController extends Controller
{

    /**
     * @param Category $category
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function categoryDetailPage(Category $category)
    {

        $this->setTitle("Игры в разделе $category->name");
        $products = Product::where('category', '=', $category->id)->paginate(6);

        return view('category', compact('category', 'products'));
    }

    /**
     * @param Category $category
     * @param Product $product
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function productDetailPage(Category $category, Product $product)
    {
        $this->setTitle("$product->name в разделе {$product->categoryItem->name}");

        $otherProducts = Product::where('id', '!=', $product->id)->inRandomOrder()->take(3)->get();

        return view('product', compact('category', 'product', 'otherProducts'));
    }

    /**
     * @param Product $product
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function addToCard(Product $product)
    {

        session()->push(
            'cart',
            [
                'key' => md5(Carbon::now()->timestamp),
                'product_id' => $product->id,
                'qnt' => 1,
            ]
        );

        return response()->json(
            [
                'success' => true,
                'data' => view('layouts.include.cart', ['cartQnt' => count(session()->get('cart'))])->render(),
            ]
        );
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function cart()
    {
        $this->setTitle('Моя корзина');
        $cartItems = session()->get('cart', []); //получаем данные из сессии, записанные в переменную cart в методе AddToCart

        $cartItems = array_map(  //применяет callback ко всем элементам массива $cartItems
            function ($item) {
                $product = Product::find($item['product_id']);
                $product->cartKey = $item['key'];

                return $product;
            },
            $cartItems  // массив, к которому применяется callback
        );

        return view('cart', ['cartItems' => $cartItems]);
    }

    /**
     * @param null $carItemKey
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function cartDelete($carItemKey = null)
    {
        abort_if(empty($carItemKey), 404);

        $cartItems = session()->get('cart', []);
        foreach ($cartItems as $k => $cartItem) {
            if ($cartItem['key'] == $carItemKey) {
                unset($cartItems[$k]); //удаление объектов из корзины
            }
        }

        session()->put('cart', $cartItems); //сохранение данных в сессии

        return redirect()->route('shop.cart');
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function orders()
    {
        $this->setTitle('Мои заказы');
        $orders = Order::where('user_id', '=', auth()->user()->id)->paginate(10);


        return view('orders', compact('orders'));

    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function createOrder()
    {
        $cartItems = session()->get('cart');
        $productsId = [];
        $amount = 0;

        foreach ($cartItems as $item) {
            $product = Product::find($item['product_id']);
            $productsId[] = $item['product_id'];
            $amount += $product->price;
        }


        $order = Order::create(
            [
                'qty' => count($productsId),
                'amount' => $amount,
                'product_ids' => $productsId,
                'user_id' => auth()->user()->id,
            ]
        );

        if (isset($order->id)) {
            session()->forget('cart'); //удаление данных из сессии
        }

        return response()->json(
            [
                'success' => true,
                'orderId' => $order->id,
            ]
        );

    }

    /**
     * @param Order $order
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function orderDetail(Order $order)
    {
        $this->setTitle("Детализация заказа №{$order->id}");


        return view('order-detail', compact('order'));
    }

}
