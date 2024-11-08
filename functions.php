<?php


function hus_css_js() {
    // Enqueue Bootstrap 5 CSS
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.css');
    
   
    wp_enqueue_style('main', get_template_directory_uri() . '/css/main.css', array('bootstrap'), null, 'all');

   
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.bundle.min.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'hus_css_js');

// theme options 
add_theme_support('menus');
add_theme_support('post-thumbnails');
add_theme_support('widgets');

// Menus
register_nav_menus(
    array(
        'top-menu' => 'Top Menu Location',
        'mobile-menu' => 'Mobile Menu Location',
        'footer-menu' => 'Footer Menu Location'
    )
);


// Custom Image Sizes
add_image_size( 'blog-large', 800, 400, true);
add_image_size( 'blog-small', 300, 200, true);



add_action('wp_ajax_enquiry', 'enquiry_form');
add_action('wp_ajax_nopriv_enquiry', 'enquiry_form');
function enquiry_form(){

    if( !wp_verify_nonce($_POST['nonce'],'ajax-nonce'))
    {
        wp_send_json_error('Nonve is incorrect', 401);
        die;
    }


    $formdata= [];
    wp_parse_str($_POST['enquiry'], $formdata);
    $admin_email = get_option('admin_email');
    $headers[] = 'content-type: text/html; charset=UTF_8';
    $headers[] = 'From:' . $admin_email;
    $headers[] = 'Reply-to' . $formdata['email'];
    
    $send_to = $admin_email;
    $subject = "Enquiry from" . $formdata['fname'] . ' ' . $formdata['lname'];
    $message = '';
    foreach($formdata as $index => $field ){
        $message .= '<strong>' . $index . '</strong>' .  $field . '<br />';
    }

    try {
        if(wp_mail($send_to, $subject, $message, $headers))
        {
            wp_send_json_success('email sent');
        }
        else{
            wp_send_json_error('email error');
        }
        ;
    }
    catch(Exception $e){
            wp_send_json_error( $e->getMessage());
    }

    wp_send_json_success($formdata['fname']);

}


/**
 * Register Custom Navigation Walker
 */
function register_navwalker(){
	require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );


add_filter( 'nav_menu_link_attributes', 'prefix_bs5_dropdown_data_attribute', 20, 3 );
/**
 * Use namespaced data attribute for Bootstrap's dropdown toggles.
 *
 * @param array    $atts HTML attributes applied to the item's `<a>` element.
 * @param WP_Post  $item The current menu item.
 * @param stdClass $args An object of wp_nav_menu() arguments.
 * @return array
 */
function prefix_bs5_dropdown_data_attribute( $atts, $item, $args ) {
    // Check if the walker being used is WP_Bootstrap_Navwalker
    if ( is_a( $args->walker, 'WP_Bootstrap_Navwalker' ) ) {
        // Replace 'data-toggle' with 'data-bs-toggle'
        if ( array_key_exists( 'data-toggle', $atts ) ) {
            unset( $atts['data-toggle'] );
            $atts['data-bs-toggle'] = 'dropdown';
        }
    }
    return $atts;
}

add_action( 'phpmailer_init', 'custom_mailer' );

function custom_mailer( PHPMailer\PHPMailer\PHPMailer $phpmailer ) {
    $phpmailer->SetFrom( 'husseinalmansour00@gmail.com', 'Hussein Almansour' );
    $phpmailer->Host       = 'email-smtp.us-west-2.amazonaws.com';
    $phpmailer->Port       = 587; 
    $phpmailer->SMTPAuth   = true;
    $phpmailer->SMTPSecure = 'tls';
    $phpmailer->Username   = 'hussein';
<<<<<<< HEAD
    $phpmailer->Password   = '********';
=======
    $phpmailer->Password   = '**********';
>>>>>>> 5971ddfe8bd34c19d00f9cca816d69290190d0b2
    $phpmailer->IsSMTP();  
}



