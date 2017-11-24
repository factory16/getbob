////////////////////////////////
jQuery(document).ready(function($, win) {
  $.fn.inViewport = function(cb) {
     return this.each(function(i,el){
       function visPx(){
         var H = $(this).height(),
             r = el.getBoundingClientRect(), t=r.top, b=r.bottom;
         return cb.call(el, Math.max(0, t>0? H-t : (b<H?b:H)));  
       } visPx();
       $(win).on("resize scroll", visPx);
     });
  };
}(jQuery, window));

//////disable scroll
var keys = {37: 1, 38: 1, 39: 1, 40: 1};

function preventDefault(e) {
  e = e || window.event;
  if (e.preventDefault)
      e.preventDefault();
  e.returnValue = false;  
}

function preventDefaultForScrollKeys(e) {
    if (keys[e.keyCode]) {
        preventDefault(e);
        return false;
    }
}

function disableScroll() {
  if (window.addEventListener) // older FF
      window.addEventListener('DOMMouseScroll', preventDefault, false);
  window.onwheel = preventDefault; // modern standard
  window.onmousewheel = document.onmousewheel = preventDefault; // older browsers, IE
  window.ontouchmove  = preventDefault; // mobile
  document.onkeydown  = preventDefaultForScrollKeys;
}

function enableScroll() {
    if (window.removeEventListener)
        window.removeEventListener('DOMMouseScroll', preventDefault, false);
    window.onmousewheel = document.onmousewheel = null; 
    window.onwheel = null; 
    window.ontouchmove = null;  
    document.onkeydown = null;  
}



/////
jQuery(window).on('load', function($) {
    
    jQuery(":not(.post-link) .filler-animation").inViewport(function(px){
        if(px) {
            
            jQuery(this).addClass("triggeredCSS3") ;
            
            var el = jQuery(this);
            if (!el.hasClass('lined')) {
            
                var splitMe = el;

        	    splitMe.each(function(index){
    
            		var text = jQuery(this).html();
            		var output = '';
            
            		//split all letters into spans
            		for (var i = 0, len = text.length; i < len; i++) {
            		  
            		  	output += '<span data-index="'+i+'">' + text[i] + '</span>';
            			
            		}
            
            		//put it in the html
            		jQuery(this).html(output);
            
            		//check the offset of each letter to figure out where the line breaks
            		var prev = 0;
            		var parts = [];
            		jQuery(this).find('span').each(function(i){
            			if (jQuery(this).offset().top > prev){
            				parts.push(i);
            				prev = jQuery(this).offset().top;
            			}
            		})
            
            		parts.push(text.length);
            
            		//create final 
            		var finalOutput = ''
            
            		parts.forEach(function(endPoint, i){
            			if (endPoint > 0){
            				finalOutput += '<span data-line="'+i+'" class="line-wrap"><span class="line-inner">' + text.substring(parts[i-1],parts[i]) + '</span></span>';
            			}
            		})
            
            		jQuery(this).html(finalOutput);
            		jQuery(this).addClass("lined");
            
            	})

                setTimeout(function() {
                    jQuery('.filler-animation.triggeredCSS3').addClass('filler-animation-show'); 
                }, 300)
            }
        }
    });
    
    jQuery(".shift-up").inViewport(function(px){
        if(px) {
            jQuery(this).css('transform', 'translateY(0%)');
        }
    });
    
    jQuery(".running-number").inViewport(function(px){
        if(px) {
            if (!(jQuery(this).hasClass('finished'))) {
                var separator = jQuery.animateNumber.numberStepFactories.separator(' ');
                var numb = Number(jQuery(this).text());
                
                if (numb % 1 === 0) {
                    jQuery(this).animateNumber(
                        {
                          number: numb,
                          numberStep: separator
                        },
                        3000
                    );
                } else {
                    var decimal_places = 1;
                    var decimal_factor = decimal_places === 0 ? 1 : Math.pow(10, decimal_places);
                    
                    jQuery(this).animateNumber(
                        {
                            number: numb * decimal_factor,
                        
                            numberStep: function(now, tween) {
                                var floored_number = Math.floor(now) / decimal_factor,
                                    target = jQuery(tween.elem);
                        
                                if (decimal_places > 0) {
                                  // force decimal places even if they are 0
                                  floored_number = floored_number.toFixed(decimal_places);
                        
                                  // replace '.' separator with ','
                                  floored_number = floored_number.toString().replace('.', ',');
                                }
                                target.text(floored_number);
                            }
                        },
                        3000
                    );
                }
                jQuery(this).addClass('finished');
            }
        }
    });
    
});


