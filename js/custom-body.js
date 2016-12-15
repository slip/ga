jQuery(document).ready(function() {

    // Hide on scroll down
    var didScroll;
    var lastScrollTop = 0;
    var delta = 5;
    var navbarHeight = 70;

    jQuery(window).scroll(function() {
        didScroll = true;
    });

    setInterval(function() {
        if (didScroll) {
            hasScrolled();
            didScroll = false;
        }
    }, 250);

    function hasScrolled() {
        var st = jQuery(this).scrollTop();

        // Make sure they scroll more than delta
        if (Math.abs(lastScrollTop - st) <= delta) {
            return;
        }

        if (st > lastScrollTop && st > navbarHeight && jQuery('.primary-menu-ul').hasClass('closed')) {
            // Scroll Down
            jQuery('.site-header').addClass('hidden');

        } else {
            // Scroll Up
            if (st + jQuery(window).height() < jQuery(document).height()) {
                jQuery('.site-header').removeClass('hidden');
            }
        }

        lastScrollTop = st;
    }

    // Mobile menu
    jQuery('.menu-toggle').click(function() {
        jQuery(this).toggleClass('closed open');
        jQuery(this).attr('aria-expanded', function(i, attr) {
            return attr == 'true'
                ? 'false'
                : 'true';
        });
        jQuery('.primary-menu-ul').toggleClass('closed open');
        return false;
    });

    // featherlight gallery
    // jQuery('.gallery').featherlightGallery();
    // jQuery('a.gallery').featherlightGallery({openSpeed: 300});
});
