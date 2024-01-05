<?php get_header(); ?>

<main id="main-section" data-template="default">
    <h1><?php echo get_the_title(); ?></h1>
    <?php echo apply_filters('the_content', get_the_content()); ?>
</main>

<?php get_footer(); ?>