WP Plugin Status - Beta
==============

**Author:** *J Burns, Pierce Communications*
**Email:** *me@johnburns87.com*

Please email me any bugs and issues. Thanks!

Instructions
--------------

- Add folder to wp-content/plugins/ directory
- Login to wp-admin
- Go to plugins
- Activate plugin
- Put the following code into your themes header and footer.

header.php 
--------------

	<?php
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
	global $post;
	$scripts_query = get_post_meta( $post->ID, '_active_scripts', true );
	$scripts_array = unserialize($scripts_query);
	?>

	<?php if (!empty($scripts_array[0])) { foreach($scripts_array as $script): ?>
	<script src="<?php echo $script; ?>"></script>
	<?php endforeach; } ?>