<?php
/**
 * The main template file
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package brightred
 */
?>

<div class="site-wrapper">
	
	<?php get_header(); ?>

	<main id="primary" class="site-main">

		<?php the_content(); ?>

	</main><!-- #main -->

	<?php get_footer(); ?>
	
</div>

