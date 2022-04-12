$(document).ready(function() {
  const scrollDownButton = $('.stage-button');
  const header = $('nav');

  scrollDownButton.on('click', function(e) {
    e.preventDefault();

    $('html,body').animate({
      scrollTop: $(window).height() - header.height()
    }, 'slow');
  });
});
