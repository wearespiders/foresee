/*
 * debouncedresize: special jQuery event that happens once after a window resize
 *
 * latest version and complete README available on Github:
 * https://github.com/louisremi/jquery-smartresize
 *
 * Copyright 2012 @louis_remi
 * Licensed under the MIT license.
 *
 * This saved you an hour of work? 
 * Send me music http://www.amazon.co.uk/wishlist/HNTU0468LQON
 */
(function ($) {

    var $event = $.event,
        $special, resizeTimeout;

    $special = $event.special.debouncedresize = {
        setup: function () {
            $(this).on("resize", $special.handler);
        },
        teardown: function () {
            $(this).off("resize", $special.handler);
        },
        handler: function (event, execAsap) {
            // Save the context
            var context = this,
                args = arguments,
                dispatch = function () {
                    // set correct event type
                    event.type = "debouncedresize";
                    $event.dispatch.apply(context, args);
                };

            if (resizeTimeout) {
                clearTimeout(resizeTimeout);
            }

            execAsap ? dispatch() : resizeTimeout = setTimeout(dispatch, $special.threshold);
        },
        threshold: 150
    };

})(jQuery);


/*
Plugin: jQuery Parallax
Version 1.1.3
Author: Ian Lunn
Twitter: @IanLunn
Author URL: http://www.ianlunn.co.uk/
Plugin URL: http://www.ianlunn.co.uk/plugins/jquery-parallax/

Dual licensed under the MIT and GPL licenses:
http://www.opensource.org/licenses/mit-license.php
http://www.gnu.org/licenses/gpl.html
*/

(function( $ ){
    var $window = $(window);
    var windowHeight = $window.height();

    $window.resize(function () {
        windowHeight = $window.height();
    });

    $.fn.parallax = function(xpos, speedFactor, outerHeight) {
        var $this = $(this);
        var getHeight;
        var firstTop;
        var paddingTop = 0;
        
        //get the starting position of each element to have parallax applied to it      
        $this.each(function(){
            firstTop = $this.offset().top;
        });

        if (outerHeight) {
            getHeight = function(jqo) {
                return jqo.outerHeight(true);
            };
        } else {
            getHeight = function(jqo) {
                return jqo.height();
            };
        }
            
        // setup defaults if arguments aren't specified
        if (arguments.length < 1 || xpos === null) xpos = "50%";
        if (arguments.length < 2 || speedFactor === null) speedFactor = 0.1;
        if (arguments.length < 3 || outerHeight === null) outerHeight = true;
        
        // function to be called whenever the window is scrolled or resized
        function update(){
            var pos = $window.scrollTop();              

            $this.each(function(){
                var $element = $(this);
                var top = $element.offset().top;
                var height = getHeight($element);

                // Check if totally above or totally below viewport
                if (top + height < pos || top > pos + windowHeight) {
                    return;
                }

                $this.css('backgroundPosition', xpos + " " + Math.round((firstTop - pos) * speedFactor) + "px");
            });
        }       

        $window.bind('scroll', update).resize(update);
        update();
    };
})(jQuery);


/*
 * DC Mega Menu - jQuery mega menu
 * Copyright (c) 2011 Design Chemical
 *
 */
