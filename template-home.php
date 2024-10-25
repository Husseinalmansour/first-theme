<?php
/*
Template Name: Home
*/
?>

<?php get_header(); ?>

<!-- Hero Section -->
<section class="hero bg-primary text-white py-5">
    <div class="container text-center">
        <div class="hero-content">
            <h1 class="display-4"><?php bloginfo('name'); ?></h1>
            <p class="lead"><?php bloginfo('description'); ?></p>
            <a href="#services" class="btn btn-light btn-lg mt-3"><?= __('Explore Services',)?></a>
        </div>
    </div>
</section>



<?php get_footer(); ?>
