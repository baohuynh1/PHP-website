jQuery(document).ready(function($){
    "use strict";

    /* jQuery MeanMenu */
    // $('#site-navigation nav').meanmenu({
    //     meanMenuContainer: '#meanmenu',
    //     meanScreenWidth: gymEdgeObj.meanWidth,
    //     removeElements: "#masthead .masthead-container",
    //     siteLogo: gymEdgeObj.siteLogo
    // });

    $('.vc-main-slider').css({"opacity":1});

    // Mobile Menu
	var mobileMenu = $('.offscreen-navigation .menu');

    if (mobileMenu.length) {
        mobileMenu.children("li").addClass("menu-item-parent");
        mobileMenu.find(".menu-item-has-children > a").on("click", function (e) {
            e.preventDefault();
            $(this).toggleClass("opened");
            var n = $(this).next(".sub-menu"),
                s = $(this).closest(".menu-item-parent").find(".sub-menu");
            mobileMenu.find(".sub-menu").not(s).slideUp(250).prev('a').removeClass('opened'), n.slideToggle(250)
        });
        mobileMenu.find('.menu-item:not(.menu-item-has-children) > a').on('click', function (e) {
            $('.rt-slide-nav').slideUp();
            $('body').removeClass('slidemenuon');
        });
    }

	$('.sidebarBtn.circle-btn').on('click', function (e) {
		e.preventDefault();
		$('.overly-sidebar-wrapper').addClass('show');
		$('.offcanvas-menu-btn').addClass('menu-status-open');
	});

	$('.mean-bar .sidebarBtn').on('click', function (e) {
		e.preventDefault();
		if ($('.rt-slide-nav').is(":visible")) {
			$('.rt-slide-nav').slideUp();
			$('body').removeClass('slidemenuon');
		} else {
			$('.rt-slide-nav').slideDown();
			$('body').addClass('slidemenuon');
		}

	});

    /* Search Box */
    $('body').on('click', '.search-box-area .search-button', function(event){
        event.preventDefault();
        if($('.search-box-area .search-text').hasClass('active')){
            $('.search-box-area .search-text').removeClass('active');
        }
        else{
            $('.search-box-area .search-text').addClass('active');
        }
        return false;
    }); 

    /* Scroll to top */
    // click event
    $('.scrollToTop').on('click',function(){
        $('html, body').animate({scrollTop : 0},800);
        return false;
    });

    // scroll event
    $(window).scroll(function(){
        if ($(this).scrollTop() > 100) {
            $('.scrollToTop').fadeIn();
        } else {
            $('.scrollToTop').fadeOut();
        }
    });

    // Wishlist icon
    $(document).on('click', '.rdtheme-wishlist-icon',function(){
        if ( $(this).hasClass('rdtheme-add-to-wishlist')) {

            var $obj = $(this),
                productId = $obj.data('product-id'),
                afterTitle = $obj.data('title-after');

            var data = {
                'action' : 'gymedge_add_to_wishlist',
                'context' : 'frontend',
                'nonce' : $obj.data('nonce'),
                'add_to_wishlist' : productId,
            };

            var loaderContainer = $( '<span/>', {
                'class': 'loader-image-container'
            }).appendTo( $obj );

            var loader = $( '<img/>', {
                src: gymEdgeObj.baseurl + '/wp-admin/images/loading.gif',
                'class': 'loader-image'
            }).appendTo( loaderContainer );

            $.ajax({
                url : gymEdgeObj.ajaxurl,
                type : 'POST',
                data : data,

                success : function( data ) {
                    if ( data['result'] != 'error' ) {
                        $obj.find('.wishlist-icon').removeClass('fa-heart-o').addClass('fa-check').show();
                        $obj.removeClass('rdtheme-add-to-wishlist').addClass('rdtheme-remove-from-wishlist');
                        $obj.attr('title', afterTitle);
                        loaderContainer.remove();
                    }
                }
            });

            return false;
        }
    });

    /* Mega Menu */
    $('.site-header .main-navigation ul > li.mega-menu').each(function() {
        var items = $(this).find(' > ul.sub-menu > li').length; // total num of columns
        var bodyWidth = $('body').outerWidth(); // screen width
        var parentLinkWidth = $(this).find(' > a').outerWidth(); // main menu link width
        var parentLinkpos = $(this).find(' > a').offset().left; // main menu position from left

        var width = items * 230;
        var left  = (width/2) - (parentLinkWidth/2);
        
        var linkleftWidth  = parentLinkpos + (parentLinkWidth/2);
        var linkRightWidth = bodyWidth - ( parentLinkpos + parentLinkWidth );

        if( (width/2)>linkleftWidth ){
            $(this).find(' > ul.sub-menu').css({ // exceeds left screen
                width: width + 'px',
                right: 'inherit',
                left:  '-' + parentLinkpos + 'px'
            });        
        }
        else if ( (width/2)>linkRightWidth ) { // exceeds right screen
            $(this).find(' > ul.sub-menu').css({
                width: width + 'px',
                left: 'inherit',
                right:  '-' + linkRightWidth + 'px'
            }); 
        }
        else{
            $(this).find(' > ul.sub-menu').css({
                width: width + 'px',
                left:  '-' + left + 'px'
            });            
        }
    });

    /* Sticky Menu */
    if ( gymEdgeObj.stickyMenu == 1 || gymEdgeObj.stickyMenu == 'on' ) {
        if (gymEdgeObj.stickyOld) {
            run_old_sticky_menu();
        }
        else {
            run_sticky_menu();
            run_sticky_meanmenu();           
        }
    }

    /* Woocommerce Shop change view */
    $('#shop-view-mode li a').on('click',function(){
        $('body').removeClass('product-grid-view').removeClass('product-list-view');

        if ( $(this).closest('li').hasClass('list-view-nav')) {
            $('body').addClass('product-list-view');
            Cookies.set('shopview', 'list');
        }
        else{
            $('body').addClass('product-grid-view');
            Cookies.remove('shopview');
        }
        return false;
    });
    
    /* ---- VC Modules ---- */

    // Nav bar variable width
    $('.owl-custom-nav-bar').each(function() {
        var $parent      = $(this).closest('.section-title');
        var sectionWidth = $parent.outerWidth();
        var titleWidth   = $parent.find('.owl-custom-nav-title').outerWidth();
        var nav          = $parent.find('.owl-custom-nav');
        var navWidth     = nav.length ? nav.outerWidth() : 0;
        $parent.find('.owl-custom-nav-bar').width(sectionWidth-titleWidth-navWidth-40);
    });

    // VC fullscreen error fix in RTL
    if ( gymEdgeObj.vcRtl == 'yes' ) {
        rdthemeFixVcFullWidthRow();
        $(document).on('vc-full-width-row', function () {
            rdthemeFixVcFullWidthRow();
        });
    }

    /* Routine */
    $('.rt-routine .rt-routine-nav a').click(function (e) {
        e.preventDefault();
        var $parent = $(this).closest('.rt-routine'),
        id = $(this).data('id');

        $parent.find('.rt-routine-nav li').removeClass('active');
        $(this).parent().addClass('active');

        if ( id == 'all' ) {
            $parent.find('.rt-item').addClass('show');
        }
        else {
            $parent.find('.rt-item').removeClass('show');
            $parent.find('.rt-routine-id-'+id).addClass('show');
        }
    });

    /* BMI Calculator */

    // Show or hide inputs based on radio fields
    $('.rt-bmi-calculator').each(function() {
        rdthemeBMIRadioChange($(this));       
    });

    $('.rt-bmi-calculator .rt-bmi-radio').on('change', 'input[name=rt-bmi-unit]', function() {
        var $parent = $(this).closest('.rt-bmi-calculator');
        rdthemeBMIRadioChange($parent);
    });

    // Calculate BMI
    $('.rt-bmi-calculator').on('click', '.rt-bmi-submit', function(event) {
        event.preventDefault();
        var $parent = $(this).closest('.rt-bmi-calculator'),
        bmi = rdthemeBMICalculate($parent),
        chart = $parent.find('.rt-bmi-result').data('chart'),
        status = false,
        errorMsg;

        if ( bmi == 'emptyError' ) {
            errorMsg = $parent.find('.rt-bmi-error').data('emptymsg');
        }
        else if( bmi == 'numberError' ){
            errorMsg = $parent.find('.rt-bmi-error').data('numbermsg');
        }
        else if( bmi<18.5 ){
            status = 1;
        }
        else if( 18.5<=bmi && bmi<=24.99 ){
            status = 2;
        }
        else if( 25<=bmi && bmi<=29.99 ){
            status = 3;
        }
        else if( bmi>=30 ){
            status = 4;
        }

        if (status) {
            $parent.find('.rt-bmi-val').text(bmi);
            $parent.find('.rt-bmi-status').text(chart[status-1][1]);
            $parent.find('.rt-bmi-error').hide();
            $parent.find('.rt-bmi-result').show();
        }
        else {
            $parent.find('.rt-bmi-result').hide();
            $parent.find('.rt-bmi-error').text(errorMsg).show();
        }
    });

    // Button
    $(".rt-vc-button-1").on({
        mouseenter: function(){
            var txtHover = $(this).data('txthover');
            var bgHover  = $(this).data('bghover');
            $(this).css({
                'color': txtHover,
                'background-color': bgHover
            });
        },
        mouseleave: function(){
            var txtColor = $(this).data('txtcolor');
            var bgColor  = $(this).data('bgcolor');
            if ( bgColor == '' ) {
                bgColor = 'transparent';
            }
            $(this).css({
                'color': txtColor,
                'background-color': bgColor
            });
        }
    }, this);

    function run_sticky_menu() {

        if ( window.gymEdgeStickyActivated ) {
            return;
        }

        window.gymEdgeStickyActivated = true;

        var wrapperHtml  = $('<div class="main-header-sticky-wrapper"></div>');
        var wrapperClass = '.main-header-sticky-wrapper';
        
        $('.header-sticky').clone().appendTo(wrapperHtml);
        $('body').append(wrapperHtml);

        // $('.enabled-onepage-nav .main-header-sticky-wrapper .main-navigation .menu').onePageNav({
        //     extraOffset: gymEdgeObj.extraOffset,
        // });

        $('.enabled-onepage-nav .main-header-sticky-wrapper .main-navigation .menu').navpoints({
            updateHash:true,
            extraOffset: gymEdgeObj.extraOffset,
        });

        var height = $(wrapperClass).outerHeight() + 30;

        $(wrapperClass).css('margin-top', '-' + height + 'px');

        var counter = 0;
        $(window).scroll(function(){
			if(counter == 0){
				if ($(this).scrollTop() >= 300) {
					$('body').addClass('rdthemeSticky');
					counter++;
				}
			}
			if ($(this).scrollTop() < 300) {
				$('body').removeClass('rdthemeSticky');
				counter = 0;
			}
        });
    }

    function run_sticky_meanmenu() {
		var counter = 0;
        $(window).scroll(function() {
			if(counter == 0){
				if ($(this).scrollTop() >= 50) {
					$('body').addClass("mean-stick");
					counter++;
				}
			}
            if ($(this).scrollTop() < 50) {
                $('body').removeClass("mean-stick");
				counter = 0;
            }
        });
    }

    function run_old_sticky_menu() {
        $(window).scroll(function() {
            var s = $("body");
            var windowpos = $(window).scrollTop();
            if(windowpos > 0){
                s.removeClass("non-stick");
                s.addClass("stick");
            } 
            else {
                s.removeClass("stick");
                s.addClass("non-stick");
            }
        });
    }

});

