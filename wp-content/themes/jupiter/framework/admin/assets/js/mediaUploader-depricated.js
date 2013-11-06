var theme = {
	themeOptionGetImage : function(attachment_id,target){
		jQuery.post(ajaxurl, {
			action:'theme-option-get-image',
			id: attachment_id, 
			cookie: encodeURIComponent(document.cookie)
		}, function(src){
			if ( src == '0' ) {
				alert( 'Could not use this image. Try a different attachment.' );
			} else {
				jQuery("#"+target).val(src);
				jQuery("#"+target+"-preview").find('img').attr('src',src);
			}
		});
	}
}