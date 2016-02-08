@extends('layouts.app')

@section('content')
    <div class="container">
        @include('quotes.item', $quote)
    </div>
@endsection