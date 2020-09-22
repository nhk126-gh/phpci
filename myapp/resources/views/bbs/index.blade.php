@extends('layouts.app')


@section('content')

<!-- エラーメッセージエリア -->
@if ($errors->any())
  <h2>エラーメッセージ</h2>
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
@endif

<!-- 投稿表示エリア -->
@isset($bbs)
<div class="msgbox">
  @foreach ($bbs as $d)
    <div class="thrd thr{{ $d->user_id }}">
      <h2><a href="{{ action('BbsController@single',$d->id) }}">{{ $d->user->name }}</a></h2>
      <p>{{ $d->comment }}</p>
      @if ($d->user_id === Auth::user()->id)
        <form action="/delete/{{ $d->id }}" method="POST">
        @method('delete')
        @csrf
          <!-- <button class="btn btn-danger"> delete </button> -->
        </form>
      @endif
      <!-- <hr class="my-1"> -->
    </div>
  @endforeach
</div>
    <!-- <div class="paginate">
    
    </div> -->
@endisset

<!-- フォームエリア -->
<h2>投稿してね↓</h2>


    名前:<br>
    <p><a href="{{ action('UserController@index',Auth::user()->id) }}">{{ Auth::user()->name }}</a></p>
    <br>

    コメント:<br>
    <textarea name="comment" rows="4" cols="40"></textarea>
    <br>

    <button class="btn btn-success" id="send"> 投稿 </button>




@endsection