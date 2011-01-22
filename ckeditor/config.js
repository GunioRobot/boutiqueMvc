/*
Copyright (c) 2003-2010, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function( config )
{
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
            config.toolbar = 'Simple';
            

    config.toolbar_Simple =
    [
        ['Font','FontSize'],
        ['Bold','Italic','Strike'],
        ['TextColor','BGColor'],
        ['NumberedList','BulletedList','-','Blockquote'],
        
        
        '/',
        ['NewPage','Preview'],
        ['SpellChecker','Scayt'],
        ['Undo','Redo'],
        ['Link','Unlink'],
        ['Image','Flash','HorizontalRule','Smiley','SpecialChar','PageBreak'],
        ['Maximize']
        
        
    ];

    CKEDITOR.config.toolbar_News =
[
	['Source', 'NewPage','Preview','Templates'],
	['Cut','Copy','Paste','PasteText','PasteFromWord','-','SpellChecker', 'Scayt'],
	['Undo','Redo','-','Find','Replace','RemoveFormat'], ['Maximize', 'ShowBlocks'],
	'/',
	['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
	['NumberedList','BulletedList','-','Outdent','Indent','Blockquote','CreateDiv'],
	['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
	['Link','Unlink','Anchor'],
	['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak','Iframe'],
	'/',
	['Styles','Font','FontSize'],
	['TextColor','BGColor'],
	
];
	


};
