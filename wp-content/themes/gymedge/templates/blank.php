<?php
/**
 * Template Name: Blank Template
 * 
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

?>
<?php get_header(); ?>
<?php get_template_part('template-parts/content', 'banner'); ?>
<div id="primary" class="content-area">
	<?php while ( have_posts() ) : the_post(); ?>
		<?php the_content(); ?>
	<?php endwhile; ?>
</div>
<?php get_footer(); ?>