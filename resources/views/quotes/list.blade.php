@extends('layouts.app')

@section('content')
    <div class="container">
        @each('quotes.item', $quotes, 'quote', 'quotes.empty')
    </div>
@endsection