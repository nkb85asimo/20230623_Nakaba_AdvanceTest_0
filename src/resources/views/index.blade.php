@extends('layouts.app')

@section('title')
<title>TOPページ</title>
@endsection

@section('css')
<link rel="stylesheet" href="/css/index.css" />
@endsection

@section('content')
    <h1 class="top-ttl">TOPページ</h1>
    <form class="top-form" action="/contact">
        <div class="top-button">
            <button type="submit" class="form-button">お問い合わせフォームへ</button>
        </div>
    </form>
    <form class="top-form" action="/manage">
        <div class="top-button">
            <button type="submit" class="form-button">管理フォームへ</button>
        </div>
    </form>


@endsection