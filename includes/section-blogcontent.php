<div class="container d-flex flex-column align-items-center">
<?php if (have_posts()): while (have_posts()): the_post(); ?>



<?php the_content(); ?>
<?php the_date('m/d/y'); ?>
<?php

$fname = get_the_author_meta('first_name');
$lname = get_the_author_meta('last_name'); ?>

<p><?php echo 'posted by' . $fname . ' ' . $lname; ?></p>

<?php comments_template(); ?>

<?php endwhile;
else: endif; ?>
</div>