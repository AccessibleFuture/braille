<?php

/*
Plugin Name: Reprint
Plugin URI: http://www.wordpress.org
Description: Takes post text bracketed by shortcode and reprints on screen.
Version: 1.0
Author: Amanda Visconti (literaturegeek)
Author URI: http://literaturegeek.com
License: GNU
*/

/*  Copyright 2012  Amanda Visconti (@literature_geek)
This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License, version 2, as published by the Free Software Foundation. This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details. You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

// Admin stuff starts here (set up plugin, add menu item, empty config page)

// Pulls any CSS you've added to the css/reprint.css file
function avreprint_css() {
        echo '<link type="text/css" rel="stylesheet" href="' . plugins_url( 'css/reprint.css', __FILE__ ) . '" />' . "\n";
}

// Add a menu item for the plugin and test for authority
add_action( 'admin_menu', 'avreprint_menu' );

function avreprint_menu() {
    add_options_page( 'avreprint Options', 'avreprint', 'manage_options', 'avreprint', 'avreprint_options' );
}

function avreprint_options() {
    if ( !current_user_can( 'manage_options' ) )  {
        wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
    }
}

// create custom plugin settings menu
add_action('admin_menu', 'avreprint_create_menu');

function avreprint_create_menu() {

//create new top-level menu
	add_menu_page('avreprint Plugin Settings', 'Reprint Settings', 'administrator', __FILE__, 'avreprint_settings_page',plugins_url('/images/icon.png', __FILE__));
}

function avreprint_settings_page() {
// Appearance of settings page
echo '<div class="wrap">
	<h2>Reprint Plugin Options</h2>
	<form method="post" action="options.php">
  		<p>Option config will appear here.</p>
    	    	<?php submit_button(); ?>
	</form>
</div>';
}

// End admin code, begin main plugin function code
// Take text wrapped in [reprint] shortcode and reprint it somewhere on screen

function getavreprint( $atts, $content = null ) {
// Wrap in CSS class to style
		$content = wpautop(trim($content));
        return '<div class="avreprint">'. do_shortcode($content) .'</div>';
}

// Allow [reprint][/reprint] shortcode
add_shortcode('reprint', 'getavreprint');

// Add the CSS file to the header when the page loads
add_action('wp_head', 'avreprint_css');

// TinyMCE button, or only as extra? (see PullQuote plugin as example)
// Allow uninstall

?>