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
@foreach ($terms as $term)
<tbody>
        <tr>
            <td>{{$term->name_jp}}</td>
            <td>{{$term->name_en}}</td>
            <td>{{$term->category}}</td>
        </tr>
</tbody>
@endforeach
</table>
@endsection