///////////// ПРИМЕЧАНИЯ
jQuery(document).ready(function($) {
    //----- OPEN
    $('[data-note]').on('click', function(e)  {
        if (!($(this).hasClass('opened'))) {
            var targeted_popup_class = jQuery(this).attr('data-note');
            $(this).append('<span class="note-show"><span class="text">' + targeted_popup_class + '</span><span class="closer"></span></span>');
            $(this).addClass('opened');
        }
 
        e.preventDefault();
    });

    //----- CLOSE
    $('body').on('click','span.closer', function(e)  {
        $(this).parent().parent().removeClass('opened');
        $(this).parent().remove();
    });
});

////////////// SERVICES TEMPLATE
jQuery(document).ready(function($) {
    //----- OPEN
    $('.titles li').on('click', function(e)  {
        if (!($(this).hasClass('active'))) {
            $('.descriptions .active').css('transform', 'translateY(30%)');
            $('.titles li.active').removeClass('active');
            $(this).addClass('active');
            
            $('.descriptions div.active').removeClass('active');
            $('.descriptions #' + $(this).attr('id') + '-son').addClass('active');
            $('.descriptions #' + $(this).attr('id') + '-son').removeClass('shift-up');
            $('.descriptions #' + $(this).attr('id') + '-son').addClass('shifter');
            var son = $('.descriptions #' + $(this).attr('id') + '-son .block-title');
            son.html(son.attr('data-text'));
            $('.descriptions #' + $(this).attr('id') + '-son .block-title').removeClass('triggeredCSS3 lined filler-animation-show');
            
            var filler = $(".active .filler-animation")
            filler.addClass("triggeredCSS3") ;
            
            var el = filler;
            if (!el.hasClass('lined')) {
            
                var splitMe = el;

        	    splitMe.each(function(index){
    
            		var text = jQuery(this).html();
            		var output = '';
            
            		//split all letters into spans
            		for (var i = 0, len = text.length; i < len; i++) {
            		  
            		  	output += '<span data-index="'+i+'">' + text[i] + '</span>';
            			
            		}
            
            		//put it in the html
            		jQuery(this).html(output);
            
            		//check the offset of each letter to figure out where the line breaks
            		var prev = 0;
            		var parts = [];
            		jQuery(this).find('span').each(function(i){
            			if (jQuery(this).offset().top > prev){
            				parts.push(i);
            				prev = jQuery(this).offset().top;
            			}
            		})
            
            		parts.push(text.length);
            
            		//create final 
            		var finalOutput = ''
            
            		parts.forEach(function(endPoint, i){
            			if (endPoint > 0){
            				finalOutput += '<span data-line="'+i+'" class="line-wrap"><span class="line-inner">' + text.substring(parts[i-1],parts[i]) + '</span></span>';
            			}
            		})
            
            		jQuery(this).html(finalOutput);
            		jQuery(this).addClass("lined");
            
            	})

                setTimeout(function() {
                    jQuery('.filler-animation.triggeredCSS3').addClass('filler-animation-show'); 
                }, 300)
            }
    
            $('.descriptions .active').css('transform', 'translateY(0%)');
        }
    });
});

////////////// GALLERY SCROLLER
jQuery(document).ready(function($) {
    
    $.each($(".imgslider .slider"), function (index) { 
        $(this).attr('id', 'slider-' + index); 
        $(this).find('.ranger').attr('id', 'ranger-' + index);
        $(this).mThumbnailScroller({ 
            axis:"x",
            type:"click-50",
            setWidth: "100%",
            callbacks:{
                whileScrolling: function(){
                    if (! $(this).find('.ranger').hasClass('sliding')) {
                        var result = this.mts.leftPct;
                        $(this).find('.ranger').val(result);
                    }
                }
            }
        });
    });
    
    $('.popup').magnificPopup({
      type: 'image'
    });
});


