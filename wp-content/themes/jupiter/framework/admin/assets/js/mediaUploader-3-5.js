function mk_option_option() {
  var _custom_media = true,
      _orig_send_attachment = wp.media.editor.send.attachment;
  jQuery('.option-upload-button').click(function(e) {
    var send_attachment_bkp = wp.media.editor.send.attachment;
    var button = jQuery(this);
    var id = button.attr('id').replace('_button', '');
    _custom_media = true;
    wp.media.editor.send.attachment = function(props, attachment){
      if ( _custom_media ) {
        jQuery("#"+id).val(attachment.url);
        jQuery("#"+id+"-preview img").attr("src", attachment.url);
      } else {
        return _orig_send_attachment.apply( this, [props, attachment] );
      };
    }
    wp.media.editor.open(button);
    return false;
  });
  jQuery('.add_media').on('click', function(){
    _custom_media = false;
  });
}


jQuery(document).ready(function() {
  mk_option_option();
});