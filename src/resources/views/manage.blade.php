@extends('layouts.app')

@section('title')
<title>管理システム</title>
@endsection

@section('css')
<link rel="stylesheet" href="/css/manage.css" />
@endsection

@section('content')
<div class="manage">
    <div class="manage-header">
        <h1 class="manage-ttl">管理システム</h1>
    </div>
    <div class="manage-search">
        <form class="manage-form" action="/manage/search" method="get">
        @csrf
            <table class="manage-table">
                <tbody>
                    <tr>
                        <th class="manage-item-name">お名前</th>
                        <td class="manage-body-name">
                            <!-- <input type="text" name="manage-name" class="form-text"> -->
                            <input type="text" name="key-name" class="form-text" value="{{ old('key-name') }}">
                        </td>
                        <th class="manage-item-gender">性別</th>
                        <td class="manage-body-gender">
                            <label class="manage-gender">
                                <input type="radio" class="manage-gender-radio" name="key-gender"
                                    style="transform:scale(1.5)" value="" checked>
                                <span class="manage-gender-txt">全て</span>
                            </label>
                            <label class="manage-gender">
                                <input type="radio" class="manage-gender-radio" name="key-gender"
                                    style="transform:scale(1.5)" value=1>
                                <span class="manage-gender-txt">男性</span>
                            </label>
                            <label class="manage-gender">
                                <input type="radio" class="manage-gender-radio" name="key-gender"
                                    style="transform:scale(1.5)" value=2>
                                <span class="manage-gender-txt">女性</span>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <th class="manage-item">登録日</th>
                        <td class="manage-body manage-body-date">
                            <input type="date" name="key-start-date" class="form-text form-text-date">
                            <div class="form-text-repletion"><span>～</span></div>
                            <input type="date" name="key-end-date" class="form-text form-text-date">
                        </td>
                    </tr>
                    <tr>
                        <th class="manage-item">メールアドレス</th>
                        <td class="manage-body">
                            <input type="text" name="key-email" class="form-text" value="{{ old('key-email') }}">
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="manage-button">
                <button type="submit" class="form-button">検索</button>
            </div>
            <div class="manage-button__reset">
                <a type="text" class="form-button__reset" href="/manage" name=back>リセット</a>
            </div>
        </form>
    </div>
    <div class="manage-table">
        <table>
            <tr class="contact-table__row">
                <th class="contact-table__ttl">
                <div class="container__table-ttl">
                    <div class="contact-table__ttl-text table__id"><span>ID</span></div>
                    <div class="contact-table__ttl-text table__fullname"><span>お名前</span></div>
                    <div class="contact-table__ttl-text table__gender"><span>性別</span></div>
                    <div class="contact-table__ttl-text table__email"><span>メールアドレス</span></div>
                    <div class="contact-table__ttl-text table__opinion"><span>ご意見</span></div>
                    <div class="contact-table__ttl-text"></div>
                </div>
                </th>
            </tr>
            <div class="page-count">
                @if (count($contacts) >0)
                    <P class="page-count__text">全{{ $contacts->total() }}件中 
                    {{  ($contacts->currentPage() -1) * $contacts->perPage() + 1}} ~ 
                    {{ (($contacts->currentPage() -1) * $contacts->perPage() + 1) + (count($contacts) -1)  }}件
                    </p>
                @else
                    <p>データがありません。</p>
                @endif 
                {{ $contacts->links('vendor.pagination.bootstrap-4') }}
            </div>
            @foreach($contacts as $contact)
            <tr class="contact-table__row">
                <td class="contact-table__item">
                    <form class="contact-form" action="/manage" method="post">
                    @csrf
                        <input type="id" name="id" value="{{ $contact['id'] }}" class="form-table__text table__id">
                        <input type="text" name="fullname" value="{{ $contact['fullname'] }}" class="form-table__text table__fullname">
                        <!-- <input type="text" name="gender" value="{{ $contact['gender'] }}" class="form-table__text"> -->
                        <input type="text" name="gender" value=
                            <?php
                                 switch($contact['gender']){
                                    case 1;
                                        echo '男性';
                                    break;
                                    case 2;
                                        echo '女性';
                                    break;
                                 }
                            ?>
                            class="form-table__text table__gender">
                        <input type="email" name="email" value="{{ $contact['email'] }}" class="form-table__text table__email">
                        <textarea name="" rows="4" cols="27" value="" class="form-table__text table__opinion">{{ $contact['opinion'] }}</textarea>
                    </form>      

                    <form class="" action="/manage/delete" method="post">
                    @method('DELETE')
                    @csrf
                         <div class="delete-form__item">
                            <input type="hidden" name="id" value="{{ $contact['id'] }}">
                            <button class="delete-form__button" type="submit">削除
                        </div>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection
