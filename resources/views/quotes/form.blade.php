@extends('layouts.app')

@section('content')
<div class="container">
    @include('common.errors')
    <form action="{{ url('quotes/add') }}" method="post">
        {!! csrf_field() !!}
        <div class="form-group">
            <textarea class="form-control" name="content" id="content">{{ old('content') }}</textarea>
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
</div>
@endsection