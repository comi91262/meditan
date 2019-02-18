@extends('layouts.base')

@section('content')
<table>
    <thead>
        <tr>
            <td>セクション</td>
            <td>番号</td>
            <td>質問</td>
            <td>解答</td>
            <td>正解かどうか</td>
        </tr>
    </thead>
<tbody>
@foreach ($questions as $question)
        <tr>
            <td>{{ $question->section }}</td>
            <td>{{ $question->number }}</td>
            <td>{{ $question->question }}</td>
            <td>{{ $question->answer }}</td>
            <td>{{ $question->success }}</td>
        </tr>
@endforeach
</tbody>
</table>
@endsection