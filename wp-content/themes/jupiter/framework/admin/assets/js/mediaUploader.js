/* 
**
Image uploader send image to input
-------------------------------------------------------------*/


 var mediaUploader = {
	OptionUploaderUseThisImage : function(id,target){
		var win = window.dialogArguments || opener || parent || top;

		win.theme.themeOptionGetImage(id,target);
		win.tb_remove();
	}
}