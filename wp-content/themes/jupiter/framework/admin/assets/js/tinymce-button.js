(function() {  
    tinymce.create('tinymce.plugins.mk_shortcode_button', {
        init : function(ed, url) {  
            icon_url = url;
        },    
        createControl : function(n, cm) {
            switch(n) {
                case 'mk_shortcode_button':
                    var c = cm.createSplitButton('mk_shortcode_button', {
                        title : 'Jupiter Shortcodes',
                        image : icon_url+'/masterkey-admin-icon.png'
                    }); 

                    c.onRenderMenu.add(function(c, m) {
                        m.add({
                            title : 'Shortcodes',
                            'class' : 'mceMenuItemTitle'
                        }).setDisabled(1);

                        m.add({
                            title : 'Fancy Title',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent('[mk_fancy_title tag_name="h2" style="false" color="#393836" size="14" font_weight="inhert" margin_top="0" margin_bottom="18" font_family="none" align="left"]Text Goes Here[/mk_fancy_title]');
                            }
                        });

                        m.add({
                            title : 'Dropcaps',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent('[mk_dropcaps content="...." style="simple-style"]');
                            }
                        });

                        m.add({
                            title : 'Text Highlight',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent('[mk_highlight text="Text Goes Here" text_color="#666666" bg_color="#ffcc00" font_family="none"]');
                            }
                        });
                        m.add({
                            title : 'Tooltip',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent('[mk_tooltip text="Text Goes Here" tooltip_text="Tooltip Text Goes Here" href="#"]');
                            }
                        });
                        m.add({
                            title : 'Custom List',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent('[mk_custom_list style="e26a" icon_color="#0bb697" margin_bottom="30"]<ul><li>List Item</li><li>List Item</li><li>List Item</li></ul>[/mk_custom_list]');
                            }
                        });
                        m.add({
                            title : 'Divider',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent('[mk_divider style="double_dot" divider_width="full_width" margin_top="20" margin_bottom="20"]');
                            }
                        });
                        m.add({
                            title : 'Mini Callout Box',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent('[mk_mini_callout title="..." button_text="...." button_url="#"]...[/mk_mini_callout]');
                            }
                        });
                        m.add({
                            title : 'Button',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent('[mk_button dimension="three" size="medium" bg_color="#0bb697" text_color="light" target="_self" align="left" margin_top="0" margin_bottom="15"]Button Text[/mk_button]');
                            }
                        });
                        m.add({
                            title : 'Blockquote',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent('[mk_blockquote style="quote-style" font_family="none" text_size="18" align="right"]Quote Text Goes Here[/mk_blockquote]');
                            }
                        });
                        m.add({
                            title : 'Message Box',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent('[mk_message_box type="confirm-message"]Message Box Content[/mk_message_box]');
                            }
                        });
                        m.add({
                            title : 'Icon Box',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent('[mk_icon_box title="Title goes here" text_size="16" font_weight="inhert" read_more_txt="Learn More" read_more_url="#" icon="moon-tongue" style="simple_minimal" icon_size="small" icon_location="left" circled="false" icon_color="#ffffff" icon_circle_color="#0bb697" box_blur="false" margin="30"]description....[/mk_icon_box]');
                            }
                        });
                        m.add({
                            title : 'Toggle',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent('[mk_toggle style="fancy" title="Title goes here" icon="moon-arrow-right-2"]Description...[/mk_toggle]');
                            }
                        });
                        m.add({
                            title : 'Font Icon',
                            onclick : function() {
                                tinyMCE.activeEditor.selection.setContent('[mk_font_icons icon="moon-bubble-dots-3" color="#8f8f8f" size="x-large" padding_horizental="4" padding_vertical="4" circle="true" circle_color="#00b7ff" align="none"]');
                            }
                        });

 
 
   
                    });
                  return c;
            }

            return null;
        },  
    });  
    tinymce.PluginManager.add('mk_shortcode_button', tinymce.plugins.mk_shortcode_button);  
})();

   