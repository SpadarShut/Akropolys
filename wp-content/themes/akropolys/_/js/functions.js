// remap jQuery to $
(function($){})(window.jQuery);

/* trigger when page is ready */
$(document).ready(function (){
    if($('.slides_container').size() > 0){
        $(".slides_container").carouFredSel({
            width: 920,
            height : 214,
            scroll : {
                items : 1,
                pauseOnHover : true,
                fx : 'crossfade'
            },
            items : {
                width : 920,
                height : 214,
                visible: 1
            },
            auto : {
                pauseDuration : 6500
            },
            pagination : {
                container		: ".pagination",
                anchorBuilder	: function(nr, item) {
                    return '<li>'+nr+'</li>';
                }
            }
        });
    }
	$('.full_dimentions').each(function(){
		var $this = $(this);
		$this.css('height', $this.siblings('span').find('img').css('height'));
	});
    $('.double_product:nth-child(2n+1)').before('<hr>');
});