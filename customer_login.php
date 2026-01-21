<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Elite Coffee - Login</title>
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
        .login-box {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(15px);
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            padding: 40px;
            color: white;
            box-shadow: 0 15px 35px rgba(0,0,0,0.2);
            transition: 0.3s;
        }
        .login-box:hover {
            transform: translateY(-5px);
        }
        .form-control {
            background: rgba(255, 255, 255, 0.2);
            border: none;
            border-radius: 50px;
            color: white;
            padding: 12px 20px;
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
        .btn-login {
            background: #6F4E37;
            border: none;
            border-radius: 50px;
            padding: 12px;
            font-weight: bold;
            transition: 0.3s;
        }
        .btn-login:hover {
            background: #5D2E00;
            transform: scale(1.02);
        }
        .reg-link {
            color: #ffcc99;
            text-decoration: none;
            font-weight: bold;
        }
        .reg-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="login-box text-center">
                <h2 class="fw-bold mb-2">Welcome Back!</h2>
                <p class="mb-4 small">Login to savor your favorite coffee.</p>
                
                <form method="POST">
                    <div class="mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email Address" required>
                    </div>
                    <div class="mb-4">
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                    </div>
                    <button name="login" class="btn btn-login w-100 text-white shadow">LOGIN</button>
                </form>

                <div class="mt-4">
                    <p class="small mb-0">Don't have an account?</p>
                    <a href="customer_register.php" class="reg-link">Create an Account Now</a>
                </div>

                <?php
                if(isset($_POST['login'])){
                    $email = $_POST['email'];
                    $pass = $_POST['password'];
                    $res = $conn->query("SELECT * FROM customers WHERE email='$email' AND password='$pass'");
                    if($res->num_rows > 0){
                        $_SESSION['customer'] = $email;
                        echo "<script>window.location.href='customer.php';</script>";
                    } else { 
                        echo "<div class='alert alert-danger mt-3 py-2 small bg-transparent text-white border-0'>Invalid Email or Password!</div>"; 
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>

</body>
</html>