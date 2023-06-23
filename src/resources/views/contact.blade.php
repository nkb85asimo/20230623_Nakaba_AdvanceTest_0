@extends('layouts.app')

@section('title')
<title>お問い合わせ</title>
@endsection

@section('css')
<link rel="stylesheet" href="/css/contact.css" />
@endsection

@section('content')
<div class="contact">
    <h1 class="contact-ttl">お問い合わせ</h1>
    <script src="https://yubinbango.github.io/yubinbango/yubinbango.js" charset="UTF-8"></script>
    <form class="contact-form h-adr" action="/contacts/confirm" method="post">
    @csrf
        <table class="contact-table">
            <tbody>
                <tr>
                    <th class="contact-item">お名前<span class="contact-require">&nbsp;※</span></th>
                    <td class="contact-body">
                        <input type="text" name="family-name" class="form-text" value="{{ old('family-name') }}" v-model="form.family-name" @change="form.validate('family-name')">
                        <input type="text" name="given-name" class="form-text" value="{{ old('given-name') }}" >
                    </td>
                </tr>
                <tr>
                    <th class="contact-item"></th>
                    <td class="contact-body-comment-name">
                        <p>例）山田</p>
                    </td>
                    <td class="contact-body-comment-name">
                        <p>例）太郎</p>
                    </td>
                </tr>
                
                @if ($errors->has('family-name'))
                <tr class="contact-tr-error">
                    <th class="contact-item"></th>
                    <td class="contact-body-comment-error">
                        @foreach ($errors->get('family-name') as $message)
                            <p class="contact-body-comment-error">{{ $message }}</p>
                        @endforeach
                    </td>
                </tr>
                @endif
                @if ($errors->has('given-name'))
                <tr class="contact-tr-error">
                    <th class="contact-item"></th>
                    <td class="contact-body-comment-error">
                        @foreach ($errors->get('given-name') as $message)
                            <p class="contact-body-comment-error">{{ $message }}</p>
                        @endforeach
                    </td>
                </tr>
                @endif
                <tr>
                    <th class="contact-item">性別<span class="contact-require">&nbsp;※</span></th>
                    <td class="contact-body">
                        <div class="contact-gender">
                            <input type="radio" class="contact-gender-radio" name="gender" style="transform:scale(1.1)" id=1 value=1 {{ old ('gender') == '男性' ? 'checked' : '' }} checked>
                            <span class="contact-gender-txt">男性</span>
                        </div>
                        <div class="contact-gender">
                            <input type="radio" class="contact-gender-radio" name="gender" style="transform:scale(1.1)" id=2 value=2 {{ old ('gender') == '女性' ? 'checked' : '' }} >
                            <span class="contact-gender-txt">女性</span> 
                        </div>
                    </td>
                </tr>
                <tr>
                    <th class="contact-item"></th>
                    <td class="contact-body-comment"></td>
                </tr>
                <tr>
                    <th class="contact-item">メールアドレス<span class="contact-require">&nbsp;※</span></th>
                    <td class="contact-body">
                        <input type="email" name="email" class="form-text" value="{{ old('email') }}" >
                    </td>
                </tr>
                <tr>
                    <th class="contact-item"></th>
                    <td class="contact-body-comment">
                        <p>例）test@example.com</p>
                    </td>
                </tr>
                @if ($errors->has('email'))
                <tr class="contact-tr-error">
                    <th class="contact-item"></th>
                    <td class="contact-body-comment-error">
                        @foreach ($errors->get('email') as $message)
                            <p class="contact-body-comment-error">{{ $message }}</p>
                        @endforeach
                    </td>
                </tr>
                @endif
                <tr>
                    <th class="contact-item">郵便番号<span class="contact-require">&nbsp;※</span></th>
                    <td class="contact-body">
                        <span class="p-country-name" style="display:none;">Japan</span>
                        <span class="contact-postal-txt">〒</span>
                        <input type="text" name="postcode" class="form-text p-postal-code" autocomplete="postcode" value="<?php echo mb_convert_kana(old('postcode') ,'a'); ?>"  >                        
                    </td>
                </tr>
                <tr>
                    <th class="contact-item"></th>
                    <td class="contact-body-comment">
                        <p>例）123-4567</p>
                    </td>
                </tr>
                @if ($errors->has('postcode'))
                <tr class="contact-tr-error">
                    <th class="contact-item"></th>
                    <td class="contact-body-comment-error">
                        @foreach ($errors->get('postcode') as $message)
                            <p class="contact-body-comment-error">{{ $message }}</p>
                        @endforeach
                    </td>
                </tr>
                @endif
                <tr>
                    <th class="contact-item">住所<span class="contact-require">&nbsp;※</span></th>
                    <td class="contact-body">
                        <input type="text" name="address" class="form-text p-region p-locality p-street-address p-extended-address" value="{{ old('address') }}" >
                    </td>
                </tr>
                <tr>
                    <th class="contact-item"></th>
                    <td class="contact-body-comment">
                        <p>例）東京都渋谷区千駄ヶ谷1-2-3</p>
                    </td>
                </tr>
                @if ($errors->has('address'))
                <tr class="contact-tr-error">
                    <th class="contact-item"></th>
                    <td class="contact-body-comment-error">
                        @foreach ($errors->get('address') as $message)
                            <p class="contact-body-comment-error">{{ $message }}</p>
                        @endforeach
                    </td>
                </tr>
                @endif
                <tr>
                    <th class="contact-item">建物名</th>
                    <td class="contact-body">
                        <input type="text" name="building_name" class="form-text" value="{{ old('building_name') }}" >
                    </td>
                </tr>
                <tr>
                    <th class="contact-item"></th>
                    <td class="contact-body-comment">
                        <p>例）千駄ヶ谷マンション101</p>
                    </td>
                </tr>
                @if ($errors->has('building_name'))
                <tr class="contact-tr-error">
                    <th class="contact-item"></th>
                    <td class="contact-body-comment-error">
                        @foreach ($errors->get('building_name') as $message)
                            <p class="contact-body-comment-error">{{ $message }}</p>
                        @endforeach
                    </td>
                </tr>
                @endif
                <tr>
                    <th class="contact-item">ご意見<span class="contact-require">&nbsp;※</span></th>
                    <td class="contact-body">
                        <textarea name="opinion" class="form-textarea" id="" cols="30" rows="10" placeholder="{{ old('opinion') }}" ></textarea>
                    </td>
                </tr>
                @if ($errors->has('opinion'))
                <tr class="contact-tr-error">
                    <th class="contact-item"></th>
                    <td class="contact-body-comment-error">
                        @foreach ($errors->get('opinion') as $message)
                            <p class="contact-body-comment-error">{{ $message }}</p>
                        @endforeach
                    </td>
                </tr>
                @endif
            </tbody>
        </table>
        <div class="contact-button">
            <button type="submit" class="form-button">確認</button>
        </div>

    </form>
</div>
@endsection
