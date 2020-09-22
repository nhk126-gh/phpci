@extends('layouts.app')

@section('title',$entry->title . ' - Blog')

@include('layouts.header')

@section('content')
  <ul>
  @foreach($entries as $entry1)
  <li><a href="{{ action('EntriesController@view', $entry1->id) }}">{{ $entry1->title }}</a></li>
  @endforeach
  </ul>
<p>{{$entry->content}}</p>
@endsection
