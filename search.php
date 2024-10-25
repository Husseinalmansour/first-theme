<?php get_header(); ?>

<section class="page-wrap">

    <div class="container">

        <h1><?php printf( __('Search Results for: %s', 'textdomain'), get_search_query() ); ?></h1>

        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <div class="search-result">
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <p><?php echo wp_trim_words(get_the_excerpt(), 30); ?></p>
                </div>
            <?php endwhile; ?>

            <div class="pagination">
                <?php previous_posts_link('« Newer Posts'); ?>
                <?php next_posts_link('Older Posts »'); ?>
            </div>
        <?php else : ?>
            <p><?php _e('Sorry, no posts found.', 'textdomain'); ?></p>
        <?php endif; ?>

    </div>

</section>

<?php get_footer(); ?>
