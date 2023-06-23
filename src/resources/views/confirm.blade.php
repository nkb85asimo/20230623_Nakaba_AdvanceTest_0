@extends('layouts.app')

@section('title')
<title>内容確認</title>
@endsection

@section('css')
<link rel="stylesheet" href="/css/confirm.css" />
@endsection

@section('content')
<div class="confirm">
    <h1 class="confirm-ttl">内容確認</h1>
    <form class="confirm-form" action="/contacts/thanks" method="post">
    @csrf
    <table class="confirm-table">
            <tbody>
                <tr>
                    <th class="confirm-item">お名前</th>
                    <td class="confirm-body">
                        <input type="text" name="fullname" class="form-text" value="{{ $contact['family-name'] }} {{ $contact['given-name'] }}" readonly/>
                    </td>
                </tr>
                <tr>
                    <th class="confirm-item"></th>
                    <td class="confirm-body-comment"></td>
                </tr>
                <tr>
                    <th class="confirm-item">性別</th>
                    <td class="confirm-body">
                        <input type="hidden" name="gender" class="form-text" value="{{ $contact['gender']}}" readonly/ >
                        <p class="form-text">
                        <?php
                            switch ( $contact['gender']){
                                case 1;
                                    echo '男性';
                                break;
                                case 2;
                                    echo '女性';
                                break;
                                }
                        ?>
                        </p>

                    </td>
                </tr>
                <tr>
                    <th class="confirm-item"></th>
                    <td class="confirm-body-comment"></td>
                </tr>
                <tr>
                    <th class="confirm-item">メールアドレス</th>
                    <td class="confirm-body">
                        <input type="email" name="email" class="form-text" value="{{ $contact['email']}}" readonly/>
                    </td>
                </tr>
                <tr>
                    <th class="confirm-item"></th>
                    <td class="confirm-body-comment"></td>
                </tr>
                <tr>
                    <th class="confirm-item">郵便番号</th>
                    <td class="confirm-body">
                        <input type="text" name="postcode" class="form-text" autocomplete="postcode"
                            value="{{ $contact['postcode']}}" readonly/>
                    </td>
                </tr>
                <tr>
                    <th class="confirm-item"></th>
                    <td class="confirm-body-comment"></td>
                </tr>
                <tr>
                    <th class="confirm-item">住所</th>
                    <td class="confirm-body">
                        <input type="text" name="address" class="form-text" value="{{ $contact['address']}}" readonly/>
                    </td>
                </tr>
                <tr>
                    <th class="confirm-item"></th>
                    <td class="confirm-body-comment"></td>
                </tr>
                <tr>
                    <th class="confirm-item">建物名</th>
                    <td class="confirm-body">
                        <input type="text" name="building_name" class="form-text" value="{{ $contact['building_name']}}" readonly/>
                    </td>
                </tr>
                <tr>
                    <th class="confirm-item"></th>
                    <td class="confirm-body-comment"></td>
                </tr>
                <tr>
                    <th class="confirm-item">ご意見</th>
                    <td class="confirm-body">
                        <input name="opinion" class="form-text" value="{{ $contact['opinion']}}" readonly/>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="confirm-button">
            <button type="submit" class="form-button">送信</button>
        </div>
        <div class="confirm-button__back">
            <button type="button" class="form-button__back" onclick="history.back(-2)">修正する</button>
        </div>
    </form>
</div>
@endsection
