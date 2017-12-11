//Offcanvas menu
$('#nav-icon').attr('data-ativo', '0');
$('#nav-icon').click(function(event) {
  $(this).toggleClass('open');
      var access = $(this).attr('data-ativo');
      if (access == 0) {
        $(this).addClass('active');
        $('#nav-icon').attr('data-ativo', '1');
        $('.offcanvas-transform').addClass('access-left');
      };

      if (access == 1) {
          $(this).removeClass('active');
          $('#nav-icon').attr('data-ativo', '0');
          $('.offcanvas-transform').removeClass('access-left')
      };
});


// Scrolltop .go-down
$('.go-down').click(function(){
  $('html, body').animate({scrollTop: '700px'}, 800);
});


//Voltar ao topo
$('.button .top').click(function(){
  $('html, body').animate({scrollTop: '0px'}, 800);
});

