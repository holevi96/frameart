jQuery(document).ready(function () {

    /*jQuery('.main-carousel').flickity({
        // options
        wrapAround: true,
        prevNextButtons: false
    });*/


    jQuery('.home .szolgaltatas').hover(function () {

        var gifurl = jQuery(this).attr("gif-url");
        if(gifurl !== ""){
            jQuery(this).find('img').attr("src",gifurl);
        }
    },function () {
        var imgurl = jQuery(this).attr("img-url");
        jQuery(this).find('img').attr("src",imgurl)
    });
var nav = jQuery("nav");
   jQuery(".menu-opener").click(function () {
       if(nav.hasClass("closed")){
           nav.addClass("opened").removeClass("closed");
           jQuery("body").addClass("mobilemenu")
       }else{
           nav.addClass("closed").removeClass("opened");
           jQuery("body").removeClass("mobilemenu")
       }
   });

    jQuery(".modal .close").click(function () {
        jQuery(".modal-wrapper").removeClass("show")
    })

});
jQuery(window).scroll(function () {
    if(jQuery(window).width()>800){
        var top = jQuery(window).scrollTop();
        if(top>200){

            if(!jQuery("#header").hasClass("fixed")){
                jQuery("#header").addClass("fixed");
                jQuery("body").addClass("fixed");
                setTimeout(function () {
                    jQuery("#header").addClass("opened")
                },10)
            }
        }else{
            jQuery("#header").removeClass("fixed").removeClass("opened")
            jQuery("body").removeClass("fixed");
        }
    }
});
