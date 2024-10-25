<?php get_header(); ?>

<section class="page-wrap">
    <div class="row">
        <div class="col-lg-6">
            <div class="container d-flex flex-column align-items-center">
                <?php if (has_post_thumbnail()): ?>
                    <img src="<?php the_post_thumbnail_url('blog-large'); ?>" class="img-fluid mb-3 img-thumbnail mr-4">
                <?php endif; ?>

                <h1><?php the_title(); ?></h1>
                <?php get_template_part('includes/section', 'blogcontent'); ?>
            </div>
        </div>

        <div class="col-lg-6"> 
        
        <?php get_template_part('includes/form','enquiry');?>
    
    
    
    
    </div>
</section>

<?php get_footer(); ?>
