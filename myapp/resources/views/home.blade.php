@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if ($errors->any())
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form action="{{ url('upload') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @isset ($photos)
                    @foreach($photos as $photo)
                        <div class="py-2">
                            <a href="{{$photo->path}}">{{$photo->name}}</a>
                        </div>
                    @endforeach
                @endisset

                <label for="photo">画像ファイル:</label>
                <input type="file" class="form-control" name="file" id="photo">
                <br>
                <hr>
                <button class="btn btn-success"> Upload </button>
            </form>
        </div>
    </div>
</div>
@endsection
