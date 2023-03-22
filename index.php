<?php get_header(); ?>
	<figure>
		<img src="<?php echo esc_url( get_theme_file_uri() ); ?>/src/img/shared/ika-question.png" alt="">
	</figure>
	<?php get_template_part('components/breadcrumb'); ?>
	<?php get_template_part('components/go-to-top'); ?>
	<?php get_template_part('components/pagination'); ?>
<?php get_footer(); ?>
