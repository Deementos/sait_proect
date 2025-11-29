    const themeToggle = document.getElementById('theme-toggle');
    const body = document.body;

    themeToggle.addEventListener('change', () => {
      body.classList.toggle('dark-theme');
      if (body.classList.contains('dark-theme')) {
        localStorage.setItem('theme', 'dark');
      } else {
        localStorage.setItem('theme', 'light');
      }
    });

$('body').append('<div class="upbtn">▲</div>');            
$(window).scroll(function() {
    if ($(this).scrollTop() > 100) {
        $('.upbtn').css({
            bottom: '9px'
        });
        } else {
        $('.upbtn').css({
            bottom: '-80px'
        });
    }
});
$('.upbtn').on('click',function() {
    $('html, body').animate({
        scrollTop: 0
    }, 500);
    return false;
});