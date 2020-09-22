@extends('layouts.app')


@section('content')

<h1>ユーザー情報</h1>

<!-- エラーメッセージエリア -->
@if ($errors->any())
  <h2>エラーメッセージ</h2>
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
@endif

@isset($bbs)

<h2>name: {{ $bbs->first()->user->name }}</h2>

@foreach ($bbs as $d)

<p>comment: {{ $d->comment }}</p>

@endforeach

@endisset
@endsection