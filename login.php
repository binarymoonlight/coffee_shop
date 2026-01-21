<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Coffee Shop Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: url('https://images.unsplash.com/photo-1495474472287-4d71bcdd2085') no-repeat center center fixed; background-size: cover; }
        .login-card { background: rgba(255, 255, 255, 0.9); border-radius: 15px; margin-top: 150px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4 card login-card p-4 shadow">
                <h3 class="text-center text-brown">Coffee Login</h3>
                <form method="POST">
                    <input type="text" name="user" class="form-control mb-3" placeholder="Username" required>
                    <input type="password" name="pass" class="form-control mb-3" placeholder="Password" required>
                    <button name="login" class="btn btn-dark w-100">Enter Shop</button>
                </form>
                <?php
                if(isset($_POST['login'])){
                    if($_POST['user'] == 'admin' && $_POST['pass'] == '1234'){
                        $_SESSION['admin'] = 'admin';
                        header("Location: dashboard.php");
                    } else { echo "<p class='text-danger mt-2'>ভুল তথ্য দিয়েছেন!</p>"; }
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>