jQuery(window).on('load', function($) {
    jQuery.each(jQuery(".imgslider .slider"), function (index) {
        var goto = (jQuery(this).find('ul').width() - jQuery(this).width()) * 0.3;
        jQuery(this).mThumbnailScroller("scrollTo", goto);
    });
    
    jQuery(".mTSButton").on("click", function() {
        jQuery(this).parent().parent().find(".ranger").removeClass('sliding');
    });

    jQuery(".ranger").on("input", function() {
        jQuery(this).addClass('sliding');
        var goto = (jQuery(this).parent().find("ul").width() - jQuery(this).parent().parent().width()) * jQuery(this).val() / 100;
        jQuery(this).parent().mThumbnailScroller("scrollTo", goto);
    });
});

// TESTIMONIALS SLIDER
jQuery(document).ready(function($) {
    var all = $('.slide').length;
    $("#pager span").html('1/' + all);
    
    $.each($('.slide'), function (index) { 
        $(this).attr('id', index + 1); 
    });

    $(".slide").first().css("display", "block");
   
    $("#pager .next").on("click", function() {
        $('#testimonials .slide').filter(':visible').fadeOut(500,function() {
            if( $(this).next('.slide').length > 0 ) {
                $(this).next().fadeIn(500);
                var curr = parseInt($(this).attr('id')) + 1;
                $("#pager span").html(curr + '/' + all);
            }
            else {
                $('#testimonials .slide').first().fadeIn(500);
                $("#pager span").html('1/' + all);
            }
        });
    });
     
    $("#pager .prev").on("click", function() {
        $('#testimonials .slide').filter(':visible').fadeOut(500,function(){
            if($(this).prev('.slide').length > 0){
                $(this).prev().fadeIn(500);
                var curr = parseInt($(this).attr('id')) - 1;
                $("#pager span").html(curr + '/' + all);
            }
            else {
                $('#testimonials .slide').last().fadeIn(500);
                $("#pager span").html(all + '/' + all);
            }
        });
    });
});

////////////// CLIENTS SCROLLER
jQuery(document).ready(function($) {
    jQuery('.marquee').marquee({
        duration: 15000,
        duplicated: true,
        gap: 00,
        direction: 'left'
    });
});

///// MENU
jQuery(document).ready(function($) {
    $('.mobile-header-bar').on('click', '.mobile-navigation .burger-holder', function() {
      $('#menu-show').toggleClass('hide');
      disableScroll();
    });
    $('.close-holder').on('click', function() {
      $('#menu-show').addClass('hide');
      enableScroll();
    });
    $('.header-bar .burger-holder').on('click', function() {
      $('.burger-menu').toggleClass('isActive');
      $('#menu-show').toggleClass('hide');
    });
});

