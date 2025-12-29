@extends('layouts.app')

@section('title', '申込詳細')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-semibold tracking-tight">申込詳細</h1>
        <p class="mt-1 text-sm text-gray-600">申込内容の詳細を表示します。</p>
    </div>

    <div class="rounded-lg border bg-white p-6">
        <dl class="grid grid-cols-1 gap-4 sm:grid-cols-2">
            <div>
                <dt class="text-xs font-semibold text-gray-600">ID</dt>
                <dd class="mt-1 text-sm text-gray-900">{{ $application->id }}</dd>
            </div>

            <div>
                <dt class="text-xs font-semibold text-gray-600">氏名</dt>
                <dd class="mt-1 text-sm text-gray-900">{{ $application->name }}</dd>
            </div>

            <div>
                <dt class="text-xs font-semibold text-gray-600">メール</dt>
                <dd class="mt-1 text-sm text-gray-900">{{ $application->email }}</dd>
            </div>

            <div>
                <dt class="text-xs font-semibold text-gray-600">作成日時</dt>
                <dd class="mt-1 text-sm text-gray-900">{{ $application->created_at }}</dd>
            </div>

            <div class="sm:col-span-2">
                <dt class="text-xs font-semibold text-gray-600">メッセージ</dt>
                <dd class="mt-1 whitespace-pre-wrap text-sm text-gray-900">{{ $application->message }}</dd>
            </div>

            <div>
                <dt class="text-xs font-semibold text-gray-600">更新日時</dt>
                <dd class="mt-1 text-sm text-gray-900">{{ $application->updated_at }}</dd>
            </div>
        </dl>

        <div class="mt-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <a href="{{ route('applications.index') }}" class="text-sm font-medium text-gray-700 hover:text-gray-900">一覧へ戻る</a>

            <div class="flex items-center gap-2">
                <a href="{{ route('applications.edit', $application) }}" class="inline-flex items-center rounded-md border border-gray-300 bg-white px-3 py-2 text-sm font-medium text-gray-900 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-900 focus:ring-offset-2">編集</a>

                <form method="post" action="{{ route('applications.destroy', $application) }}" onsubmit="return confirm('削除しますか？');">
                    @csrf
                    @method('delete')
                    <button type="submit" class="inline-flex items-center rounded-md bg-red-600 px-3 py-2 text-sm font-medium text-white hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-red-600 focus:ring-offset-2">削除</button>
                </form>
            </div>
        </div>
    </div>
@endsection
