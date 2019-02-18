@extends('layouts.base')

@section('content')
<table>
    <thead>
        <tr>
            <td>日本語名</td>
            <td>英語名</td>
            <td>カテゴリ名</td>
        </tr>
    </thead>
<tbody>
@foreach ($terms as $term)
        <tr>
            <td>{{$term->name_jp}}</td>
            <td>{{$term->name_en}}</td>
            <td>{{$term->department}}</td>
        </tr>
@endforeach
</tbody>
</table>
@endsection
