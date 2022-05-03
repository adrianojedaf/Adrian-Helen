$(document).ready(function() {
  const stageScrollDownButton = $('.stage-button');
  const header = $('nav');
  const ueberUnsLink = $('a.ueber-uns');
  const produkteLink = $('a.produkte');

  [stageScrollDownButton, ueberUnsLink].forEach(element => {

    element.on('click', function(e) {
      e.preventDefault();
  
      $('html,body').animate({
        scrollTop: $(window).height() - header.height()
      }, 'slow');
    });
  })

  produkteLink.on('click', function(e) {
    e.preventDefault();
    
    $('html,body').animate({
      scrollTop: $(window).height() - header.height() + 800
    }, 'slow');
  });
                                              
});
