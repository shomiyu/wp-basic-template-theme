<?php get_header(); ?>
    <figure>
        <img src="<?php echo esc_url( get_theme_file_uri() ); ?>/src/img/shared/ika-question.png" alt="">
    </figure>
    <div>
        <?php get_template_part('components/go-to-top'); ?>
    </div>
    <div><?php get_template_part('components/pagination'); ?></div>
<?php get_footer(); ?>
