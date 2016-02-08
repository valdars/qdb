@extends('layouts.app')

@section('content')
    <div class="container">
        @each('news.item', $news, 'news', 'news.empty')
    </div>
@endsection