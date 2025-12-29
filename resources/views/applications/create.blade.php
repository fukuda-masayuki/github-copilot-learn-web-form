@extends('layouts.app')

@section('title', '申込作成')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-semibold tracking-tight">申込作成</h1>
        <p class="mt-1 text-sm text-gray-600">必要事項を入力して申込を作成します。</p>
    </div>

    @include('partials.form-errors')

    <form method="post" action="{{ route('applications.store') }}" class="mt-6 space-y-5 rounded-lg border bg-white p-6">
        @csrf

        <div>
            <label for="name" class="block text-sm font-medium text-gray-900">氏名（必須）</label>
            <input
                id="name"
                name="name"
                type="text"
                value="{{ old('name') }}"
                maxlength="100"
                required
                class="mt-2 block w-full rounded-md border px-3 py-2 text-sm shadow-sm focus:outline-none focus:ring-2 focus:ring-gray-900 {{ $errors->has('name') ? 'border-red-300 focus:ring-red-500' : 'border-gray-300' }}"
            >
            @error('name')
                <p class="mt-2 text-sm text-red-700">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-gray-900">メール（必須）</label>
            <input
                id="email"
                name="email"
                type="email"
                value="{{ old('email') }}"
                maxlength="254"
                required
                class="mt-2 block w-full rounded-md border px-3 py-2 text-sm shadow-sm focus:outline-none focus:ring-2 focus:ring-gray-900 {{ $errors->has('email') ? 'border-red-300 focus:ring-red-500' : 'border-gray-300' }}"
            >
            @error('email')
                <p class="mt-2 text-sm text-red-700">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="message" class="block text-sm font-medium text-gray-900">メッセージ（任意）</label>
            <textarea
                id="message"
                name="message"
                maxlength="2000"
                rows="6"
                class="mt-2 block w-full rounded-md border px-3 py-2 text-sm shadow-sm focus:outline-none focus:ring-2 focus:ring-gray-900 {{ $errors->has('message') ? 'border-red-300 focus:ring-red-500' : 'border-gray-300' }}"
            >{{ old('message') }}</textarea>
            @error('message')
                <p class="mt-2 text-sm text-red-700">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center justify-between gap-3">
            <a href="{{ route('applications.index') }}" class="text-sm font-medium text-gray-700 hover:text-gray-900">一覧へ戻る</a>
            <button type="submit" class="inline-flex items-center rounded-md bg-gray-900 px-4 py-2 text-sm font-medium text-white hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-900 focus:ring-offset-2">作成</button>
        </div>
    </form>
@endsection
