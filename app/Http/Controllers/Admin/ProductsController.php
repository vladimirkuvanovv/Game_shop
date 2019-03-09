<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

/**
 * Class ProductsController
 * @package App\Http\Controllers\Admin
 */
class ProductsController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $products = Product::all();

        return view('admin.products.index', compact('products'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.products.create', compact('categories'));
    }

    /**
     * @param Request $request
     * @param Product $product
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws ValidationException
     */
    public function store(Request $request, Product $product)
    {
        $this->validate(
            $request,
            [
                'name' => 'required|min:3',
                'price' => 'required|numeric',
                'category' => 'required|numeric',
                'file' => 'required|file',
            ]
        );

        $newProduct = $product->create($request->all());
        $newProduct->addMedia($request->file('file'))->toMediaCollection();

        return redirect(route('admin.products.index'));
    }

    /**
     * @param Request $request
     * @param Product $product
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws ValidationException
     */
    public function update(Request $request, Product $product)
    {
        $this->validate(
            $request,
            [
                'name' => 'required|min:3',
                'price' => 'required|numeric',
                'category' => 'required|numeric',
                'file' => 'required|file',
            ]
        );

        if($media = $product->getFirstMedia()){
            $media->delete();
        }

        $product->addMedia($request->file('file'))->toMediaCollection();
        $product->update($request->all());


        return redirect(route('admin.products.index'));
    }

    /**
     * @param Product $product
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Product $product)
    {
        $categories = Category::all();

        return view(
            'admin.products.edit',
            [
                'product' => $product,
                'categories' => $categories,
            ]
        );
    }

    /**
     * @param Product $product
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect(route('admin.products.index'));
    }


}
