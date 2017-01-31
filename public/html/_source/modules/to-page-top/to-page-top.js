// Slide to page top

var toPageTop = (function () {
    return {
        init: function() {
            $('body').append('<div class="to-page-top"></div>');
            var winh;
            function getWindowHeight() {
                winh = $(window).height();
            }
            getWindowHeight();
            $(window).resize(function() {
                getWindowHeight();
            });
            $('.to-page-top').click(function(e){
                e.preventDefault();
                $('html, body').animate({scrollTop: 0}, 'slow');
            });
            $(window).scroll(function(){
                var boff = $(document).scrollTop();
                if ( boff > winh ) {
                    $('.to-page-top').addClass('to-page-top_visible');
                } else {
                    $('.to-page-top').removeClass('to-page-top_visible');
                };
            })
        }
    }
})();
