<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top shadow-sm py-3">
    <div class="container">
        <a class="navbar-brand fw-bold fs-3" href="customer.php" style="letter-spacing: 1px;">☕ RUBAMA'S COFFEE</a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item"><a class="nav-link px-3" href="customer.php">Home</a></li>
                
                <?php if(isset($_SESSION['customer'])): ?>
                    <li class="nav-item">
                        <span class="nav-link text-warning px-3 font-monospace">Welcome, <?php echo explode('@', $_SESSION['customer'])[0]; ?></span>
                    </li>
                    <li class="nav-item">
                        <a href="logout.php" class="btn btn-outline-danger btn-sm rounded-pill px-4 ms-2">Logout</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a href="customer_login.php" class="btn px-4 rounded-pill shadow-sm" 
                           style="background: #6F4E37; color: white; font-weight: 500; transition: 0.3s;">
                           Login / Register
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<style>
    .navbar-nav .nav-link { font-weight: 500; transition: 0.3s; }
    .navbar-nav .nav-link:hover { color: #6F4E37 !important; }
    /* login button hover effect */
    .btn-brown-nav:hover { background: #5D2E00 !important; transform: translateY(-2px); }
</style>