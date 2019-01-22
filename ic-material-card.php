<?php
/**
 * Plugin Name:     Enfold Material Card Component
 * Plugin URI:      https://incuca.net
 * Description:     Simple Material Card Component
 * Author:          INCUCA
 * Author URI:      https://incuca.net
 * Text Domain:     ic-mat-card
 * Version:         0.1.1
 *
 * @package         Ic_Enfold
 */

// Add shortcodes to Enfold
add_filter('avia_load_shortcodes', 'ic_mat_card_shortcodes', 12, 1);

function ic_mat_card_shortcodes($paths)
{
	$plugin_dir = plugin_dir_path(__FILE__);
	array_push($paths, $plugin_dir.'/shortcodes/');
	return $paths;
}