(function($){

    //define the defaults for the plugin and how to call it 
    $.fn.dcMegaMenu = function(options){
        //set default options  
        var defaults = {
            classParent: 'dc-mega',
            classContainer: 'sub-container',
            classSubParent: 'mega-hdr',
            classSubLink: 'mega-hdr',
            classWidget: 'dc-extra',
            rowItems: 6,
            speed: 'fast',
            effect: 'fade',
            event: 'hover',
            fullWidth: false,
            onLoad : function(){},
            beforeOpen : function(){},
            beforeClose: function(){}
        };

        //call in the default otions
        var mega_div_width = parseInt($('.mk-mega-nav').attr('data-megawidth')) - 100;
        var options = $.extend(defaults, options);
        var $dcMegaMenuObj = this;

        //act upon the element that is passed into the design    
        return $dcMegaMenuObj.each(function(options){

            var clSubParent = defaults.classSubParent;
            var clSubLink = defaults.classSubLink;
            var clParent = defaults.classParent;
            var clContainer = defaults.classContainer;
            var clWidget = defaults.classWidget;
           //console.log(jQuery(this).parents('.mk-header-nav-container').width());
            
            megaSetup();
            
            function megaOver(){
                var subNav = $('.sub',this);
                $(this).addClass('mega-hover');
                if(defaults.effect === 'fade'){
                    $(subNav).fadeIn(defaults.speed);
                }
                if(defaults.effect === 'slide'){
                    $(subNav).show(defaults.speed);
                }
                // beforeOpen callback;
                defaults.beforeOpen.call(this);
            }
            function megaAction(obj){
                var subNav = $('.sub',obj);
                $(obj).addClass('mega-hover');
                if(defaults.effect === 'fade'){
                    $(subNav).fadeIn(defaults.speed);
                }
                if(defaults.effect === 'slide'){
                    $(subNav).show(defaults.speed);
                }
                // beforeOpen callback;
                defaults.beforeOpen.call(this);
            }
            function megaOut(){
                var subNav = $('.sub',this);
                $(this).removeClass('mega-hover');
                $(subNav).hide();
                // beforeClose callback;
                defaults.beforeClose.call(this);
            }
            function megaActionClose(obj){
                var subNav = $('.sub',obj);
                $(obj).removeClass('mega-hover');
                $(subNav).hide();
                // beforeClose callback;
                defaults.beforeClose.call(this);
            }
            function megaReset(){
                $('li',$dcMegaMenuObj).removeClass('mega-hover');
                $('.sub',$dcMegaMenuObj).hide();
            }

            function megaSetup(){
                //$arrow = '<span class="dc-mega-icon"></span>';
                var clParentLi = clParent+'-li';
                var menuWidth = $dcMegaMenuObj.outerWidth();
                $('> li',$dcMegaMenuObj).each(function(){
                    //Set Width of sub
                    var $mainSub = $('> ul',this);
                    var $primaryLink = $('> a',this);
                    if($mainSub.length){
                        //$primaryLink.addClass(clParent).append($arrow);
                        $mainSub.addClass('sub').wrap('<div class="'+clContainer+'" />');
                        
                        var pos = $(this).position();
                        pl = pos.left;
                            
                        // checks whether its a mega menu. editd by MK    
                        if($('ul.mk_mega_menu',$mainSub).length){
                            $(this).addClass(clParentLi);
                            $('.'+clContainer,this).addClass('mega');
                            $('> li',$mainSub).each(function(){
                                if(!$(this).hasClass(clWidget)){
                                    $(this).addClass('mega-unit');
                                    if($('> ul',this).length){
                                        $(this).addClass(clSubParent);
                                        $('> a',this).addClass(clSubParent+'-a');
                                    } else {
                                        $(this).addClass(clSubLink);
                                        $('> a',this).addClass(clSubLink+'-a');
                                    }
                                }
                            });

                            // Create Rows
                            var hdrs = $('.mega-unit',this);
                            rowSize = parseInt(defaults.rowItems);
                            for(var i = 0; i < hdrs.length; i+=rowSize){
                                hdrs.slice(i, i+rowSize).wrapAll('<div class="row" />');
                            }

                            // Get Sub Dimensions & Set Row Height
                            $mainSub.show();
                            
                            // Get Position of Parent Item
                            var pw = $(this).width();
                            var pr = pl + pw;
                            
                            // Check available right margin
                            var mr = menuWidth - pr;
                            
                            // // Calc Width of Sub Menu
                            var subw = $mainSub.outerWidth();
                            var totw = $mainSub.parent('.'+clContainer).outerWidth();
                            var cpad = totw - subw;
                            
                            if(defaults.fullWidth === true){
                                var fw = menuWidth - cpad;
                                $mainSub.parent('.'+clContainer).css({width:mega_div_width});
                                $dcMegaMenuObj.addClass('full-width');
                            }
                            var iw = $('.mega-unit',$mainSub).outerWidth(true);
                            var rowItems = $('.row:eq(0) .mega-unit',$mainSub).length;
                            var inneriw = iw * rowItems;
                            var totiw = inneriw + cpad;
                            
                            // Set mega header height
                            $('.row',this).each(function(){
                                $('.mega-unit:last',this).addClass('last');
                                var maxValue = undefined;
                                $('.mega-unit > a',this).each(function(){
                                    var val = parseInt($(this).height());
                                    if (maxValue === undefined || maxValue < val){
                                        maxValue = val;
                                    }
                                });
                                $('.mega-unit > a',this).css('height',maxValue+'px');
                                $(this).css('width',inneriw+'px');
                            });
                            
                            // Calc Required Left Margin incl additional required for right align
                            
                            if(defaults.fullWidth === true){
                                params = {left: 0};
                            } else {
                                
                                var ml = mr < ml ? ml + ml - mr : (totiw - pw)/2;
                                var subLeft = pl - ml;

                                // If Left Position Is Negative Set To Left Margin
                                var params = {left: pl+'px', marginLeft: -ml+'px'};
                                
                                if(subLeft < 0){
                                    params = {left: 0};
                                }else if(mr < ml){
                                    params = {right: 0};
                                }
                            }
                            $('.'+clContainer,this).css(params);
                            
                            // Calculate Row Height
                            $('.row',$mainSub).each(function(){
                                var rh = $(this).height();
                                $('.mega-unit',this).css({height: rh+'px'});
                                $(this).parent('.row').css({height: rh+'px'});
                            });
                            $mainSub.hide();
                    
                        } else {
                            $('.'+clContainer,this).addClass('non-mega').css('left',pl+'px');
                        }
                        // MK edition
                        if(!$('ul',$mainSub).hasClass('mk_mega_menu')){
                            $('.'+clContainer,this).addClass('mk-nested-sub');
                            //console.log($('.mk-nested-sub > ul',this).width());
                            $mk_nested_ul = $('.mk-nested-sub > ul',this);
                            $mk_nested_width = $mk_nested_ul.width();

                            $mk_nested_ul.find('ul').css('left', $mk_nested_width+'px');
                            $mk_nested_ul.find('li').each(function(){
                                var $nested_sub = $('> ul',this);
                                if($nested_sub.length) {
                                    jQuery(this).append('<i class="mk-mega-icon mk-icon-angle-right"></i>');
                                }
                                jQuery(this).hover(function(){
                                jQuery(this).find('> ul').stop(true, true).delay(200).fadeIn(100);
                                    }, function() {
                                jQuery(this).find('> ul').stop(true, true).delay(200).fadeOut(100);
                                });
                            });

                        }    
                    }
                });
                // Set position of mega dropdown to bottom of main menu
                var menuHeight = $('> li > a',$dcMegaMenuObj).outerHeight(true);
                $('.'+clContainer,$dcMegaMenuObj).css({top: menuHeight+'px'}).css('z-index','1000');
                
                if(defaults.event == 'hover'){
                    // HoverIntent Configuration
                    var config = {
                        sensitivity: 1,
                        interval: 30,
                        over: megaOver,
                        timeout: 100,
                        out: megaOut
                    };
                    $('li',$dcMegaMenuObj).hoverIntent(config);
                }
                
                if(defaults.event == 'click'){
                
                    $('body').mouseup(function(e){
                        if(!$(e.target).parents('.mega-hover').length){
                            megaReset();
                        }
                    });

                    $('> li > a.'+clParent,$dcMegaMenuObj).click(function(e){
                        var $parentLi = $(this).parent();
                        if($parentLi.hasClass('mega-hover')){
                            megaActionClose($parentLi);
                        } else {
                            megaAction($parentLi);
                        }
                        e.preventDefault();
                    });
                }
                
                // onLoad callback;
                defaults.onLoad.call(this);
            }
        });
    };
})(jQuery);



