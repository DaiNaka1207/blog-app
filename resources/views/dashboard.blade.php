@extends('layouts.app')

@section('title')
    <title>記事一覧 | {{config('app.name')}}</title>
@endsection

@section('header')
    <h1>{{str_replace('-', ' ', config('app.name'))}}</h1>
@endsection

@section('content')
    <h2>記事一覧</h2>

    @foreach ($articles as $article)
        <article class="article">
            <a href="#">
                <h3>{{$article->title}}</h3>
                <p>{{$article->content}}</p>
            </a>
        </article>
    @endforeach
@endsection