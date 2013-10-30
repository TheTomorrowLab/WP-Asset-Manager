=== WP Asset Manager ===
Contributors: johnburns87
Tags: performance, plugins, styles, scripts
Requires at least: 3.0.1
Tested up to: 3.5.2
Stable tag: 1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A wordpress plugin that deactivates individual or all wp plugin styles and scripts per page to increase load time.

== Description ==

A wordpress plugin that deactivates individual or all wp plugin styles and scripts per page to increase load time.

== Installation ==

- Add folder to wp-content/plugins/ directory
- Login to wp-admin
- Go to plugins
- Activate plugin
- Put the following code into your themes header and footer.
- All plugin scripts and stylesheets will be disabled by default
- When editing a page, a new widget will appear below the MCE editor where you can enable / disable scripts.

== Frequently Asked Questions ==

== Screenshots ==

== Changelog ==

= 1.0 =
* first release

== Arbitrary section ==

== A brief Markdown Example ==

Add the following code to your themes header and footer

header.php 

	`<?php
	wp_reset_query();
	global $post;
	$styles_query = get_post_meta( $post->ID, '_active_styles', true );
	$styles_array = unserialize($styles_query);
	?>

	<?php if (!empty($styles_array[0])) { foreach($styles_array as $style): ?>
	<link rel="stylesheet" href="<?php echo $style; ?>">
	<?php endforeach; } ?>`

footer.php

	`<?php
	wp_reset_query();
	global $post;
	$scripts_query = get_post_meta( $post->ID, '_active_scripts', true );
	$scripts_array = unserialize($scripts_query);
	?>

	<?php if (!empty($scripts_array[0])) { foreach($scripts_array as $script): ?>
	<script src="<?php echo $script; ?>"></script>
	<?php endforeach; } ?>`