<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // データベースから記事情報を取得して変数に代入
        $articles = Article::orderby('created_at', 'desc')->get();

        // 記事一覧画面を表示
        return view('dashboard', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 記事投稿画面を表示
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // フォームに入力された内容を変数に取得
        $form = $request->all();

        // フォームに入力された内容をデータベースへ登録
        $article = new Article();
        $article->fill($form)->save();

        // 記事一覧画面を表示
        return redirect()->route('article.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        // 記事閲覧画面を表示
        return view('show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        // 記事編集画面を表示
        return view('edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        // フォームに入力された内容を変数に取得
        $form = $request->all();

        // フォームに入力された内容をデータベースへ登録
        $article->fill($form)->save();

        // 記事閲覧画面を表示
        return redirect(route('article.show', ['article' => $article->id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        // データベースから削除
        $article->delete();

        // 記事一覧画面を表示
        return redirect(route('article.index'));
    }
}
