function changeSidebarStyle(){
var loc = window.location.href;

  $('#sidebar').find('a').each(function() {
    if($(this).attr('href') == loc)
      $(this).addClass('cat-selected');
  });

}


function showImage(){
    $('.img-prodotto').on('click', function () {
      $(this).closest('.prodotto').find('.modal').css('display', 'block');
      $(this).closest('.prodotto').find('.modal-content').attr('src', $(this).attr('src'));
      $(this).closest('.prodotto').find('.close').on('click', function() {
        $(this).closest('.modal').css('display', 'none');
      });
    });
}
