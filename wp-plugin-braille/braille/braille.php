<?php

/*
Plugin Name: Braille
Plugin URI: http://umd-mith.github.com/braille/
Description: Takes post text bracketed by shortcode and reprints on screen.
Version: 1.0
Author: University of Maryland, Maryland Institute for Technology in the Humanities
Author URI: http://mith.umd.edu/
Contributer: Amanda Visconti (literaturegeek)
Contributer URI: http://literaturegeek.com
License: GNU
*/

/*  
Copyright 2012  University of Maryland

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License, version 2, as published by the Free Software Foundation. This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details. You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

// Admin stuff starts here (set up plugin, add menu item, empty config page)

function braille_css() {
  echo "<link type='text/css' rel='stylesheet' href='" 
     . plugins_url( 'css/braille.css', __FILE__ ) 
     . "' />\n"
     ;
}

// Add a menu item for the plugin and test for authority
add_action( 'admin_menu', 'braille_admin_menu' );

function braille_admin_menu() {
  add_options_page(
    'Braille Plugin Options',
    'Braille Plugin',
    'manage_options',
    'edu-umd-mith-braille',
    'braille_settings_page'
  );
}

function braille_settings_page() {
  if ( !current_user_can( 'manage_options' ) )  {
    wp_die(
      __( 'You do not have sufficient permissions to access this page.' )
    );
  }

  if( isset( $_POST["update_braille_settings"] ) 
   && $_POST["update_braille_settings"] == 'Y' ) {
	update_option( "braille_use_remote", $_POST["braille_use_remote"] );
	update_option( "braille_local_path", $_POST["braille_local_path"] );
	update_option( "braille_remote_url", $_POST["braille_remote_url"] );
	?>
	<div class="updated">
      <p><strong><?php _e('settings save.', 'braille' ); ?></strong></p>
    </div>
    <?php
  }

  // Read in current option settings

  $use_remote = get_option("braille_use_remote");
  $local_path = get_option("braille_local_path");
  $remote_url = get_option("braille_remote_url");

  // Appearance of settings page
?>
  <div class="wrap">
    <h2><?php echo __( "Braille Plugin Options", "braille" ); ?></h2>
    <form method="POST" action="">
	  <input type="hidden" name="update_braille_settings" value="Y">
      <p>
        <input type="checkbox" name="braille_use_remote"<?php
           echo $use_remote ? " checked" : "";
        ?>>
        <?php echo _e( "Use remote LibLouis service" ); ?>
      </p>
      <p>
        <?php echo _e( "Path to local xml2brl program") ?>
        <input type="text" name="braille_local_path"
               value="<?php echo $local_path; ?>">
      </p>
      <p>
        <?php echo _e( "URL for remote LibLouis service")?>
        <input type="text" name="braille_remote_url"
               value="<?php echo $remote_url; ?>">
      </p>
      <hr />
      <p class="submit">
        <input type="submit" name="Submit" class="button-primary"
               value="<?php esc_attr_e('Save Changes') ?>"/>
      </p>
    <form>
  </div>
<?php
}

// End admin code, begin main plugin function code
// Take text wrapped in [braille] shortcode and reprint it somewhere on screen

function get_braille( $atts, $content = null ) {
  // Wrap in CSS class to style
  $content = do_shortcode( wpautop( trim( $content ) ) );
  $use_remote = get_option("braille_use_remote");
  $local_path = get_option("braille_local_path");
  $remote_url = get_option("braille_remote_url");

  return "<div class='braille'>"
       . $content
       . "</div>"
       ;
}

// Allow [braille][/braille] shortcode
add_shortcode( 'braille', 'get_braille' );

// Add the CSS file to the header when the page loads
add_action( 'wp_head', 'braille_css' );

// TinyMCE button, or only as extra? (see PullQuote plugin as example)
// Allow uninstall

?>