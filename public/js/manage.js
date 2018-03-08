(function($){
  $('.js-publish-post').on('click', function(event){
    event.preventDefault();
    
    let postId = $(this).data('id');
    
    $.post('/publish', {id: postId}).done(function() {
      location.reload();
    }).fail(function() {
      alert('Failed to publish post #' + postId);
    });
  });
})(jQuery);