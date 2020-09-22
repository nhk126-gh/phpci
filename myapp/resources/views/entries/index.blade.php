@extends('layouts.app')

@section('title','Blog')

@include('layouts.header')

@section('content')
  <ul>
  @foreach($entries as $entry)
  <li>
    <span>{{ $entry->id }}:</span>
    <a href="{{ action('EntriesController@view', $entry->id) }}">{{ $entry->title }}</a>
    <span>:{{ $entry->etc }}</span>
  </li>
  @endforeach
  </ul>
@endsection