/**
* hoverIntent r5 // 2007.03.27 // jQuery 1.1.2+
* <http://cherne.net/brian/resources/jquery.hoverIntent.html>
* 
* @param  f  onMouseOver function || An object with configuration options
* @param  g  onMouseOut function  || Nothing (use configuration options object)
* @author    Brian Cherne <brian@cherne.net>
*/
(function($){$.fn.hoverIntent=function(f,g){var cfg={sensitivity:7,interval:100,timeout:0};cfg=$.extend(cfg,g?{over:f,out:g}:f);var cX,cY,pX,pY;var track=function(ev){cX=ev.pageX;cY=ev.pageY;};var compare=function(ev,ob){ob.hoverIntent_t=clearTimeout(ob.hoverIntent_t);if((Math.abs(pX-cX)+Math.abs(pY-cY))<cfg.sensitivity){$(ob).unbind("mousemove",track);ob.hoverIntent_s=1;return cfg.over.apply(ob,[ev]);}else{pX=cX;pY=cY;ob.hoverIntent_t=setTimeout(function(){compare(ev,ob);},cfg.interval);}};var delay=function(ev,ob){ob.hoverIntent_t=clearTimeout(ob.hoverIntent_t);ob.hoverIntent_s=0;return cfg.out.apply(ob,[ev]);};var handleHover=function(e){var p=(e.type=="mouseover"?e.fromElement:e.toElement)||e.relatedTarget;while(p&&p!=this){try{p=p.parentNode;}catch(e){p=this;}}if(p==this){return false;}var ev=jQuery.extend({},e);var ob=this;if(ob.hoverIntent_t){ob.hoverIntent_t=clearTimeout(ob.hoverIntent_t);}if(e.type=="mouseover"){pX=ev.pageX;pY=ev.pageY;$(ob).bind("mousemove",track);if(ob.hoverIntent_s!=1){ob.hoverIntent_t=setTimeout(function(){compare(ev,ob);},cfg.interval);}}else{$(ob).unbind("mousemove",track);if(ob.hoverIntent_s==1){ob.hoverIntent_t=setTimeout(function(){delay(ev,ob);},cfg.timeout);}}};return this.mouseover(handleHover).mouseout(handleHover);};})(jQuery);




/* Copyright 2012, Ben Lin (http://dreamerslab.com/)
 * Licensed under the MIT License (LICENSE.txt).
 *
 * Version: 1.0.15
 *
 * Requires: jQuery >= 1.2.3
 */
(function(a){a.fn.addBack=a.fn.addBack||a.fn.andSelf;a.fn.extend({actual:function(b,l){if(!this[b]){throw'$.actual => The jQuery method "'+b+'" you called does not exist';}var f={absolute:false,clone:false,includeMargin:false};var i=a.extend(f,l);var e=this.eq(0);var h,j;if(i.clone===true){h=function(){var m="position: absolute !important; top: -1000 !important; ";e=e.clone().attr("style",m).appendTo("body")};j=function(){e.remove()}}else{var g=[];var d="";var c;h=function(){c=e.parents().addBack().filter(":hidden");d+="visibility: hidden !important; display: block !important; ";if(i.absolute===true){d+="position: absolute !important; "}c.each(function(){var m=a(this);g.push(m.attr("style"));m.attr("style",d)})};j=function(){c.each(function(m){var o=a(this);var n=g[m];if(n===undefined){o.removeAttr("style")}else{o.attr("style",n)}})}}h();var k=/(outer)/.test(b)?e[b](i.includeMargin):e[b]();j();return k}})})(jQuery);





