@extends('layouts.app')

@section('title', 'ページが見つかりません')

@section('content')
    <h1>404 Not Found</h1>
    <p>指定されたページが見つかりませんでした。</p>
    <p><a href="{{ route('applications.index') }}">一覧へ戻る</a></p>
@endsection
