jQuery(document).ready(function($){jQuery('#nav li').has('ul').addClass("submenu");jQuery("ul#menu-top-menu > li").first().addClass("first");jQuery("ul#menu-top-menu > li").last().addClass("last");jQuery("div.big_thumb").last().addClass("last");var config={sensitivity:1,interval:0,over:addingClass,timeout:300,out:removingClass};jQuery('#nav .submenu').hoverIntent(config);var theWindow=jQuery(window),$bg=jQuery("#bg"),aspectRatio=$bg.width()/$bg.height();function resizeBg(){if((theWindow.width()/theWindow.height())<aspectRatio){$bg.removeClass().addClass('bgheight');}else{$bg.removeClass().addClass('bgwidth');}}$("#menu-top-menu").tinyNav({header:'Choose Menu'});theWindow.resize(resizeBg).trigger("resize");jQuery('#tab-container').easytabs();jQuery('div.mc_merge_var input#mc_mv_FNAME').val("Your Name");jQuery('div.mc_merge_var input#mc_mv_EMAIL').val("Email address");jQuery('#mc_mv_FNAME').focus(function(){if(this.value=='Your Name'){this.value=''}});jQuery('#mc_mv_FNAME').blur(function(){if(this.value==''){this.value='Your Name'}});jQuery('#mc_mv_EMAIL').focus(function(){if(this.value=='Email address'){this.value=''}});jQuery('#mc_mv_EMAIL').blur(function(){if(this.value==''){this.value='Email address'}});jQuery(function(){jQuery.each(jQuery('li.current-menu-item li a'),function(count){var link="<p class='menu_"+count+"'><a href='"+this+"'>"+jQuery(this).html()+"</a></p>";jQuery('#left_sidebar').append(link);});});});function addingClass(){jQuery(this).addClass("hovered");}function removingClass(){jQuery(this).removeClass("hovered");}