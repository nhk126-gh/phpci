$(function () {

  $('#like').on('click', function() {

    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var id = $('#id').val();

    var j = { _token:CSRF_TOKEN , id:id };

    $.post(`/like/${id}` , j );

  });


  $('#send').on('click', function() {

    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var comment = $('textarea[name="comment"]').val();

    var j = { _token:CSRF_TOKEN , comment:comment};

    $.post('/bbs' , j );
    $('textarea[name="comment"]').val("");
  });




window.Echo.channel('my-channel')
           .listen('MessageCreated',function(data){
            var s = "";
            data.message.forEach( ( item ) => {
              s += `<p class="u${item.id}"><a href="/user/${item.id}">${item.name}</a></p>`;
            });
            $('.box').html(s);
          })
          .listen('MakeBbs',function(data){
            $('.msgbox').append(
              `<div class="thrd thr${data.message.bbs.user_id}">
              <h2><a href="/single/${data.message.bbs.id}">${data.message.user}</a></h2>
              <p>${data.message.bbs.comment}</p>
              </div>`
            );
          });


});

