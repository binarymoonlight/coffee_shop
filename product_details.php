<?php include 'db.php'; 
$name = $_GET['name'] ?? 'Espresso';
$price = $_GET['price'] ?? 120;
$img = $_GET['img'] ?? '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $name; ?> - Premium Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .product-img { border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); width: 100%; height: 450px; object-fit: cover; }
        .badge-premium { background: #6F4E37; color: white; padding: 5px 15px; border-radius: 50px; }
    </style>
</head>
<body class="bg-light">

<?php include 'navbar.php'; ?>

<div class="container mt-5">
    <div class="row bg-white p-5 rounded-4 shadow-sm">
        <div class="col-md-6 mb-4">
            <img src="<?php echo $img; ?>" class="product-img">
        </div>
        <div class="col-md-6 ps-md-5">
            <span class="badge-premium mb-2">Premium Roast</span>
            <h1 class="display-5 fw-bold"><?php echo $name; ?></h1>
            <p class="text-muted">High-quality Arabica beans, roasted to perfection for the ultimate coffee experience.</p>
            
            <h2 class="text-success my-4"><?php echo $price; ?> TK <span class="text-muted fs-6">/ per cup</span></h2>

            <form method="POST" action="order_process.php">
                <input type="hidden" name="coffee_name" value="<?php echo $name; ?>">
                <input type="hidden" name="price" value="<?php echo $price; ?>">
                
                <div class="mb-4">
                    <label class="form-label fw-bold">Select Quantity:</label>
                    <input type="number" name="qty" class="form-control w-25 border-2" value="1" min="1">
                </div>

                <?php if(isset($_SESSION['customer'])): ?>
                    <button type="submit" name="place_order" class="btn btn-dark btn-lg w-100 shadow">Confirm Purchase</button>
                <?php else: ?>
                    <div class="alert alert-warning text-center">
                        Please <a href="customer_login.php" class="fw-bold">Login</a> to place an order.
                    </div>
                    <button type="button" class="btn btn-secondary btn-lg w-100 shadow" disabled>Order (Login Required)</button>
                <?php endif; ?>
            </form>
            
            <div class="mt-4 row">
                <div class="col-4 text-center border-end"><small class="text-muted">Delivery</small><br><strong>20 Min</strong></div>
                <div class="col-4 text-center border-end"><small class="text-muted">Rating</small><br><strong>4.8 ⭐</strong></div>
                <div class="col-4 text-center"><small class="text-muted">Type</small><br><strong>Hot/Cold</strong></div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>