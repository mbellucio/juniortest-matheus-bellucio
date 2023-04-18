$(function() {
  $.ajaxSetup({
    beforeSend: function(xhr) {
      xhr.setRequestHeader("Accept-Encoding", "gzip");
    }
  });
});

