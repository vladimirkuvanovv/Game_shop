<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

/**
 * Class NewsController
 * @package App\Http\Controllers\Admin
 */
class NewsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $news = News::all();

        return view('admin.news.index', compact('news'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * @param Request $request
     * @param News $news
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request, News $news)
    {

        $this->validate(
            $request,
            [
                'name' => 'required|min:3',
                'description' => 'required',
                'file' => 'required|file',
            ]
        );


        $newItem = $news->create($request->all());
        $newItem->addMedia($request->file('file'))->toMediaCollection();

        return redirect()->route('admin.news.index');
    }

    /**
     * @param Request $request
     * @param News $news
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, News $news)
    {
        $this->validate(
            $request,
            [
                'name' => 'required|min:3',
                'description' => 'required',
                'file' => 'required|file',
            ]
        );

        if($media = $news->getFirstMedia()){
            $media->delete();
        }

        $news->addMedia($request->file('file'))->toMediaCollection();
        $news->update($request->all());


        return redirect(route('admin.news.index'));
    }

    /**
     * @param News $news
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(News $news)
    {
        return view(
            'admin.news.edit',
            [
                'news' => $news,

            ]
        );
    }

    /**
     * @param News $news
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy(News $news)
    {
        $news->delete();

        return redirect(route('admin.news.index'));
    }
}
