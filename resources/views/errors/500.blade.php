@extends('layouts.app')

@section('title', 'エラーが発生しました')

@section('content')
    <h1>500 Internal Server Error</h1>
    <p>サーバー側で問題が発生しました。時間をおいて再度お試しください。</p>
    <p><a href="{{ route('applications.index') }}">一覧へ戻る</a></p>
@endsection