(function($){
    "use strict";

    $(window).on('load',function(){
        // Preloader
        $('#preloader').fadeOut('slow', function () {
            $(this).remove();
        });
        
        // Onepage Nav on meanmenu
        // $('.enabled-onepage-nav #meanmenu .menu').onePageNav({
        //     extraOffset: gymEdgeObj.extraOffsetMobile,
        //     end: function() {
        //         $('.meanclose').trigger('click');
        //     } 
        // });

        $('.enabled-onepage-nav #meanmenu .menu').navpoints({
			updateHash:true,
			extraOffset: gymEdgeObj.extraOffsetMobile,
			end: function() {
                $('.meanclose').trigger('click');
            } 
		});

        // Plugin: Easy Twitter Widget - Hide images
        var $twtIframe = $(".widget-do-etfw iframe#twitter-widget-0");
        $twtIframe.contents().find(".timeline-Tweet-media").hide();
        $twtIframe.css('height','inherit');

    });

    $(window).on('load resize', function () {
        //Define the maximum height for mobile menu
        var wHeight = $(window).height();
        wHeight = wHeight - 50;
        $('.mean-nav > ul').css('max-height', wHeight + 'px');
    });

})(jQuery);


function rdthemeBMICalculate($parent){
    var unit = $parent.find('input[name=rt-bmi-unit]:checked').val();
    if ( unit == 'metric' ) {
        var weight = $parent.find('input[name=rt-bmi-weight]').val();
        var height = $parent.find('input[name=rt-bmi-height]').val();
        if ( weight == '' || height == '' ) {
            return 'emptyError';
        }
        if ( !jQuery.isNumeric(weight) || !jQuery.isNumeric(height) ) {
            return 'numberError';
        }
        height = height/100;
        var bmi = weight/(height*height);
    }
    else {
        var weight = $parent.find('input[name=rt-bmi-pound]').val();
        var feet   = $parent.find('input[name=rt-bmi-feet]').val();
        var inch   = $parent.find('input[name=rt-bmi-inch]').val();
        if ( weight == '' || feet == '' || inch == '' ) {
            return 'emptyError';
        }
        if ( !jQuery.isNumeric(weight) || !jQuery.isNumeric(feet) || !jQuery.isNumeric(inch) ) {
            return 'numberError';
        }
        height = (feet*12)+parseFloat(inch);
        var bmi = (weight/(height*height)*703);
    }
    return Math.round(bmi*100)/100;
}

