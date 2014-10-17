<?php
/*
Plugin Name: jogFullscreenWidth
Plugin URI: http://rufnex.de/en/wordpress/wordpress-jogfullscreenwidth/
Description: jogFullscreenWidth adds a input field to change the editarea width, next to the toolbar buttons at the fullscreen view.
Author: Johannes Gamperl
Version: 1.1
Author URI: http://rufnex.de
*/

if ( !class_exists('jogFullscreenWidth') ):

class jogFullscreenWidth 
{
	/**
	 * Setup the object
	 *
	 * @param $options An array of options for this object
	 */
	function __construct( $options = array() ) 
	{
		add_action('admin_head', array($this, 'add_field'));
	}
	
	
	/**
	 * Add the input field to the fullscreen toolbar
	 * @return JavaScript
	 */
	public function add_field() {
	
		// Capabilities check
		if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
		{
			return;
		}
		echo '
			<script type="text/javascript">
			;(function($){
				$(function()
				{
					$(\'<div style="padding:6px;"><span>Edit width: <input id="jog_fullscreen_width" name="value" style="width:40px;border:1px solid #ccc;" placeholder=" 647" /></span></div>\').appendTo(\'#wp-fullscreen-buttons\');
					$(\'#jog_fullscreen_width\').blur(function(){ $(\'#wp-content-editor-container\',\'#wp-fullscreen-title\').css("width", $(this).val()+\'px\'); });
				});	
			}(jQuery));
			</script>
		';
	}
}



$jogFullscreenWidth = new jogFullscreenWidth();

endif; // class_exists