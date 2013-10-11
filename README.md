WP Plugin Status - Beta
==============

A wordpress plugin that deactivates individual or all wp plugin styles and scripts per page to increase load time.



**Author:** *John Burns - Pierce Communications*

**Email:** *me@johnburns87.com*

**Website** *www.piercecommunications.co.uk*

Please email me any bugs and issues. Thanks!




Installation
--------------

- Add folder to wp-content/plugins/ directory
- Login to wp-admin
- Go to plugins
- Activate plugin
- Put the following code into your themes header and footer.
- All plugin scripts and stylesheets will be disabled by default
- When editing a page, a new widget will appear below the MCE editor where you can enable / disable scripts.

header.php 
--------------

	<?php
	wp_reset_query();
	global $post;
	$styles_query = get_post_meta( $post->ID, '_active_styles', true );
	$styles_array = unserialize($styles_query);
	?>

	<?php if (!empty($styles_array[0])) { foreach($styles_array as $style): ?>
	<link rel="stylesheet" href="<?php echo $style; ?>">
	<?php endforeach; } ?>

footer.php
--------------

	<?php
	wp_reset_query();
	global $post;
	$scripts_query = get_post_meta( $post->ID, '_active_scripts', true );
	$scripts_array = unserialize($scripts_query);
	?>

	<?php if (!empty($scripts_array[0])) { foreach($scripts_array as $script): ?>
	<script src="<?php echo $script; ?>"></script>
	<?php endforeach; } ?>

Features
--------------

- Enable and disable wordpress plugin scripts and stylesheets per page
- Enable and disable custom scripts and stylesheets per page

Screenshots
--------------

- Edit page widget: https://www.diigo.com/item/image/4cohd/v5ri
- Custom scripts and styles: https://www.diigo.com/item/image/4cohd/1utp
- Add custom script: https://www.diigo.com/item/p/qdaddsszbrdpcaqqdzbbpeabqa/f48cbb8d4f2ff0aa3035b52dc8cb1b17


Licence
--------------

GPLv2 or later - http://www.gnu.org/licenses/gpl-2.0.html

Future Releases
--------------

- Ability to delete custom styles and scripts.