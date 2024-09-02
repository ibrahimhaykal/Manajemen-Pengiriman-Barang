<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="/pengirimanibrahim/style/login.css" />
    <!-- Menggunakan path relatif -->
  </head>
  <body>
    <div class="login-container mb-3">
      <!-- Logo -->
      <div class="logo-container">
        <img src="img/image-removebg-preview (1) 1.png" alt="Logo" />
      </div>
      <!-- Vertical Line -->
      <div class="vertical-line1"></div>
      <!-- Added vertical line -->
      <div class="vertical-line2"></div>
      <!-- Added vertical line -->
      <!-- Login Form -->
      <div class="login-form">
        <div class="welcome-text mb-1">Welcome Back!</div>
        <!-- Added Welcome Back! text -->
        <div class="dashboard-text mt-1 mb-3">Please Login To Admin Dashboard</div>
        <!-- Added Please Login To Admin Dashboard text -->
        <form action = "index.php">
          <div class="mb-3 position-relative">
            <input type="text" class="form-control username rounded-3 form-control-lg" placeholder="Username" required />
          </div>
          <div class="mb-3 position-relative">
            <input type="password" class="form-control password rounded-3 form-control-lg" placeholder="Password" required />
          </div>
          <button type="submit" class="btn btn-login">Login</button>
        </form>
      </div>
    </div>
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
  </body>
</html>
