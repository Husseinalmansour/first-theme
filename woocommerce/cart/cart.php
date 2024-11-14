<?php get_header(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container-fluid my-5 px-5">
        <h1 class="text-center mb-4">Shopping Cart</h1>
        
        <?php if ( WC()->cart->is_empty() ) : ?>
            <p class="text-center">Your cart is currently empty.</p>
            <div class="text-center">
                <a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>" class="btn btn-primary">Return to Shop</a>
            </div>
        <?php else : ?>

        <!-- Cart Table -->
        <div class="table-responsive">
            <table class="table align-middle text-center">
                <thead class="table-light">
                    <tr>
                        <th scope="col">Product</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total</th>
                        <th scope="col">Remove</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Loop through cart items -->
                    <?php foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) :
                        $product = $cart_item['data'];
                        $product_id = $product->get_id();
                        $product_name = $product->get_name();
                        $product_image = $product->get_image('thumbnail');
                        $product_price = WC()->cart->get_product_price( $product );
                        $product_subtotal = WC()->cart->get_product_subtotal( $product, $cart_item['quantity'] );
                    ?>
                    <tr>
                        <td class="text-start cart-item-info">
                            <?php echo $product_image; ?>
                            <span><?php echo esc_html( $product_name ); ?></span>
                        </td>
                        <td class="cart-item-price"><?php echo $product_price; ?></td>
                        <td class="cart-item-quantity">
                            <input type="number" name="cart[<?php echo $cart_item_key; ?>][qty]" 
                                   class="form-control text-center" 
                                   value="<?php echo esc_attr( $cart_item['quantity'] ); ?>" 
                                   min="1" style="width: 70px;"
                                   onchange="this.form.submit()">
                        </td>
                        <td class="cart-item-total"><?php echo $product_subtotal; ?></td>
                        <td class="cart-item-remove">
                            <a href="<?php echo esc_url( wc_get_cart_remove_url( $cart_item_key ) ); ?>" 
                               class="btn btn-outline-danger btn-sm" 
                               aria-label="Remove <?php echo esc_attr( $product_name ); ?>" 
                               onclick="return confirm('Are you sure you want to remove this item?');">
                                <i class="bi bi-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Cart Summary -->
        <div class="row mt-4">
            <div class="col-md-6">
                <a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>" class="btn btn-outline-primary">
                    Continue Shopping
                </a>
            </div>
            <div class="col-md-6 text-end">
                <h4 class="mb-3">Cart Summary</h4>
                <p class="fw-semibold">Subtotal: <?php echo WC()->cart->get_cart_subtotal(); ?></p>
                <a href="<?php echo esc_url( wc_get_checkout_url() ); ?>" class="btn btn-primary btn-lg">Proceed to Checkout</a>
            </div>
        </div>

        <?php endif; ?>
    </div>

    <!-- Bootstrap JS Bundle (with Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php get_footer(); ?>