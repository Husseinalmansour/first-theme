<?php
/*
Template Name: Contact Us
*/
?>

<?php get_header(); ?>
<section class="page-wrap">
    <div class="container">

        <h1> <?php the_title(); ?> </h1>
        <div class="row">

            <div class="col-lg-6">

                <!-- Contact Section -->
                <section class="contact py-5">
                    <div class="container">
                        <h2 class="text-center mb-5">Get in Touch</h2>
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <form action="" method="post">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="message" class="form-label">Message</label>
                                        <textarea class="form-control" id="message" rows="5" required></textarea>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Send Message</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>

            </div>



            <div class="col-lg-6">this is the other</div>






        </div>

    </div>

</section>




<?php get_footer(); ?>