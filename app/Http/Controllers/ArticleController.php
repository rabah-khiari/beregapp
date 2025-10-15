<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        return view('articles', compact('articles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'nullable',
        ]);

        Article::create($request->only('title', 'content'));
        return redirect()->back();
    }

    public function destroy($id)
    {
        Article::destroy($id);
        return redirect()->back();
    }
}

