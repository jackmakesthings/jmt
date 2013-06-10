/*
* Copyright (C) 2009 Joel Sutherland.
* Liscenced under the MIT liscense
*/

(function(jQuery) {
	jQuery.fn.filterable = function(settings) {
		settings = jQuery.extend({
			useHash: false,
			animationSpeed: 400,
			reset: { opacity: '0.6' },
			show: { opacity: '0.6'},
			hide: { opacity: '0.1' },
			useTags: true,
			tagSelector: '.sorting a',
			selectedTagClass: 'current',
			allTag: 'all'
		}, settings);
		
		return jQuery(this).each(function(){
		
			/* FILTER: select a tag and filter */
			jQuery(this).bind("filter", function( e, tagToShow ){
				if(settings.useTags){
					jQuery(settings.tagSelector).removeClass(settings.selectedTagClass);
					jQuery(settings.tagSelector + '[href=' + tagToShow + ']').addClass(settings.selectedTagClass);
				}
				jQuery(this).trigger("filterportfolio", [ tagToShow.substr(1) ]);
			});
		
			/* FILTERPORTFOLIO: pass in a class to show, all others will be hidden */
			jQuery(this).bind("filterportfolio", function( e, classToShow ){
				if(classToShow == settings.allTag){
					jQuery(this).trigger("reset");
				}else{
					jQuery(this).trigger("show", [ '.' + classToShow ] );
					jQuery(this).trigger("hide", [ ':not(.' + classToShow + ')' ] );
				}
				if(settings.useHash){
					location.hash = '#' + classToShow;
				}
			});
			
			/* SHOW: show a single class*/
			jQuery(this).bind("show", function( e, selectorToShow ){
				jQuery(this).children(selectorToShow).animate(settings.show, settings.animationSpeed).addClass("active");
			});
			
			/* SHOW: hide a single class*/
			jQuery(this).bind("hide", function( e, selectorToHide ){
				jQuery(this).children(selectorToHide).animate(settings.hide, settings.animationSpeed).removeClass("active");	
			});
			
			jQuery(this).bind("reset", function( e, selectorToShow ){
				jQuery(this).children(selectorToShow).animate(settings.reset, settings.animationSpeed);
			});
			
			/* ============ Check URL Hash ====================*/
			if(settings.useHash){
				if(location.hash != '')
					jQuery(this).trigger("filter", [ location.hash ]);
				else
					jQuery(this).trigger("filter", [ '#' + settings.allTag ]);
			}
			
			/* ============ Setup Tags ====================*/
			if(settings.useTags){
				jQuery(settings.tagSelector).click(function(){
					jQuery('#grid-content').trigger("filter", [ jQuery(this).attr('href') ]);
					
					jQuery(settings.tagSelector).removeClass('current');
					jQuery(this).addClass('current');
				});
			}
		});
	}
})(jQuery);