/*
 
 jQuery Tools Validator 1.2.5 - HTML5 is here. Now use it.

 NO COPYRIGHTS OR LICENSES. DO WHAT YOU LIKE.

 http://flowplayer.org/tools/form/validator/

 Since: Mar 2010
 Date:    Wed Sep 22 06:02:10 2010 +0000 
*/
(function(e){function t(a,b,c){var k=a.offset().top,f=a.offset().left,l=c.position.split(/,?\s+/),p=l[0];l=l[1];k-=b.outerHeight()-c.offset[0];f+=a.outerWidth()+c.offset[1];if(/iPad/i.test(navigator.userAgent))k-=e(window).scrollTop();c=b.outerHeight()+a.outerHeight();if(p=="center")k+=c/2;if(p=="bottom")k+=c;a=a.outerWidth();if(l=="center")f-=(a+b.outerWidth())/2;if(l=="left")f-=a;return{top:k,left:f}}function y(a){function b(){return this.getAttribute("type")==a}b.key="[type="+a+"]";return b}function u(a,
b,c){function k(g,d,i){if(!(!c.grouped&&g.length)){var j;if(i===false||e.isArray(i)){j=h.messages[d.key||d]||h.messages["*"];j=j[c.lang]||h.messages["*"].en;(d=j.match(/\$\d/g))&&e.isArray(i)&&e.each(d,function(m){j=j.replace(this,i[m])})}else j=i[c.lang]||i;g.push(j)}}var f=this,l=b.add(f);a=a.not(":button, :image, :reset, :submit");e.extend(f,{getConf:function(){return c},getForm:function(){return b},getInputs:function(){return a},reflow:function(){a.each(function(){var g=e(this),d=g.data("msg.el");
if(d){g=t(g,d,c);d.css({top:g.top,left:g.left})}});return f},invalidate:function(g,d){if(!d){var i=[];e.each(g,function(j,m){j=a.filter("[name='"+j+"']");if(j.length){j.trigger("OI",[m]);i.push({input:j,messages:[m]})}});g=i;d=e.Event()}d.type="onFail";l.trigger(d,[g]);d.isDefaultPrevented()||q[c.effect][0].call(f,g,d);return f},reset:function(g){g=g||a;g.removeClass(c.errorClass).each(function(){var d=e(this).data("msg.el");if(d){d.remove();e(this).data("msg.el",null)}}).unbind(c.errorInputEvent||
"");return f},destroy:function(){b.unbind(c.formEvent+".V").unbind("reset.V");a.unbind(c.inputEvent+".V").unbind("change.V");return f.reset()},checkValidity:function(g,d){g=g||a;g=g.not(":disabled");if(!g.length)return true;d=d||e.Event();d.type="onBeforeValidate";l.trigger(d,[g]);if(d.isDefaultPrevented())return d.result;var i=[];g.not(":radio:not(:checked)").each(function(){var m=[],n=e(this).data("messages",m),v=r&&n.is(":date")?"onHide.v":c.errorInputEvent+".v";n.unbind(v);e.each(w,function(){var o=
this,s=o[0];if(n.filter(s).length){o=o[1].call(f,n,n.val());if(o!==true){d.type="onBeforeFail";l.trigger(d,[n,s]);if(d.isDefaultPrevented())return false;var x=n.attr(c.messageAttr);if(x){m=[x];return false}else k(m,s,o)}}});if(m.length){i.push({input:n,messages:m});n.trigger("OI",[m]);c.errorInputEvent&&n.bind(v,function(o){f.checkValidity(n,o)})}if(c.singleError&&i.length)return false});var j=q[c.effect];if(!j)throw'Validator: cannot find effect "'+c.effect+'"';if(i.length){f.invalidate(i,d);return false}else{j[1].call(f,
g,d);d.type="onSuccess";l.trigger(d,[g]);g.unbind(c.errorInputEvent+".v")}return true}});e.each("onBeforeValidate,onBeforeFail,onFail,onSuccess".split(","),function(g,d){e.isFunction(c[d])&&e(f).bind(d,c[d]);f[d]=function(i){i&&e(f).bind(d,i);return f}});c.formEvent&&b.bind(c.formEvent+".V",function(g){if(!f.checkValidity(null,g))return g.preventDefault()});b.bind("reset.V",function(){f.reset()});a[0]&&a[0].validity&&a.each(function(){this.oninvalid=function(){return false}});if(b[0])b[0].checkValidity=
f.checkValidity;c.inputEvent&&a.bind(c.inputEvent+".V",function(g){f.checkValidity(e(this),g)});a.filter(":checkbox, select").filter("[required]").bind("change.V",function(g){var d=e(this);if(this.checked||d.is("select")&&e(this).val())q[c.effect][1].call(f,d,g)});var p=a.filter(":radio").change(function(g){f.checkValidity(p,g)});e(window).resize(function(){f.reflow()})}e.tools=e.tools||{version:"1.2.5"};var z=/\[type=([a-z]+)\]/,A=/^-?[0-9]*(\.[0-9]+)?$/,r=e.tools.dateinput,B=/^([a-z0-9_\.\-\+]+)@([\da-z\.\-]+)\.([a-z\.]{2,6})$/i,
C=/^(https?:\/\/)?[\da-z\.\-]+\.[a-z\.]{2,6}[#&+_\?\/\w \.\-=]*$/i,h;h=e.tools.validator={conf:{grouped:false,effect:"default",errorClass:"invalid",inputEvent:null,errorInputEvent:"keyup",formEvent:"submit",lang:"en",message:"<div/>",messageAttr:"data-message",messageClass:"error",offset:[0,0],position:"center right",singleError:false,speed:"normal"},messages:{"*":{en:"Please correct this value"}},localize:function(a,b){e.each(b,function(c,k){h.messages[c]=h.messages[c]||{};h.messages[c][a]=k})},
localizeFn:function(a,b){h.messages[a]=h.messages[a]||{};e.extend(h.messages[a],b)},fn:function(a,b,c){if(e.isFunction(b))c=b;else{if(typeof b=="string")b={en:b};this.messages[a.key||a]=b}if(b=z.exec(a))a=y(b[1]);w.push([a,c])},addEffect:function(a,b,c){q[a]=[b,c]}};var w=[],q={"default":[function(a){var b=this.getConf();e.each(a,function(c,k){c=k.input;c.addClass(b.errorClass);var f=c.data("msg.el");if(!f){f=e(b.message).addClass(b.messageClass).appendTo(document.body);c.data("msg.el",f)}f.css({visibility:"hidden"}).find("p").remove();
e.each(k.messages,function(l,p){e("<p/>").html(p).appendTo(f)});f.outerWidth()==f.parent().width()&&f.add(f.find("p")).css({display:"inline"});k=t(c,f,b);f.css({visibility:"visible",position:"absolute",top:k.top,left:k.left}).fadeIn(b.speed)})},function(a){var b=this.getConf();a.removeClass(b.errorClass).each(function(){var c=e(this).data("msg.el");c&&c.css({visibility:"hidden"})})}]};e.each("email,url,number".split(","),function(a,b){e.expr[":"][b]=function(c){return c.getAttribute("type")===b}});
e.fn.oninvalid=function(a){return this[a?"bind":"trigger"]("OI",a)};h.fn(":email","Please enter a valid email address",function(a,b){return!b||B.test(b)});h.fn(":url","Please enter a valid URL",function(a,b){return!b||C.test(b)});h.fn(":number","Please enter a numeric value.",function(a,b){return A.test(b)});h.fn("[max]","Please enter a value smaller than $1",function(a,b){if(b===""||r&&a.is(":date"))return true;a=a.attr("max");return parseFloat(b)<=parseFloat(a)?true:[a]});h.fn("[min]","Please enter a value larger than $1",
function(a,b){if(b===""||r&&a.is(":date"))return true;a=a.attr("min");return parseFloat(b)>=parseFloat(a)?true:[a]});h.fn("[required]","Please complete this mandatory field.",function(a,b){if(a.is(":checkbox"))return a.is(":checked");return!!b});h.fn("[pattern]",function(a){var b=new RegExp("^"+a.attr("pattern")+"$");return b.test(a.val())});e.fn.validator=function(a){var b=this.data("validator");if(b){b.destroy();this.removeData("validator")}a=e.extend(true,{},h.conf,a);if(this.is("form"))return this.each(function(){var c=
e(this);b=new u(c.find(":input"),c,a);c.data("validator",b)});else{b=new u(this,this.eq(0).closest("form"),a);return this.data("validator",b)}}})(jQuery);




