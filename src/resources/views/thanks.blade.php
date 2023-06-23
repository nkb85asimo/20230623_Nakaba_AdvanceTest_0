@extends('layouts.app')

@section('title')
<title>完了画面</title>
@endsection

@section('css')
<link rel="stylesheet" href="/css/thanks.css" />
@endsection

@section('content')
<div class="thanks">
    <form class="thanks-form" action="/">
        <div class="thanks-comment">
            <p class="thanks-comment-text">ご意見いただきありがとうございました。</p>
        </div>
        <div class="thanks-button">
            <button type="submit" class="form-button">トップページへ</button>
        </div>
    </form>
</div>
@endsection
