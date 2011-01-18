 BBCode Plugin v1.0 for CKEditor - http://www.site-top.com/
 Copyright (C) 2010 PitBult, 16 April 2010
  
/*
 *  GNU Lesser General Public License Version 2.1 or later (the "LGPL")
 *  http://www.gnu.org/licenses/lgpl.html
 */
 
PLUGIN HAS BEEN TESTED ON THE: 
	CKEditor 3.2.1, released on 9 April 2010

DOWNLOAD latest CKEditor: 
	http://ckeditor.com/download/
 
INSTALLING THE PLUGIN:
	1. Extract archive "CKEditor_bbcode.zip";
 	2. Copy folder "bbcode" in "CKEditor folder" + "/plugins/";
	3. To test, open the HTML "bbcode/_sample/sample.html";
	4. Enjoy!
	
CONFIGURATION:
	1. Edit Toolbar config: "bbcode/_sample/bbcode.config.js";
	2. Add, Edit, delete the rules of regular expressions: "bbcode/plugin.js";
	
HTML Code and JavaScript EXAMPLE ("bbcode/_sample/sample.html"):

	<form method="post" target="_blank">
		<textarea cols="80" id="editor1" name="editor1" rows="10">
			Text: [b]Bold text[/b]
			Text: [i]Italic text[/i]
			Text: [u]Underline text[/u]
			Color: [color=#ff0000]Some color[/color]
			
			Code: [code]Some code text[/code]
			Quote: [quote]Some quote text[/quote]
			
			Url1: [url]http://www.site.md[/url]
			Url2: [url=http://site-top.com/]Site-Top[/url]
			Img: [img]http://yiiframework.ru/forum/styles/prosilver/imageset/yii_logo.png[/img]
			
			Simple text.
		</textarea>

		<script type="text/javascript">
		//<![CDATA[
			var sBasePath = document.location.pathname.substring(0,document.location.pathname.lastIndexOf('plugins')) ;
			// Replace the <textarea id="editor1"> with an CKEditor instance.
			var CKeditor = CKEDITOR.replace( 'editor1', { 
											customConfig : sBasePath + 'plugins/bbcode/_sample/bbcode.config.js'
									}  );

		//]]>
		</script>
		
		<br />
		<input type="submit" value="Submit" />
	</form>