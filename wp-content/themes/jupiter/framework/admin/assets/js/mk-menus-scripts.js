
function mk_menus_icon_selector() {
	jQuery('.mk-visual-selector').find('a').each(function() {
		default_value = jQuery(this).siblings('input').val();
		if(jQuery(this).attr('rel')==default_value){
				jQuery(this).addClass('current');
			}
			jQuery(this).click(function(){

				jQuery(this).siblings('input').val(jQuery(this).attr('rel'));
				jQuery(this).parent('.mk-visual-selector').find('.current').removeClass('current');
				jQuery(this).addClass('current');
				return false;
			})
	});
}
mk_menus_icon_selector();

function mk_use_icon() {

	jQuery('.mk-add-icon-btn').on('click', function() {

		this_el_id = "#edit-menu-item-menu-icon-" + jQuery(this).attr('data-id');
		icon_el_id = "#mk-view-icon-" + jQuery(this).attr('data-id');
		//console.log(this_el_id);

		jQuery('.mk-icon-use-this').on('click', function() {
			icon_value = jQuery('#mk-icon-value-holder').val();
			if(icon_value == '') {
				jQuery(icon_el_id).attr("class", "");
				jQuery(this_el_id).val("");
			} else {
				jQuery(icon_el_id).attr("class", icon_value);
				jQuery(this_el_id).val(icon_value);
			}
			
			window.parent.tb_remove();
			return false;
		});
	});

	jQuery('.mk-remove-icon').on('click', function() {
		jQuery(this).siblings('input').val('');
		jQuery(this).siblings('i').attr('class', '');
		return false;

	});

}
mk_use_icon();