/*
 * Viewport - jQuery selectors for finding elements in viewport
 *
 * Copyright (c) 2008-2009 Mika Tuupola
 *
 * Licensed under the MIT license:
 *   http://www.opensource.org/licenses/mit-license.php
 *
 * Project home:
 *  http://www.appelsiini.net/projects/viewport
 *
 */
(function($) {

    "use strict";
    
    $.belowthefold = function(element, settings) {
        var fold = $(window).height() + $(window).scrollTop();
        return fold <= $(element).offset().top - settings.threshold;
    };

    $.abovethetop = function(element, settings) {
        var top = $(window).scrollTop();
        return top >= $(element).offset().top + $(element).height() - settings.threshold;
    };
    
    $.rightofscreen = function(element, settings) {
        var fold = $(window).width() + $(window).scrollLeft();
        return fold <= $(element).offset().left - settings.threshold;
    };
    
    $.leftofscreen = function(element, settings) {
        var left = $(window).scrollLeft();
        return left >= $(element).offset().left + $(element).width() - settings.threshold;
    };
    
    $.inviewport = function(element, settings) {
        return !$.rightofscreen(element, settings) && !$.leftofscreen(element, settings) && !$.belowthefold(element, settings) && !$.abovethetop(element, settings);
    };
    
    $.extend($.expr[':'], {
        "below-the-fold": function(a) {
            return $.belowthefold(a, {threshold : 0});
        },
        "above-the-top": function(a) {
            return $.abovethetop(a, {threshold : 0});
        },
        "left-of-screen": function(a) {
            return $.leftofscreen(a, {threshold : 0});
        },
        "right-of-screen": function(a) {
            return $.rightofscreen(a, {threshold : 0});
        },
        "in-viewport": function(a) {
            return $.inviewport(a, {threshold : 0});
        }
    });

    
})(jQuery);


