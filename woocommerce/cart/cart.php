
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
    <div class="container my-5">
        <h1 class="text-center mb-4">Shopping Cart</h1>
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
                    <!-- Sample Cart Item -->
                    <tr>
                        <td class="text-start">
                            <div class="d-flex align-items-center">
                                <img src="product-image.jpg" alt="Product Image" class="img-fluid rounded me-3" style="width: 60px;">
                                <span>Product Name</span>
                            </div>
                        </td>
                        <td>$50.00</td>
                        <td>
                            <input type="number" class="form-control text-center" value="1" min="1" style="width: 70px;">
                        </td>
                        <td>$50.00</td>
                        <td>
                            <button class="btn btn-outline-danger btn-sm">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>
                    <!-- Repeat for each cart item -->
                </tbody>
            </table>
        </div>

        <!-- Cart Summary -->
        <div class="row mt-4">
            <div class="col-md-6">
                <a href="shop.html" class="btn btn-outline-primary">
                    Continue Shopping
                </a>
            </div>
            <div class="col-md-6 text-end">
                <h4 class="mb-3">Cart Summary</h4>
                <p class="fw-semibold">Subtotal: $50.00</p>
                <a href="checkout.html" class="btn btn-primary btn-lg">Proceed to Checkout</a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle (with Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php get_footer()(); ?>











