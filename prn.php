<?php
/*
Plugin Name: Pending Review Notification
Plugin URI: 
Description: Display a notification about "Pending Review Posts" on your Dashboard.
Version: 0.1
Author: Dortich
Author URI:
min WP Version: 2.8

   LICENCE
 
    Copyright 2009  Torsten Demmich  (email : dortich@dortich.de)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

/*

/*
 *  Error Reporting
 */
//error_reporting(E_ALL);

// textdomain
load_plugin_textdomain('prn', 'wp-content/plugins/pendingreviewnotification/');

function prn_widget_function()
{
	global $wpdb, $table_prefix;
	$prn = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->posts WHERE post_status = 'pending'");
	if ($prn == '0')
	{
		echo $prn . " " . __('Pending Review');
	}
	else
	{ ?>
		<span style="color:red;"><?php echo $prn . " " . __('Pending Review'); ?></span>
	<?php }
}

function prn_widget_setup()
{
	wp_add_dashboard_widget('prn_widget_function', __('Pending Review'), 'prn_widget_function');
}
add_action('wp_dashboard_setup', 'prn_widget_setup');
?>