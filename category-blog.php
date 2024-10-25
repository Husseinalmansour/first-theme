<?php get_header(); ?>

<section class="page-wrap">

    <div class="container">

        <?php get_template_part('includes/section', 'archive'); ?>
        <!-- Featured Blog Section -->
        <section class="featured-blog py-5 bg-light">
            <div class="container">
                <h2 class="text-center mb-5">Category blog Posts</h2>
                <div class="row">
                    <?php
                    $args = array(
                        'posts_per_page' => -1, // Display all posts
                        'post_status'    => 'publish'
                    );
                    $latest_posts = new WP_Query($args);
                    if ($latest_posts->have_posts()) :
                        while ($latest_posts->have_posts()) : $latest_posts->the_post();
                    ?>
                            <div class="col-12 mb-4"> <!-- Full width, one column per row -->
                                <div class="card border-0 shadow-sm d-flex flex-row w-100" style="min-height: 100%; display: flex; flex-direction: row;">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <div class="card-img-container" style="width: 20%; height: auto; overflow: hidden;">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_post_thumbnail('blog-small', ['class' => 'img-fluid', 'style' => 'width: 100%; height: 100%; object-fit: cover;']); ?>
                                            </a>
                                        </div>
                                    <?php endif; ?>

                                    <div class="card-body d-flex flex-column" style="width: 80%;">
                                        <h5 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                        <p class="card-text"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                                        <div class="mt-auto">
                                            <a href="<?php the_permalink(); ?>" class="rm-btn btn btn-primary btn-sm">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php
                        endwhile;
                        wp_reset_postdata();
                    else :
                        echo '<p class="text-center">No posts found.</p>';
                    endif;
                    ?>
                </div>
            </div>
        </section>


    </div>

</section>




<?php get_footer(); ?>