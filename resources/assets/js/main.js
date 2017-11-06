(function ($) {
    $(function () {
        $('a.nav-link[href^="#"]').on('click', function(event) {

            var target = $( $(this).attr('href') ),
                $menu = $(this).closest('#headerMenu');
                menu_heigth = $menu.innerHeight();
            if( target.length ) {
                event.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top - menu_heigth
                }, 800);
            }

        });
        $('body').scrollspy({ target: '#headerMenu' })
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox();
        });
    })
})(window.jQuery);