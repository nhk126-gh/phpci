@extends('layouts.app')

@section('content')
<form method="POST" action="/products" enctype="multipart/form-data">
  {{ csrf_field() }}
  <input type="file" id="file" name="file" class="form-control">
  <button type="submit">アップロード</button>
</form>
@endsection