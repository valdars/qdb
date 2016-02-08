$('[data-rate]').on('click', function(evt) {
    evt.preventDefault();
    var $this = $(this);
    var id = $this.data('id');
    var rating = $this.data('rate');
    var params = {
        id: id,
        rating: rating
    };
    $.get('rate', params, function(result) {
        $this.parents('.quote').find('.rating').text(result.rating);
    });
});