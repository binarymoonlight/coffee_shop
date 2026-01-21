<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rubama's Coffee - Join Us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('https://images.unsplash.com/photo-1495474472287-4d71bcdd2085');
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            align-items: center;
        }
        /* Glassmorphism Effect */
        .register-box {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(15px);
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            padding: 40px;
            color: white;
            box-shadow: 0 15px 35px rgba(0,0,0,0.2);
            transition: 0.3s;
        }
        .register-box:hover {
            transform: translateY(-5px);
        }
        .form-control {
            background: rgba(255, 255, 255, 0.2);
            border: none;
            border-radius: 50px;
            color: white;
            padding: 10px 20px;
        }
        .form-control::placeholder {
            color: #ddd;
        }
        .form-control:focus {
            background: rgba(255, 255, 255, 0.3);
            color: white;
            box-shadow: none;
            border: 1px solid #6F4E37;
        }
        .btn-register {
            background: #6F4E37;
            border: none;
            border-radius: 50px;
            padding: 12px;
            font-weight: bold;
            transition: 0.3s;
            color: white;
        }
        .btn-register:hover {
            background: #5D2E00;
            transform: scale(1.02);
            color: white;
        }
        .login-link {
            color: #ffcc99;
            text-decoration: none;
            font-weight: bold;
        }
        .login-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="register-box text-center shadow-lg">
                <h2 class="fw-bold mb-2">Join the Club</h2>
                <p class="mb-4 small">Create an account and start your coffee journey.</p>
                
                <form method="POST">
                    <div class="mb-3 text-start">
                        <input type="text" name="name" class="form-control" placeholder="Full Name" required>
                    </div>
                    <div class="mb-3 text-start">
                        <input type="email" name="email" class="form-control" placeholder="Email Address" required>
                    </div>
                    <div class="mb-4 text-start">
                        <input type="password" name="password" class="form-control" placeholder="Create Password" required>
                    </div>
                    <button name="register" class="btn btn-register w-100 shadow">SIGN UP NOW</button>
                </form>

                <div class="mt-4 text-center">
                    <p class="small mb-0">Already a member?</p>
                    <a href="customer_login.php" class="login-link">Login to Your Account</a>
                </div>

                <?php
if(isset($_POST['register'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, $_POST['password']);
    
    // Registered Email recheck 
    $check = $conn->query("SELECT * FROM customers WHERE email='$email'");
    if($check->num_rows > 0){
        echo "<div class='alert alert-warning mt-3 py-2 small bg-transparent text-white border-0 text-center'>This Email already exists!</div>";
    } else {
        // for save user in database
        $sql = "INSERT INTO customers (name, email, password) VALUES ('$name', '$email', '$pass')";
        
        if($conn->query($sql)){
            //  Auto login seasson
            $_SESSION['customer'] = $email;
            
            // redirecting to home page
            echo "<script>
                    alert('Registration Successful! Welcome to Elite Coffee.');
                    window.location.href='customer.php';
                  </script>";
        } else {
            echo "<div class='alert alert-danger mt-3 py-2 small bg-transparent text-white border-0 text-center'>Error creating account!</div>";
        }
    }
}
?>
            </div>
        </div>
    </div>
</div>

</body>
</html>