function rdthemeBMIRadioChange($parent){
    var unit = $parent.find('input[name=rt-bmi-unit]:checked').val();
    if ( unit == 'metric' ) {
        $parent.find('.rt-bmi-fields .rt-bmi-fields-imperial').hide();
        $parent.find('.rt-bmi-fields .rt-bmi-fields-metric').show();
    }
    else {
        $parent.find('.rt-bmi-fields .rt-bmi-fields-metric').hide();
        $parent.find('.rt-bmi-fields .rt-bmi-fields-imperial').show();
    }
}

function rdthemeFixVcFullWidthRow(){
    var $elements = jQuery('[data-vc-full-width="true"]');
    jQuery.each($elements, function () {
        var $el = jQuery(this);
        $el.css('right', $el.css('left')).css('left', '');
    });
}

function gymedge_content_load_scripts() {
    var $ = jQuery;

    // Owl Custom Nav
    if ( typeof $.fn.owlCarousel == 'function') {

        $(".owl-custom-nav .owl-next").on('click', function(){
            $(this).closest('.owl-wrap').find('.owl-carousel').trigger('next.owl.carousel');
        });
        $(".owl-custom-nav .owl-prev").on('click',function(){
            $(this).closest('.owl-wrap').find('.owl-carousel').trigger('prev.owl.carousel');
        });

        $(".rt-owl-carousel").each(function() {
            var options = $(this).data('carousel-options');
            if ( gymEdgeObj.rtl == 'yes' ) {
                options['rtl'] = true;
                options['navText'] = ["<i class='fa fa-angle-right'></i>","<i class='fa fa-angle-left'></i>"];
            }
            $(this).owlCarousel(options);
        });
    }
    // Upcoming Class 1
    if ( typeof $.fn.owlCarousel == 'function') {
        $(".rt-owl-upcoming-1 .rt-arrow-1").on('click',function(){
            $(this).closest('.rt-owl-upcoming-1').find('.owl-carousel').trigger('prev.owl.carousel');
        });
        $(".rt-owl-upcoming-1 .rt-arrow-2").on('click',function(){
            $(this).closest('.rt-owl-upcoming-1').find('.owl-carousel').trigger('next.owl.carousel');
        });
        $(".rt-owl-carousel-2").each(function() {
            var options = $(this).data('carousel-options');
            $(this).owlCarousel(options);
        });
    }

    $('.rt-owl-upcoming-1').each(function() {
        var $height = $(this).height();
        $(this).find('.rt-heading, .rt-item').innerHeight($height);
        $(this).css('visibility', 'visible');
    });

    // Swiper Slider
	$(".rt-main-slider-wrapper").each(function () {
		var swiperSlider = $(this).find('.swiper-container');
        var sliderOptions = swiperSlider.data('option');
        var swiper = new Swiper(swiperSlider, sliderOptions);
    });

}