///// WORKS
jQuery(document).ready(function($) {
    $('.cats-filter').attr('base', $('.cats-filter input:checked').attr('id'));
    
    $.each($('.subcats-filter form'), function() { 
        $(this).mCustomScrollbar({
            mouseWheel:{
                enable:true,
                scrollAmount:3
            },
            scrollInertia: 0,
            autoDraggerLength: false,
            documentTouchScroll: true
        });
    });
    
    // works bg
    if ($(window).width() > 1199) {
        $(".underlie").css("background-image", "url(" + $('.articles article:not(.blank) .post-link').first().attr("data-img")+ ")")
               .animate({ 'opacity' : '1' }, 500);
        $.each($(".articles article:not(.blank) .post-link"), function (index) { 
           $(this).append('<img src="' + $(this).attr("data-img") + '" style="display:none;" alt="">');
        });
        $.each($(".articles article:not(.blank) .post-link"), function (index) {
           $(this).css("background-image","none");
        });
    }
    
    // works footer
    if ($(window).width() > 1199) {
        if ($('.archive').height()) {
            if ($('.archive').height() < $(window).height()) {
                $('.archive #footer').css("position", "fixed");
                $('.archive #footer').css("width", "calc(100% - 100px)");
                $('.archive #footer').css("bottom", "0px");
            }
        }
        else if ($('.page-template-template-blog-masonry').height()) {
            if ($('.page-template-template-blog-masonry').height() < $(window).height()) {
                $('.page-template-template-blog-masonry #footer').css("position", "fixed");
                $('.page-template-template-blog-masonry #footer').css("width", "calc(100% - 100px)");
                $('.page-template-template-blog-masonry #footer').css("bottom", "0px");
            }
        }
        else {
            $('#footer').css("position", "relative");
            $('#footer').css("width", "100%");
        }
    }
    else {
        $('#footer').css("position", "relative");
        $('#footer').css("width", "100%");
    }
    
    $(window).resize(function() {
        if ($(window).width() > 1199) {
            if ($('.archive').height()) {
                if ($('.archive').height() < $(window).height()) {
                    $('.archive #footer').css("position", "fixed");
                    $('.archive #footer').css("width", "calc(100% - 100px)");
                    $('.archive #footer').css("bottom", "0px");
                }
            }
            else if ($('.page-template-template-blog-masonry').height()) {
                if ($('.page-template-template-blog-masonry').height() < $(window).height()) {
                    $('.page-template-template-blog-masonry #footer').css("position", "fixed");
                    $('.page-template-template-blog-masonry #footer').css("width", "calc(100% - 100px)");
                    $('.page-template-template-blog-masonry #footer').css("bottom", "0px");
                }
            }
            else {
                $('#footer').css("position", "relative");
                $('#footer').css("width", "100%");
            }
        }
        else {
            $('#footer').css("position", "relative");
            $('#footer').css("width", "100%");
        }
    });
    
    // works hovered
    if ($(window).width() > 1199) {
        $('.articles article:not(.blank)').on('mouseenter', function() {
            $(this).addClass('hovered');
            var curr = $(this);
            $(".underlie").animate({ 'opacity' : '0' }, 0, function() {
                $(".underlie").css("background-image", "url(" + curr.find('.post-link').attr("data-img") + ")").animate({ 'opacity' : '1' }, 0);
            });
        }).on('mouseout', function() {
            $(this).removeClass('hovered');
        });
        $('.underlie').on('mouseenter', function() {
            $(this).animate({ 'opacity' : '0' }, 0, function() {
                $(this).css("background-image", "url(" + $('.articles .post-link').first().attr("data-img")+ ")").animate({ 'opacity' : '1' }, 0);
            });
        });
    }
    else {
        $('.articles article:not(.blank)').on('mouseenter', function() {
            $(this).addClass('hovered');
        }).on('mouseout', function() {
            $(this).removeClass('hovered');
        });
    }
    
    // works filter btn
    if ($(window).width() < 1200) {
        if ($('.page-template-template-blog-masonry').height()) {
            if ($(window).width() > 767) {
                var offset = ($(window).width() - 767) / 2;
                $('.open-filter').css('right', offset + 15);
            }
        }
        if ($('.archive').height()) {
            if ($(window).width() > 767) {
                var offset = ($(window).width() - 767) / 2;
                $('.open-filter').css('right', offset + 15);
            }
        }
        $(window).resize(function() {
            if ($('.page-template-template-blog-masonry').height()) {
                if ($(window).width() > 767) {
                    var offset = ($(window).width() - 767) / 2;
                    $('.open-filter').css('right', offset + 15);
                }
            }
            if ($('.archive').height()) {
                if ($(window).width() > 767) {
                    var offset = ($(window).width() - 767) / 2;
                    $('.open-filter').css('right', offset + 15);
                }
            }
        });
        
        $(window).scroll(function() {
            if ($('.page-template-template-blog-masonry').height()) {
                if ($(document).height() - $(window).scrollTop() - $(window).height() <= $('#footer').height() + 10) {
                    $('.open-filter').css('bottom', $('#footer').height() + 20 - $(document).height() + $(window).scrollTop() + $(window).height());
                }
                else $('.open-filter').css('bottom', 10);
            }
            
            if ($('.archive').height()) {
                if ($(document).height() - $(window).scrollTop() - $(window).height() <= $('#footer').height() + 10) {
                    $('.open-filter').css('bottom', $('#footer').height() + 20 - $(document).height() + $(window).scrollTop() + $(window).height());
                }
                else $('.open-filter').css('bottom', 10);
            }
            
            if ($('.case-filter').css("display") == "block") {
                  disableScroll();
            }
        });
        
        $('.close-filter').on('click', function() {
            enableScroll();
            $(this).parent().css("display","none");
            if ($(window).width() < 1200 && $(window).width() > 767) {
                $('body').css("background", "#ffffff");
            }
            var name = '.cats-filter #' + $('.cats-filter').attr('base');
            $(name).prop('checked', true);
            $('.show-form').removeClass('show-form');
            var subname = '.subcats-filter #' + $('.cats-filter').attr('base');
            $(subname).addClass('show-form');
        });
        
        $.each($(".related_articles article"), function (index) { 
           $(this).addClass('hovered');
        });
    }
    
    // case hovered
    $('.related_articles article').on('mouseenter', function() {
        $(this).addClass('hovered');
    }).on('mouseout', function() {
        $(this).removeClass('hovered');
    });
    
    // 
    if ($(window).width() > 1199) {
        $('.close-filter').on('click', function() {
            $(this).parent().css("display","none");
            var name = '.cats-filter #' + $('.cats-filter').attr('base');
            $(name).prop('checked', true);
            $('.show-form').removeClass('show-form');
            var subname = '.subcats-filter #' + $('.cats-filter').attr('base');
            $(subname).addClass('show-form');
        });
    }
    
    $('.open-filter').on('click', function() {
        $('.case-filter').css("display","block");
        if ($(window).width() < 1200 && $(window).width() > 767) {
            $('body').css("background", "linear-gradient(to right, #290a59, #0b0e32)");
        }
    });
    
    $('.cats-filter input').on('click', function() {
        $('.subcats-filter .show-form').removeClass('show-form');
        var newshow = '.subcats-filter #' + $('.cats-filter input:checked').attr('id');
        $(newshow).addClass('show-form');
    });
    
    $('.subcats-filter input').on('click', function() {
        var goto = '';
        if ($('.subcats-filter .show-form input:checked').attr("id").indexOf("all") >= 0) 
            goto = window.location.protocol + "//" + window.location.host + "/works";
        else goto = window.location.protocol + "//" + window.location.host + "/" + $('.subcats-filter .show-form').attr("id") + "/" + $('.subcats-filter .show-form input:checked').attr("id");
        window.location = goto;
    });
});

// ПЛАНШЕТ
jQuery(document).ready(function($) {
    if ($(window).width() < 1200 && $(window).width() > 767) {
        var offset = 0;
        if (! $('body').hasClass('home')) offset = ($(window).width() - 767) / 2;
        $('#menu-show').css("left", offset);
        offset = ($(window).width() - 767) / 2 + 15;
        $('.close-holder').css("right", offset);
    }
    $(window).resize(function() {
        if ($(window).width() < 1200 && $(window).width() > 767) {
            var offset = 0;
            if (! $('body').hasClass('home')) offset = ($(window).width() - 767) / 2;
            $('#menu-show').css("left", offset);
            offset = ($(window).width() - 767) / 2 + 15;
            $('.close-holder').css("right", offset);
        }
        else if ($(window).width() >= 1200) {
            $('#menu-show').css("left", 100);
        }
        else {
            $('#menu-show').css("left", 0);
            $('.close-holder').css("right", 15);
        } 
    });
});

//SCROLLER LEVEL
jQuery(document).ready(function($) {
    $(window).scroll(function () {
        var scrollPercent = 100 * $(window).scrollTop() / ($(document).height() - $(window).height());
        $('.down-scroller .bg').css("height", scrollPercent + '%');
    });
});
