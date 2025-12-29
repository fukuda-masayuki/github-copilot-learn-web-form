@extends('layouts.app')

@section('title', '申込作成')

@section('content')
    <h1>申込作成</h1>

    @include('partials.form-errors')

    <form method="post" action="{{ route('applications.store') }}">
        @csrf

        <div>
            <label for="name">氏名（必須）</label><br>
            <input id="name" name="name" type="text" value="{{ old('name') }}" maxlength="100" required>
            @error('name')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="email">メール（必須）</label><br>
            <input id="email" name="email" type="email" value="{{ old('email') }}" maxlength="254" required>
            @error('email')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="message">メッセージ（任意）</label><br>
            <textarea id="message" name="message" maxlength="2000" rows="6">{{ old('message') }}</textarea>
            @error('message')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <button type="submit">作成</button>
    </form>
@endsection
