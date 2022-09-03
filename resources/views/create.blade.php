@extends('layouts.app')

@section('title')
    <title>新規投稿 | {{config('app.name')}}</title>
@endsection

@section('header')
    <h1>新規投稿</h1>
@endsection

@section('content')
    <form action="{{route('article.store')}}" method="post">
        @csrf
        <ul>
            <li>
                <label for="title">記事タイトル</label>
                <input type="text" name="title" id="title" placeholder="記事タイトル" required autofocus>
            </li>
            <li>
                <textarea name="内容" placeholder="ここに内容を入力してください。" required></textarea>
            </li>
            <li>
                <button type="submit">投稿</button>
            </li>
        </ul>
    </form>
@endsection