/* 
 * Blur.js
 * Copyright Jacob Kelley
 * MIT License
 */
// Stackblur, courtesy of Mario Klingemann: http://www.quasimondo.com/StackBlurForCanvas/StackBlurDemo.html
(function(l){l.fn.blurjs=function(e){function O(){this.a=this.b=this.g=this.r=0;this.next=null}var y=document.createElement("canvas"),P=!1,H=l(this).selector.replace(/[^a-zA-Z0-9]/g,"");if(y.getContext){var e=l.extend({source:"body",radius:5,overlay:"",offset:{x:0,y:0},optClass:"",cache:!1,cacheKeyPrefix:"blurjs-",draggable:!1,debug:!1},e),R=[512,512,456,512,328,456,335,512,405,328,271,456,388,335,292,512,454,405,364,328,298,271,496,456,420,388,360,335,312,292,273,512,482,454,428,405,383,364,345,
328,312,298,284,271,259,496,475,456,437,420,404,388,374,360,347,335,323,312,302,292,282,273,265,512,497,482,468,454,441,428,417,405,394,383,373,364,354,345,337,328,320,312,305,298,291,284,278,271,265,259,507,496,485,475,465,456,446,437,428,420,412,404,396,388,381,374,367,360,354,347,341,335,329,323,318,312,307,302,297,292,287,282,278,273,269,265,261,512,505,497,489,482,475,468,461,454,447,441,435,428,422,417,411,405,399,394,389,383,378,373,368,364,359,354,350,345,341,337,332,328,324,320,316,312,309,
305,301,298,294,291,287,284,281,278,274,271,268,265,262,259,257,507,501,496,491,485,480,475,470,465,460,456,451,446,442,437,433,428,424,420,416,412,408,404,400,396,392,388,385,381,377,374,370,367,363,360,357,354,350,347,344,341,338,335,332,329,326,323,320,318,315,312,310,307,304,302,299,297,294,292,289,287,285,282,280,278,275,273,271,269,267,265,263,261,259],S=[9,11,12,13,13,14,14,15,15,15,15,16,16,16,16,17,17,17,17,17,17,17,18,18,18,18,18,18,18,18,18,19,19,19,19,19,19,19,19,19,19,19,19,19,19,20,
20,20,20,20,20,20,20,20,20,20,20,20,20,20,20,20,20,21,21,21,21,21,21,21,21,21,21,21,21,21,21,21,21,21,21,21,21,21,21,21,21,21,21,21,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,22,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,23,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,
24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24,24];return this.each(function(){var A=l(this),I=l(e.source),B=I.css("backgroundImage").replace(/"/g,"").replace(/url\(|\)$/ig,"");ctx=y.getContext("2d");tempImg=new Image;tempImg.onload=function(){if(P)j=tempImg.src;else{y.style.display="none";y.width=tempImg.width;y.height=tempImg.height;ctx.drawImage(tempImg,0,0);var j=y.width,q=y.height,k=e.radius;if(!(isNaN(k)||1>k)){var k=
k|0,M=y.getContext("2d"),l;try{try{l=M.getImageData(0,0,j,q)}catch(L){try{netscape.security.PrivilegeManager.enablePrivilege("UniversalBrowserRead"),l=M.getImageData(0,0,j,q)}catch(T){throw alert("Cannot access local image"),Error("unable to access local image data: "+T);}}}catch(U){throw alert("Cannot access image"),Error("unable to access image data: "+U);}var c=l.data,u,z,a,d,f,J,g,h,i,v,w,x,m,n,o,r,s,t,C;u=k+k+1;var K=j-1,N=q-1,p=k+1,D=p*(p+1)/2,E=new O,b=E;for(a=1;a<u;a++)if(b=b.next=new O,a==
p)var Q=b;b.next=E;b=a=null;J=f=0;var F=R[k],G=S[k];for(z=0;z<q;z++){m=n=o=g=h=i=0;v=p*(r=c[f]);w=p*(s=c[f+1]);x=p*(t=c[f+2]);g+=D*r;h+=D*s;i+=D*t;b=E;for(a=0;a<p;a++)b.r=r,b.g=s,b.b=t,b=b.next;for(a=1;a<p;a++)d=f+((K<a?K:a)<<2),g+=(b.r=r=c[d])*(C=p-a),h+=(b.g=s=c[d+1])*C,i+=(b.b=t=c[d+2])*C,m+=r,n+=s,o+=t,b=b.next;a=E;b=Q;for(u=0;u<j;u++)c[f]=g*F>>G,c[f+1]=h*F>>G,c[f+2]=i*F>>G,g-=v,h-=w,i-=x,v-=a.r,w-=a.g,x-=a.b,d=J+((d=u+k+1)<K?d:K)<<2,m+=a.r=c[d],n+=a.g=c[d+1],o+=a.b=c[d+2],g+=m,h+=n,i+=o,a=a.next,
v+=r=b.r,w+=s=b.g,x+=t=b.b,m-=r,n-=s,o-=t,b=b.next,f+=4;J+=j}for(u=0;u<j;u++){n=o=m=h=i=g=0;f=u<<2;v=p*(r=c[f]);w=p*(s=c[f+1]);x=p*(t=c[f+2]);g+=D*r;h+=D*s;i+=D*t;b=E;for(a=0;a<p;a++)b.r=r,b.g=s,b.b=t,b=b.next;d=j;for(a=1;a<=k;a++)f=d+u<<2,g+=(b.r=r=c[f])*(C=p-a),h+=(b.g=s=c[f+1])*C,i+=(b.b=t=c[f+2])*C,m+=r,n+=s,o+=t,b=b.next,a<N&&(d+=j);f=u;a=E;b=Q;for(z=0;z<q;z++)d=f<<2,c[d]=g*F>>G,c[d+1]=h*F>>G,c[d+2]=i*F>>G,g-=v,h-=w,i-=x,v-=a.r,w-=a.g,x-=a.b,d=u+((d=z+p)<N?d:N)*j<<2,g+=m+=a.r=c[d],h+=n+=a.g=
c[d+1],i+=o+=a.b=c[d+2],a=a.next,v+=r=b.r,w+=s=b.g,x+=t=b.b,m-=r,n-=s,o-=t,b=b.next,f+=j}M.putImageData(l,0,0)}if(!1!=e.overlay)ctx.beginPath(),ctx.rect(0,0,tempImg.width,tempImg.width),ctx.fillStyle=e.overlay,ctx.fill();var j=y.toDataURL();if(e.cache)try{e.debug&&console.log("Cache Set"),localStorage.setItem(e.cacheKeyPrefix+H+"-"+B+"-data-image",j)}catch(V){console.log(V)}}q=I.css("backgroundAttachment");k="fixed"==q?"":"-"+(A.offset().left-I.offset().left-e.offset.x)+"px -"+(A.offset().top-I.offset().top-
e.offset.y)+"px";A.css({"background-image":'url("'+j+'")',"background-repeat":I.css("backgroundRepeat"),"background-position":k,"background-attachment":q});!1!=e.optClass&&A.addClass(e.optClass);e.draggable&&(A.css({"background-attachment":"fixed","background-position":"0 0"}),A.draggable())};Storage.prototype.cacheChecksum=function(j){var q="",k;for(k in j)var l=j[k],q="[object Object]"==l.toString()?q+(l.x.toString()+l.y.toString()+",").replace(/[^a-zA-Z0-9]/g,""):q+(l+",").replace(/[^a-zA-Z0-9]/g,
"");this.getItem(e.cacheKeyPrefix+H+"-"+B+"-options-cache")!=q&&(this.removeItem(e.cacheKeyPrefix+H+"-"+B+"-options-cache"),this.setItem(e.cacheKeyPrefix+H+"-"+B+"-options-cache",q),e.debug&&console.log("Settings Changed, Cache Emptied"))};var L=null;e.cache&&(localStorage.cacheChecksum(e),L=localStorage.getItem(e.cacheKeyPrefix+H+"-"+B+"-data-image"));null!=L?(e.debug&&console.log("Cache Used"),P=!0,tempImg.src=L):(e.debug&&console.log("Source Used"),tempImg.src=B)})}}})(jQuery);



