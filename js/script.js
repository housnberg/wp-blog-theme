var height;
var heightNav;

jQuery(document).ready(function() {
    
    height = jQuery(window).height();
    heightNav = jQuery('#nav-wrapper').outerHeight(true);
    
    jQuery('#switch-theme').on('click', function() {
        jQuery('html').toggleClass('light-theme');
    });
    
    jQuery('#lang-de').on('click', function() {
        if (jQuery('iframe').attr('language') === 'en') {
            jQuery('iframe').attr('src', 'https://www.youtube.com/embed/LuhkjNUYsvU');
            jQuery('#lang-en').toggleClass('active');
            jQuery('#lang-de').toggleClass('active');
            jQuery('iframe').attr('language', 'de');
        }
    });
    
    jQuery('#lang-en').on('click', function() {
        if (jQuery('iframe').attr('language') === 'de') {
            jQuery('iframe').attr('src', 'https://www.youtube.com/embed/_j73uTSTdtA');
            jQuery('#lang-en').toggleClass('active');
            jQuery('#lang-de').toggleClass('active'); 
            jQuery('iframe').attr('language', 'en');
        }
    });
    
    jQuery('#mc_message').bind('DOMNodeInserted', function() {
        //jQuery('#mc_message').
        var error = jQuery('#mc_message').find('.mc_error_msg');
        if (error !== undefined) {
            var text = "Please enter a valid Email address.";
            if (jQuery('iframe').attr('language') === 'de') {
                text = "Bitte gebe eine gültige email Adresse an.";
            } 
            error.text(text);
            setTimeout(function() {
                error.remove();
            }, 5000);
        }
        
        var success = jQuery('#mc_message').find('.mc_success_msg');
        if (success !== undefined) {
            var text = "Success, you've been signed up! Please look for our confirmation email.";
            if (jQuery('iframe').attr('language') === 'de') {
                text = "Herzlichen Glückwunsch, du hast dich erfolgreich in die Liste eingetragen! Prüfe bitte deine Emails zur Bestätigung.";
            } 
            success.text(text);
            setTimeout(function() {
                success.remove();
            }, 5000);
        }
    });
    
    var $buttons = jQuery('input[type="button"]');
    for (var i = 0; i < $buttons.length; i++) {
        var $button = $buttons.eq(i);
        $button.wrap('<span class="button-wrapper"></span>');
        $button.parent().attr('data-hover', $button.val());  
    }
    var $submits = jQuery('input[type="submit"]');
    for (var i = 0; i < $submits.length; i++) {
        var $submit = $submits.eq(i);
        $submit.wrap('<span class="button-wrapper"></span>');
        $submit.parent().attr('data-hover', $submit.val());  
    }
    
    var $inputs = jQuery('input[type="text"]');
    for (var i = 0; i < $inputs.length; i++) {
        var $input = $inputs.eq(i);
        $input.attr('placeholder', jQuery('label[for="' + $input.attr('name') + '"]').text());   
    }
    
    jQuery("#countdown").countdown("2017/07/16", function(event) {
        jQuery("#countdown").find('.time.weeks').text(event.strftime('%w'));
        jQuery("#countdown").find('.time.days').text(event.strftime('%d'));
        jQuery("#countdown").find('.time.hours').text(event.strftime('%H'));
        jQuery("#countdown").find('.time.minutes').text(event.strftime('%M'));
        jQuery("#countdown").find('.time.seconds').text(event.strftime('%S'));
        jQuery("#countdown").find('.time:before').css('width', event.offset.seconds + '%');
        
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
            //jQuery(".mission").css("opacity", factor);
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
                //jQuery(".mission").css("opacity", factor);
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