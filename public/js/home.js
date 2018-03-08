(function($){
  $('.js-view-post').on('click', function(event) {
    event.preventDefault();

    let postId = $(this).data('id');
    let postDialogContent = $('#post-dialog-content');

    postDialogContent.html('');
    $.get('/view/' + postId).done(function(response) {
      if (response.success) {
        let escapedContent = $("<div/>").text(response.data.content).html();

        postDialogContent.html(escapedContent);
        $('#post-dialog').dialog({
          title: response.data.title,
          modal: true,
          draggable: false,
          minWidth: 500,
          minHeight: 200
        });
      }

    }).fail(function() {
      alert('Failed to retrieve post #' + postId);
    });
  });
})(jQuery);