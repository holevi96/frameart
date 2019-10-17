

jQuery(document).ready(function () {

    var $grid2 = jQuery('.szolg-gallery').isotope({
        // options
        itemSelector: '.picture',
        layoutMode: 'fitRows'
    });
    jQuery('.pictures').each( function() {
        var $pic     = jQuery(this),
            getItems = function() {
                var items = [];
                $pic.find('a').each(function() {
                    var $href   = jQuery(this).attr('href'),
                        $size   = jQuery(this).data('size').split('x'),
                        $width  = $size[0],
                        $height = $size[1];

                    var item = {
                        src : $href,
                        w   : $width,
                        h   : $height
                    }

                    items.push(item);
                });
                return items;
            }

        var items = getItems();
        var $pswp = jQuery('.pswp')[0];
        $pic.on('click', 'figure', function(event) {
            event.preventDefault();

            var $index = jQuery(this).index();
            var options = {
                index: $index,
                bgOpacity: 0.7,
                showHideOpacity: true
            }

            // Initialize PhotoSwipe
            var lightBox = new PhotoSwipe($pswp, PhotoSwipeUI_Default, items, options);
            lightBox.init();
        });
    });



});
jQuery(window).load( function(){
    jQuery('.szolg-gallery').isotope()
});


