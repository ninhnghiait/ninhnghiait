<?php

namespace App\Http\Controllers\Admin\Article;

use App\Http\Controllers\Controller;
use App\Model\Article;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class ADArticleController extends Controller
{
    public function index()
    {
        $article = Article::get();
        return view('admin.article.index');
    }

    public function data()
    {
        $article = Article::get();
        return Datatables::of($article)
            ->editColumn('picture', function ($article) {
                return '<img width="150" class="img-thumbnail" src="/storage/app/files/articles/'.$article->picture.'" alt="" >';
            })
            ->rawColumns(['picture'])
            ->make(true);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }


}
