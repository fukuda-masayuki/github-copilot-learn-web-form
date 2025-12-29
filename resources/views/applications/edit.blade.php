@extends('layouts.app')

@section('title', '申込編集')

@section('content')
    <h1>申込編集</h1>

    @include('partials.form-errors')

    <form method="post" action="{{ route('applications.update', $application) }}">
        @csrf
        @method('put')

        <div>
            <label for="name">氏名（必須）</label><br>
            <input id="name" name="name" type="text" value="{{ old('name', $application->name) }}" maxlength="100" required>
            @error('name')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="email">メール（必須）</label><br>
            <input id="email" name="email" type="email" value="{{ old('email', $application->email) }}" maxlength="254" required>
            @error('email')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="message">メッセージ（任意）</label><br>
            <textarea id="message" name="message" maxlength="2000" rows="6">{{ old('message', $application->message) }}</textarea>
            @error('message')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <button type="submit">更新</button>
    </form>
@endsection
