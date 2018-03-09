(function($){
  $('.js-view-post').on('click', function(event) {
    event.preventDefault();

    let postId = $(this).data('id');
    let postDialogContent = $('#post-dialog-content');
    let postDialogAuthor = $('#post-dialog-author');
    let postDialogCreatedAt = $('#post-dialog-created-at')
    let postDialogUpdatedAt = $('#post-dialog-updated-at')

    postDialogContent.html('');
    postDialogAuthor.html('');
    postDialogCreatedAt.html('');
    postDialogUpdatedAt.html('');

    $.get('/view/' + postId).done(function(response) {
      if (response.success) {
        let escapedContent = $.parseHTML(response.data.content);

        postDialogContent.html(escapedContent);
        postDialogAuthor.text('By: ' + response.data.author);
        postDialogCreatedAt.text('Created At: ' + response.data.created_at);
        postDialogUpdatedAt.text('Last Updated: ' + response.data.updated_at);

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