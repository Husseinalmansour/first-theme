<?php get_header(); ?>
<!-- hero -->
<section class="page-wrap">

    <div class="container text-center">
        <div class="hero-content">
            <h1> <?php the_title(); ?> </h1>
            <?php get_template_part('includes/section', 'content'); ?>
           
            <form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
             
                <input id="search-input" class="form-control mr-2" type="search" placeholder="Search" aria-label="Search" name="s" value="<?php echo get_search_query(); ?>">
                <button class="btn search-btn" type="submit">Search</button>
            </form>



            <p class="lead"><?php bloginfo('description'); ?></p>

        </div>
    </div>
</section>


<section class="content-with-sidebar py-5 bg-light">
    <div class="container">
        <div class="row">
            <!-- Latest Posts Section -->
            <div class="col-md-8"> <!-- Main content area for Latest Posts -->
                <section class="featured-blog">
                    <h2 class="text-center mb-5">Latest Posts</h2>
                    <div class="row">
                        <?php
                        $args = array(
                            'posts_per_page' => 3, // Display 3 posts
                            'post_status'    => 'publish'
                        );
                        $latest_posts = new WP_Query($args);
                        if ($latest_posts->have_posts()) :
                            while ($latest_posts->have_posts()) : $latest_posts->the_post();
                        ?>
                                <div class="col-12 mb-4">
                                    <div class="card border-0 shadow-sm d-flex flex-row w-100 align-items-stretch">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <div class="card-img-container" style="width: 30%; height: auto; overflow: hidden;">
                                                <a href="<?php the_permalink(); ?>">
                                                    <?php the_post_thumbnail('blog-small', ['class' => 'img-fluid', 'style' => 'width: 100%; height: 100%; object-fit: cover;']); ?> <!-- Set height to 100% -->
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                        <div class="card-body d-flex flex-column" style="width: 70%; justify-content: center;">
                                            <h5 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                            <p class="card-text"><?php echo wp_trim_words(get_the_excerpt(), 10); ?></p>
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
                </section>
            </div>

            <!-- Services Section -->
            <div class="col-md-4"> <!-- Sidebar area for Services -->
                <section id="services" class="py-5">
                    <h2 class="text-center mb-5">Our Services</h2>
                    <div class="row text-center">
                        <div class="col-12 mb-4">
                            <div class="card border-0 shadow-sm">
                                <div class="card-body">
                                    <h3 class="card-title">Service One</h3>
                                    <p class="card-text">Brief description of service one.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb-4">
                            <div class="card border-0 shadow-sm">
                                <div class="card-body">
                                    <h3 class="card-title">Service Two</h3>
                                    <p class="card-text">Brief description of service two.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb-4">
                            <div class="card border-0 shadow-sm">
                                <div class="card-body">
                                    <h3 class="card-title">Service Three</h3>
                                    <p class="card-text">Brief description of service three.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</section>





<?php get_footer(); ?>