/* Generate class based on container width */
(function ($) {
    "use strict";

    //$(document).ready(elementWidth);
    $(window).on('load resize', elementWidth);

    function elementWidth(){

        // Elementor Frontend Load
        $(window).on('elementor/frontend/init', function () {
            if (elementorFrontend.isEditMode()) {
                elementorFrontend.hooks.addAction('frontend/element_ready/widget', function () {
                    gymedge_content_load_scripts();
                });
            }
        });

        gymedge_content_load_scripts();

        $('.elementwidth').each(function() {
            var $container = $(this),
            width = $container.outerWidth(),
            classes = $container.attr("class").split(' '); // get all class

            var classes1 = startWith(classes,'elwidth'); // class starting with "elwidth"
            classes1 = classes1[0].split('-'); // "elwidth" classnames into array
            classes1.splice(0, 1); // remove 1st element "elwidth"

            var classes2 = startWith(classes,'elmaxwidth'); // class starting with "elmaxwidth"
            classes2.forEach(function(el){
                $container.removeClass(el);
            });

            classes1.forEach(function(el){
                var maxWidth = parseInt(el);

                if (width <= maxWidth) {
                    $container.addClass('elmaxwidth-'+maxWidth);
                }
            });
        });
    }

    function startWith(item, stringName){
        return $.grep(item, function(elem) {
            return elem.indexOf(stringName) == 0;
        });
    }

}(jQuery));