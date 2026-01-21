<?php 
include 'db.php'; 

// লগইন চেক
if(!isset($_SESSION['admin'])) { 
    header("Location: login.php"); 
    exit();
}

// কফি প্রাইস লিস্ট
$coffees = [
    "Espresso" => 120, 
    "Latte" => 180, 
    "Cappuccino" => 200, 
    "Americano" => 150,
    "Mocha" => 220
];

// অর্ডার সেভ করার লজিক (Create)
if(isset($_POST['order'])){
    $type = $_POST['coffee_type'];
    $price = $coffees[$type];
    $conn->query("INSERT INTO orders (coffee_type, price) VALUES ('$type', '$price')");
    header("Location: dashboard.php"); // পেজ রিফ্রেশ রোধ করতে
}

// অর্ডার ডিলিট করার লজিক (Delete)
if(isset($_GET['delete_id'])){
    $id = $_GET['delete_id'];
    $conn->query("DELETE FROM orders WHERE id = $id");
    header("Location: dashboard.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Coffee Shop Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .bg-brown { background-color: #6F4E37; color: white; }
        .btn-brown { background-color: #7B3F00; color: white; border: none; }
        .btn-brown:hover { background-color: #5D2E00; color: white; }
    </style>
</head>
<body class="bg-light">

    <nav class="navbar navbar-dark bg-dark px-4 mb-4 shadow">
        <a class="navbar-brand">☕ Coffee Shop Manager</a>
        <div class="d-flex">
            <span class="text-white me-3 mt-1">Welcome, Admin</span>
            <a href="login.php" class="btn btn-danger btn-sm">Logout</a>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            
            <div class="col-md-4">
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-header bg-brown text-center">
                        <h5 class="mb-0">Place New Order</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            <div class="mb-3">
                                <label class="form-label">Select Coffee</label>
                                <select name="coffee_type" class="form-select border-brown" required>
                                    <option value="">-- Choose Coffee --</option>
                                    <?php foreach($coffees as $name => $price) {
                                        echo "<option value='$name'>$name ($price TK)</option>";
                                    } ?>
                                </select>
                            </div>
                            <button name="order" class="btn btn-brown w-100 shadow-sm">Confirm Order</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-white">
                        <h5 class="mb-0 text-dark">Order History</h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Item</th>
                                        <th>Price</th>
                                        <th>Date & Time</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $total = 0;
                                    $res = $conn->query("SELECT * FROM orders ORDER BY id DESC");
                                    if($res->num_rows > 0) {
                                        while($row = $res->fetch_assoc()){
                                            $total += $row['price'];
                                            echo "<tr>
                                                    <td><strong>{$row['coffee_type']}</strong></td>
                                                    <td>{$row['price']} TK</td>
                                                    <td class='small text-muted'>{$row['order_date']}</td>
                                                    <td class='text-center'>
                                                        <a href='dashboard.php?delete_id={$row['id']}' 
                                                           class='btn btn-outline-danger btn-sm' 
                                                           onclick='return confirm(\"Are you sure you want to delete this order?\")'>
                                                           Delete
                                                        </a>
                                                    </td>
                                                  </tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='4' class='text-center py-4'>No orders yet today!</td></tr>";
                                    }
                                    ?>
                                </tbody>
                                <tfoot class="table-dark">
                                    <tr>
                                        <td><strong>Total Sales</strong></td>
                                        <td colspan="3"><strong><?php echo $total; ?> TK</strong></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>