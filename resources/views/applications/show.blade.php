@extends('layouts.app')

@section('title', '申込詳細')

@section('content')
    <h1>申込詳細</h1>

    <dl>
        <dt>ID</dt>
        <dd>{{ $application->id }}</dd>

        <dt>氏名</dt>
        <dd>{{ $application->name }}</dd>

        <dt>メール</dt>
        <dd>{{ $application->email }}</dd>

        <dt>メッセージ</dt>
        <dd>{{ $application->message }}</dd>

        <dt>作成日時</dt>
        <dd>{{ $application->created_at }}</dd>

        <dt>更新日時</dt>
        <dd>{{ $application->updated_at }}</dd>
    </dl>

    <p>
        <a href="{{ route('applications.edit', $application) }}">編集</a>
    </p>

    <form method="post" action="{{ route('applications.destroy', $application) }}" onsubmit="return confirm('削除しますか？');">
        @csrf
        @method('delete')
        <button type="submit">削除</button>
    </form>
@endsection
