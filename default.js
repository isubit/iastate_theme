/**
 * @license Copyright (c) 2003-2019, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or https://ckeditor.com/legal/ckeditor-oss-license
 */

// Register a templates definition set named "default".
CKEDITOR.addTemplates( 'default', {
	// The name of sub folder which hold the shortcut preview images of the
	// templates.
	imagesPath: CKEDITOR.getUrl( CKEDITOR.plugins.getPath( 'templates' ) + 'templates/images/' ),

	// The templates definitions.
	templates: [ {
		title: 'Left Column Template',
		image: 'template1.gif',
		description: 'One main image with a title and text that surround the image.',
		html: 
			'<div class="row two-col-left">'+
				'<div class="col-md-3 col-sidebar">'+
					'<p>'+
						'<img alt="Winter Image" data-entity-type="file" data-entity-uuid="975b7a57-1a51-4e57-80d9-f570e6b72f3c" src="/test/sites/default/files/inline-images/1%20%281%29.png">'+
					'</p>'+
				'</div>'+
				'<div class ="col-md-9 col-main">'+
					'<h2>Left Column Template</h2>'+
						'<p>'+
							'This is the left column template.  Image can be deleted on left-hand side to put text instead if you wanted.'+
						'</p>'+
						'<p>'+
							'Could use it as a call to action and make it really stand out, or it could be used just for easier editing for our content editors, without them having to do any padding or anything.  Also need to verify that this will work with the image resize filter, so that the image is resized upon insertion.  Will need to test as well with the media module if we decide to use that.'+
						'</p>'+
				'</div>'+
			'</div>'
	},
	{
		title: 'Strange Template',
		image: 'template2.gif',
		description: 'A template that defines two columns, each one with a title, and some text.',
		html: '<table cellspacing="0" cellpadding="0" style="width:100%" border="0">' +
			'<tr>' +
				'<td style="width:50%">' +
					'<h3>Title 1</h3>' +
				'</td>' +
				'<td></td>' +
				'<td style="width:50%">' +
					'<h3>Title 2</h3>' +
				'</td>' +
			'</tr>' +
			'<tr>' +
				'<td>' +
					'Text 1' +
				'</td>' +
				'<td></td>' +
				'<td>' +
					'Text 2' +
				'</td>' +
			'</tr>' +
			'</table>' +
			'<p>' +
			'More text goes here.' +
			'</p>'
	},
	{
		title: 'Text and Table',
		image: 'template3.gif',
		description: 'A title with some text and a table.',
		html: '<div style="width: 80%">' +
			'<h3>' +
				'Title goes here' +
			'</h3>' +
			'<table style="width:150px;float: right" cellspacing="0" cellpadding="0" border="1">' +
				'<caption style="border:solid 1px black">' +
					'<strong>Table title</strong>' +
				'</caption>' +
				'<tr>' +
					'<td>&nbsp;</td>' +
					'<td>&nbsp;</td>' +
					'<td>&nbsp;</td>' +
				'</tr>' +
				'<tr>' +
					'<td>&nbsp;</td>' +
					'<td>&nbsp;</td>' +
					'<td>&nbsp;</td>' +
				'</tr>' +
				'<tr>' +
					'<td>&nbsp;</td>' +
					'<td>&nbsp;</td>' +
					'<td>&nbsp;</td>' +
				'</tr>' +
			'</table>' +
			'<p>' +
				'Type the text here' +
			'</p>' +
			'</div>'
	} ]
} );
