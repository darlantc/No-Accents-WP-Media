<?php
/*
 Plugin Name: No Accents WP Media
 Version: 1.0
 Plugin URI: https://github.com/darlantc/No-Accents-WP-Media
 Description: Sanitize the filename of uploaded media in WordPress removing accents and all weird characters
 Author: Darlan ten Caten
 Author URI: http://www.i9solucoesdigitais.com.br
 ----

 /**
 * Released under the GPL license
 * http://www.opensource.org/licenses/gpl-license.php
 *
 * This is an add-on for WordPress
 * http://wordpress.org/
 *
 * **********************************************************************
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * **********************************************************************
 */

function nawm_sanitize_filename_on_upload($filename) {
	$ext = end( explode( '.' , $filename ) );
	// Replace all weird characters
	$sanitized = preg_replace( '/[^a-zA-Z0-9-_.]/', '', substr( $filename, 0, -( strlen( $ext ) +1 ) ) );
	// Replace dots inside filename
	$sanitized = str_replace( '.', '-', $sanitized );
	return strtolower( $sanitized . '.' . $ext );
}
add_filter('sanitize_file_name', 'nawm_sanitize_filename_on_upload', 10);