<?php
include 'db.php';

if(!isset($_SESSION['customer'])){
    header("Location: customer_login.php");
    exit();
}

if(isset($_POST['place_order'])){
    $name = $_POST['coffee_name'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];
    $total_price = $price * $qty;
    $customer_email = $_SESSION['customer'];

    $sql = "INSERT INTO orders (coffee_type, price) VALUES ('$name ($qty pcs by $customer_email)', '$total_price')";
    
    if($conn->query($sql)){
        echo "<script>alert('Order Successful! Total: $total_price TK'); window.location.href='customer.php';</script>";
    }
}
?>