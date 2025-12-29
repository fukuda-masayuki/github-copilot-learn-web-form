@extends('layouts.app')

@section('title', '申込一覧')

@section('content')
    <div class="mb-6 flex items-start justify-between gap-4">
        <div>
            <h1 class="text-2xl font-semibold tracking-tight">申込一覧</h1>
            <p class="mt-1 text-sm text-gray-600">登録された申込を一覧表示します。</p>
        </div>
        <a href="{{ route('applications.create') }}" class="inline-flex items-center rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-900 focus:ring-offset-2">新規作成</a>
    </div>

    @if ($applications->isEmpty())
        <div class="rounded-lg border bg-white p-6">
            <p class="text-sm text-gray-700">申込はまだありません。</p>
            <div class="mt-4">
                <a href="{{ route('applications.create') }}" class="inline-flex items-center rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-900 focus:ring-offset-2">最初の申込を作成</a>
            </div>
        </div>
    @else
        <div class="overflow-x-auto rounded-lg border bg-white">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-4 py-3 text-left text-xs font-semibold text-gray-700">ID</th>
                        <th scope="col" class="px-4 py-3 text-left text-xs font-semibold text-gray-700">氏名</th>
                        <th scope="col" class="px-4 py-3 text-left text-xs font-semibold text-gray-700">メール</th>
                        <th scope="col" class="px-4 py-3 text-left text-xs font-semibold text-gray-700">作成日時</th>
                        <th scope="col" class="px-4 py-3 text-right text-xs font-semibold text-gray-700">操作</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach ($applications as $application)
                        <tr class="hover:bg-gray-50">
                            <td class="whitespace-nowrap px-4 py-3 text-sm text-gray-700">{{ $application->id }}</td>
                            <td class="px-4 py-3 text-sm font-medium text-gray-900">{{ $application->name }}</td>
                            <td class="px-4 py-3 text-sm text-gray-700">{{ $application->email }}</td>
                            <td class="whitespace-nowrap px-4 py-3 text-sm text-gray-700">{{ $application->created_at }}</td>
                            <td class="whitespace-nowrap px-4 py-3 text-right">
                                <div class="inline-flex items-center gap-2">
                                    <a href="{{ route('applications.show', $application) }}" class="text-sm font-medium text-gray-900 hover:underline">詳細</a>
                                    <a href="{{ route('applications.edit', $application) }}" class="text-sm font-medium text-gray-900 hover:underline">編集</a>
                                    <form method="post" action="{{ route('applications.destroy', $application) }}" onsubmit="return confirm('削除しますか？');">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="text-sm font-medium text-red-700 hover:underline">削除</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection
