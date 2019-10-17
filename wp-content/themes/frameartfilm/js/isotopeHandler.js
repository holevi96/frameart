var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
        }
    }
};

jQuery(document).ready(function () {
    jQuery(".modal-link").click(function () {
        /*jQuery('.modal-wrapper').addClass('show');
        jQuery('.modal').addClass('show');
        var loader = '<img class="loading" src="' + fromPHP.pluginUrl + '/images/loading.gif" />';
        var modalContent = jQuery('#modal-content');
        modalContent.html(loader);*/
    });
    var $grid = jQuery('.szolgaltatasok').isotope({
        // options
        itemSelector: '.szolgaltatas',
        layoutMode: 'fitRows',
    });
    var $grid2 = jQuery('.referenciak').isotope({
        // options
        itemSelector: '.referencia',
        layoutMode: 'masonry',

    });

    // filter items on button click
    jQuery('.category-filter').on( 'click', 'li', function() {
        jQuery('.category-filter li').removeClass("active");
        jQuery(this).addClass("active");
        var title = jQuery(this).html();
        jQuery(".szolgaltatasok .entry-title").html(title);
        var filterValue = '.'+jQuery(this).attr('data-slug');
        console.log(filterValue)
        $grid.isotope({ filter: filterValue });

        var tab = jQuery(this).attr('data-slug');
        window.history.replaceState(null, null, "?tab=" + tab);
    });
    if(getUrlParameter('tab')){
        jQuery(".category-filter li[data-slug=" + getUrlParameter('tab') + "]").click();
    }else{
        jQuery(".category-filter li").eq(0).click();
    }





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
    jQuery('.referenciak').isotope()
    jQuery('.szolgaltatasok').isotope()
});