/*
 * jQuery Easing v1.3 - http://gsgd.co.uk/sandbox/jquery/easing/
 *
*/
jQuery.easing["jswing"]=jQuery.easing["swing"];jQuery.extend(jQuery.easing,{def:"easeOutQuad",swing:function(a,b,c,d,e){return jQuery.easing[jQuery.easing.def](a,b,c,d,e)},easeInQuad:function(a,b,c,d,e){return d*(b/=e)*b+c},easeOutQuad:function(a,b,c,d,e){return-d*(b/=e)*(b-2)+c},easeInOutQuad:function(a,b,c,d,e){if((b/=e/2)<1)return d/2*b*b+c;return-d/2*(--b*(b-2)-1)+c},easeInCubic:function(a,b,c,d,e){return d*(b/=e)*b*b+c},easeOutCubic:function(a,b,c,d,e){return d*((b=b/e-1)*b*b+1)+c},easeInOutCubic:function(a,b,c,d,e){if((b/=e/2)<1)return d/2*b*b*b+c;return d/2*((b-=2)*b*b+2)+c},easeInQuart:function(a,b,c,d,e){return d*(b/=e)*b*b*b+c},easeOutQuart:function(a,b,c,d,e){return-d*((b=b/e-1)*b*b*b-1)+c},easeInOutQuart:function(a,b,c,d,e){if((b/=e/2)<1)return d/2*b*b*b*b+c;return-d/2*((b-=2)*b*b*b-2)+c},easeInQuint:function(a,b,c,d,e){return d*(b/=e)*b*b*b*b+c},easeOutQuint:function(a,b,c,d,e){return d*((b=b/e-1)*b*b*b*b+1)+c},easeInOutQuint:function(a,b,c,d,e){if((b/=e/2)<1)return d/2*b*b*b*b*b+c;return d/2*((b-=2)*b*b*b*b+2)+c},easeInSine:function(a,b,c,d,e){return-d*Math.cos(b/e*(Math.PI/2))+d+c},easeOutSine:function(a,b,c,d,e){return d*Math.sin(b/e*(Math.PI/2))+c},easeInOutSine:function(a,b,c,d,e){return-d/2*(Math.cos(Math.PI*b/e)-1)+c},easeInExpo:function(a,b,c,d,e){return b==0?c:d*Math.pow(2,10*(b/e-1))+c},easeOutExpo:function(a,b,c,d,e){return b==e?c+d:d*(-Math.pow(2,-10*b/e)+1)+c},easeInOutExpo:function(a,b,c,d,e){if(b==0)return c;if(b==e)return c+d;if((b/=e/2)<1)return d/2*Math.pow(2,10*(b-1))+c;return d/2*(-Math.pow(2,-10*--b)+2)+c},easeInCirc:function(a,b,c,d,e){return-d*(Math.sqrt(1-(b/=e)*b)-1)+c},easeOutCirc:function(a,b,c,d,e){return d*Math.sqrt(1-(b=b/e-1)*b)+c},easeInOutCirc:function(a,b,c,d,e){if((b/=e/2)<1)return-d/2*(Math.sqrt(1-b*b)-1)+c;return d/2*(Math.sqrt(1-(b-=2)*b)+1)+c},easeInElastic:function(a,b,c,d,e){var f=1.70158;var g=0;var h=d;if(b==0)return c;if((b/=e)==1)return c+d;if(!g)g=e*.3;if(h<Math.abs(d)){h=d;var f=g/4}else var f=g/(2*Math.PI)*Math.asin(d/h);return-(h*Math.pow(2,10*(b-=1))*Math.sin((b*e-f)*2*Math.PI/g))+c},easeOutElastic:function(a,b,c,d,e){var f=1.70158;var g=0;var h=d;if(b==0)return c;if((b/=e)==1)return c+d;if(!g)g=e*.3;if(h<Math.abs(d)){h=d;var f=g/4}else var f=g/(2*Math.PI)*Math.asin(d/h);return h*Math.pow(2,-10*b)*Math.sin((b*e-f)*2*Math.PI/g)+d+c},easeInOutElastic:function(a,b,c,d,e){var f=1.70158;var g=0;var h=d;if(b==0)return c;if((b/=e/2)==2)return c+d;if(!g)g=e*.3*1.5;if(h<Math.abs(d)){h=d;var f=g/4}else var f=g/(2*Math.PI)*Math.asin(d/h);if(b<1)return-.5*h*Math.pow(2,10*(b-=1))*Math.sin((b*e-f)*2*Math.PI/g)+c;return h*Math.pow(2,-10*(b-=1))*Math.sin((b*e-f)*2*Math.PI/g)*.5+d+c},easeInBack:function(a,b,c,d,e,f){if(f==undefined)f=1.70158;return d*(b/=e)*b*((f+1)*b-f)+c},easeOutBack:function(a,b,c,d,e,f){if(f==undefined)f=1.70158;return d*((b=b/e-1)*b*((f+1)*b+f)+1)+c},easeInOutBack:function(a,b,c,d,e,f){if(f==undefined)f=1.70158;if((b/=e/2)<1)return d/2*b*b*(((f*=1.525)+1)*b-f)+c;return d/2*((b-=2)*b*(((f*=1.525)+1)*b+f)+2)+c},easeInBounce:function(a,b,c,d,e){return d-jQuery.easing.easeOutBounce(a,e-b,0,d,e)+c},easeOutBounce:function(a,b,c,d,e){if((b/=e)<1/2.75){return d*7.5625*b*b+c}else if(b<2/2.75){return d*(7.5625*(b-=1.5/2.75)*b+.75)+c}else if(b<2.5/2.75){return d*(7.5625*(b-=2.25/2.75)*b+.9375)+c}else{return d*(7.5625*(b-=2.625/2.75)*b+.984375)+c}},easeInOutBounce:function(a,b,c,d,e){if(b<e/2)return jQuery.easing.easeInBounce(a,b*2,0,d,e)*.5+c;return jQuery.easing.easeOutBounce(a,b*2-e,0,d,e)*.5+d*.5+c}})
