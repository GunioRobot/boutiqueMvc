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
        ['Source','Font','FontSize'],
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
	


};
