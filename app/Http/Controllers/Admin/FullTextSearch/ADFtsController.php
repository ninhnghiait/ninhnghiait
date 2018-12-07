<?php

namespace App\Http\Controllers\Admin\FullTextSearch;

use App\Http\Controllers\Controller;
use App\Model\Article;
use Illuminate\Http\Request;

class ADFtsController extends Controller
{
    public function search(Request $request)
    {
    	if($request->has('name')){
           $items = Article::search($request->name)->paginate(50);
    	}else{
    		$items = Article::paginate(50);
    	}
    	return view('admin.fts.index', compact('items'));
    }

    public function ajax()
    {
    	$items = Article::paginate(50);
    	return view('admin.fts.ajax', compact('items'));
    }

    public function create()
    {
        return view('admin.fts.create');
    }

    public function store(Request $request)
    {
        $article = new Article;
        $article->setAttribute('name', $request->name);
        $article->setAttribute('cat_id', $request->cat_id);
        $article->setAttribute('picture', $request->picture);
        $article->setAttribute('preview', $request->preview);
        $article->setAttribute('detail', $request->detail);
        $article->setAttribute('user_id', $request->user_id);
        $article->save();
        return redirect()->route('ad_fts.search');
    }

    public function delete()
    {
        $article = Article::find(1);
        $article->delete();
    }
}
