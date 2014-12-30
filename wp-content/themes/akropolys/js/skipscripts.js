jQuery(document).ready(function() {
    if($('.slides_container').size() > 0){
        $(".slides_container").carouFredSel({
            width: 920,
            height : 214,
            scroll : {
                items : 1,
                pauseOnHover : true,
                fx : 'fade'
            },
            items : {
                width : 920,
                height : 214,
                visible: 1
            },
            auto : {
                pauseDuration : 6500
            }
        });
    }
    $('.product_imagery').on({
        mouseenter: function(){
            $(this).find('.dimentions').fadeIn(450);
        },
        mouseleave: function(){
            $(this).find('.dimentions').fadeOut('fast');
        }
    });
});