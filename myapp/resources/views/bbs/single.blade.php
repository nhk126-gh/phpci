@extends('layouts.app')

@section('content')

<h1><a href="/bbs">掲示板</a></h1>

<!-- エラーメッセージエリア -->
@if ($errors->any())
  <h2>エラーメッセージ</h2>
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
@endif

<!-- 投稿表示エリア（編集するのはここ！） -->
@isset($bbs)

    <h2>{{ $bbs->user->name }}さんの投稿</h2>
    <p>{{ $bbs->comment }}</p>
    <p id="user"></p>

    <!-- <form action="/like/{{ $bbs->id }}" method="POST"> -->
      <input type="hidden" id="id" name="id" value="{{ $bbs->id }}">
      <button class="btn btn-success" id="like"> like </button>
    <!-- </form> -->
    <div class="box">
    @isset($bbs->users)
        @foreach ($bbs->users as $user)
        <p class="u{{ $user->id }}"><a href="{{ action('UserController@index',$user->id) }}">{{ $user->name }}</a></p>
        @endforeach
    @endisset
    </div>
@endisset


@endsection