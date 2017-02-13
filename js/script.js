var height;
var heightNav;

jQuery(document).ready(function() {
    
    height = jQuery(window).height();
    heightNav = jQuery('#nav-wrapper').outerHeight(true);
    
    jQuery('#switch-theme').on('click', function() {
        jQuery('html').toggleClass('light-theme');
    });
    
    jQuery("#countdown").countdown("2017/07/01", function(event) {
        jQuery("#countdown").find('.time.weeks').text(event.strftime('%w'));
        jQuery("#countdown").find('.time.days').text(event.strftime('%d'));
        jQuery("#countdown").find('.time.hours').text(event.strftime('%H'));
        jQuery("#countdown").find('.time.minutes').text(event.strftime('%M'));
        jQuery("#countdown").find('.time.seconds').text(event.strftime('%S'));
        jQuery("#countdown").find('.time:before').css('width', event.offset.seconds + '%');
        
        console.log(event.offset.seconds);
        //jQuery(this).text(event.strftime('%w weeks %d days %H:%M:%S'));
    });
    
    var lastScrollTop = 0, delta = 0;
    jQuery(window).scroll(function(event) {
        var st = jQuery(this).scrollTop();

        if (Math.abs(lastScrollTop - st) <= delta) {
            return;   
        }
        var factor = 1 - st / height;
        if (st > lastScrollTop) {
            jQuery(".mission").css("opacity", factor);
            //console.log(jQuery(".mission").css("opacity"));
            if (!jQuery('#logo-main').is(':animated') && lastScrollTop > (height - heightNav)) {
                jQuery('#nav-wrapper').animate({
                    paddingTop: '1%',
                    paddingBottom: '1%',
                    backgroundColor: "rgba(255, 255, 255, 1)"
                }, 1000);
                jQuery('#logo-main').animate({
                    opacity: 1
                }, 1000);
            }
        } else {
            if (factor >= 0) {
                jQuery(".mission").css("opacity", factor);
            }
            if (!jQuery('#logo-main').is(':animated') && lastScrollTop < (height - jQuery('#nav-wrapper').outerHeight(true))) {
                jQuery('#logo-main').animate({
                    opacity: 0
                }, 1000);  
                jQuery('#nav-wrapper').animate({
                    paddingTop: '5%',
                    paddingBottom: '5%',
                    backgroundColor: "rgba(255, 255, 255, 0)"
                }, 1000);  
            }
        }
        lastScrollTop = st;
        delta = 0;
    });
    
    
    
});