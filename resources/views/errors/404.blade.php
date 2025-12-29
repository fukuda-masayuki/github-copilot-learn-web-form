@extends('layouts.app')

@section('title', 'ページが見つかりません')

@section('content')
    <div class="rounded-lg border bg-white p-6">
        <h1 class="text-xl font-semibold tracking-tight">404 Not Found</h1>
        <p class="mt-2 text-sm text-gray-700">指定されたページが見つかりませんでした。</p>
        <div class="mt-6">
            <a href="{{ route('applications.index') }}" class="inline-flex items-center rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-900 focus:ring-offset-2">一覧へ戻る</a>
        </div>
    </div>
@endsection
