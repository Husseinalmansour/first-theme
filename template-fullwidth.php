<?php
/* Template Name: Full Width */
get_header();
?>

<div class="container-fluid">
    <main id="primary" class="site-main">
        <?php
        while ( have_posts() ) :
            the_post();
            the_content();
        endwhile;
        ?>
    </main>
</div>

<?php get_footer(); ?>
