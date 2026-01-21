<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rubama's Coffee - Premium Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .hero-section {
            background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('https://images.unsplash.com/photo-1495474472287-4d71bcdd2085');
            background-size: cover; background-position: center; height: 300px;
            display: flex; align-items: center; justify-content: center; color: white;
        }
        .coffee-card { transition: 0.4s; border-radius: 20px; border: none; overflow: hidden; }
        .coffee-card:hover { transform: scale(1.05); box-shadow: 0 15px 30px rgba(0,0,0,0.1); }
        .btn-buy { background: #6F4E37; color: white; border-radius: 50px; }
        .btn-buy:hover { background: #5D2E00; color: white; }
    </style>
</head>
<body class="bg-light">

<?php include 'navbar.php'; ?>

<div class="hero-section text-center">
    <div>
        <h1 class="display-4 fw-bold">Freshly Brewed Happiness</h1>
        <p class="lead">Order your favorite coffee and enjoy the rich aroma.</p>
    </div>
</div>

<div class="container mt-5">
    <div class="row">
        <?php
        $products = [
            ["name" => "Espresso", "price" => 120, "img" => "https://images.unsplash.com/photo-1510591509098-f4fdc6d0ff04?w=500"],
            ["name" => "Cappuccino", "price" => 200, "img" => "https://images.unsplash.com/photo-1572442388796-11668a67e53d?w=500"],
            ["name" => "Cafe Latte", "price" => 180, "img" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSOAAcUgFnYS7DHDZn-CmGoSnypLb1P9ohb9g&s"],
            ["name" => "Americano", "price" => 150, "img" => "https://myeverydaytable.com/wp-content/uploads/AmericanoHotandIced-3.jpg"]
        ];

        foreach($products as $p): ?>
            <div class="col-md-3 mb-4">
                <div class="card coffee-card shadow-sm h-100">
                    <img src="<?php echo $p['img']; ?>" class="card-img-top" style="height: 220px; object-fit: cover;">
                    <div class="card-body text-center">
                        <h5 class="fw-bold"><?php echo $p['name']; ?></h5>
                        <p class="text-muted small">Special Arabica Beans</p>
                        <h5 class="text-brown mb-3"><?php echo $p['price']; ?> TK</h5>
                        <a href="product_details.php?name=<?php echo $p['name']; ?>&price=<?php echo $p['price']; ?>&img=<?php echo $p['img']; ?>" 
                           class="btn btn-buy px-4">View & Order</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<footer class="bg-dark text-white text-center py-4 mt-5">
    <p>© 2026 | Design By Rubama Imam Chowdhury</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>