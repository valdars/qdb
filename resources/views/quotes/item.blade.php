<div class="panel panel-default quote">
    <div class="panel-heading clearfix">
        <div class="pull-left">
            <a href="{{url('quotes/quote', [$quote->id])}}">#{{ $quote->id }}</a>
        </div>
        <div class="pull-right">
            <a href="#" data-rate="-1" data-id="{{$quote->id}}"><span class="glyphicon glyphicon-minus"></span></a>
            <span class="rating">{{$quote->rating}}</span>
            <a href="#" data-rate="1" data-id="{{$quote->id}}"><span class="glyphicon glyphicon-plus"></span></a>
        </div>
    </div>
    <div class="panel-body">
        {!! nl2br($quote->content) !!}
    </div>
</div>