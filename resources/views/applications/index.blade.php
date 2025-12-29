@extends('layouts.app')

@section('title', '申込一覧')

@section('content')
    <h1>申込一覧</h1>

    @if ($applications->isEmpty())
        <p>申込はまだありません。</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>氏名</th>
                    <th>メール</th>
                    <th>作成日時</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($applications as $application)
                    <tr>
                        <td>{{ $application->id }}</td>
                        <td>{{ $application->name }}</td>
                        <td>{{ $application->email }}</td>
                        <td>{{ $application->created_at }}</td>
                        <td><a href="{{ route('applications.show', $application) }}">詳細</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
