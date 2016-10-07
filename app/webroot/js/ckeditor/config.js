/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

//CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
//};

CKEDITOR.editorConfig = function( config )
{
    config.uiColor = '#605ca8';
    CKEDITOR.config.protectedSource.push(/<\?[\s\S]*?\?>/g);
    
   config.filebrowserBrowseUrl = '/server/cake/vssuweb/js/kcfinder/browse.php?type=files';
   config.filebrowserImageBrowseUrl = '/server/cake/vssuweb/js/kcfinder/browse.php?type=images';
   config.filebrowserFlashBrowseUrl = '/server/cake/vssuweb/js/kcfinder/browse.php?type=flash';
   config.filebrowserUploadUrl = '/server/cake/vssuweb/js/kcfinder/upload.php?type=files';
   config.filebrowserImageUploadUrl = '/server/cake/vssuweb/js/kcfinder/upload.php?type=images';
   config.filebrowserFlashUploadUrl = '/server/cake/vssuweb/js/kcfinder/upload.php?type=flash';
};
