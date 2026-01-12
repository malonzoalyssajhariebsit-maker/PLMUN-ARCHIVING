<?php require_once('./config.php') ?>
<!DOCTYPE html>
<html lang="en">
<?php require_once('inc/header.php') ?>
<body class="hold-transition">

<script>
  start_loader()
</script>

<style>
html, body{
  height: 100vh !important;
  width: 100% !important;
  margin: 0;
  padding: 0;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}
body{
  background: #111311ff;
  overflow: hidden;
}
.login-container {
  display: flex;
  height: 100vh;
  width: 100%;
}
.login-left {
  flex: 0.4;
  background: rgba(39, 60, 37, 0.85);
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 3rem;
  margin: 2rem;
  border-radius: 20px;
  backdrop-filter: blur(10px);
}
.login-right {
  flex: 0.6;
  background-image: url("<?php echo validate_image($_settings->info('cover')) ?>");
  background-size: cover;
  background-position: center;
  position: relative;
}
.login-right::before {
  content: '';
  position: absolute;
  inset: 0;
  background: rgba(0,0,0,0.5);
}
.login-form {
  width: 100%;
  max-width: 400px;
}
.login-title {
  font-size: 2rem;
  font-weight: 300;
  color: #d6ffd7ff;
  margin-bottom: 2rem;
  text-align: center;
  text-transform: uppercase;
}
.form-group {
  margin-bottom: 1.5rem;
  display: flex;
  align-items: center;
  gap: 0.75rem;
}
.form-icon {
  color: #4CAF50;
  font-size: 1.2rem;
  width: 20px;
}
.form-control {
  background: #789947ff;
  border: 2px solid #5d743aff;
  border-radius: 50px;
  padding: 1rem 1.5rem;
  width: 100%;
  color: #e7e9d7ff;
}
.form-control:focus {
  background: #2d4a2d;
  border-color: #7CB342;
  outline: none;
  color: #fff;
}
.login-btn {
  background: linear-gradient(135deg, #81C784, #2e6a30ff);
  border: none;
  border-radius: 50px;
  padding: 1rem;
  width: 100%;
  color: #fff;
  font-weight: 600;
  cursor: pointer;
}
.login-btn:hover {
  box-shadow: 0 5px 15px rgba(171, 201, 52, 0.73);
}
.back-login {
  text-align: center;
  margin-top: 1.5rem;
}
.back-login a {
  color: #4CAF50;
  font-size: 0.9rem;
  text-decoration: none;
}
.back-login a:hover {
  color: #fffacd;
}
.right-content {
  position: relative;
  z-index: 1;
  text-align: center;
  color: #fff;
}
</style>

<div class="login-container">

  <!-- LEFT -->
  <div class="login-left">
    <div class="login-form">
      <h1 class="login-title">Forgot Password</h1>

      <form id="forgot-form">
        <div class="form-group">
          <i class="fas fa-envelope form-icon"></i>
          <input type="email" name="email" id="email"
                 placeholder="Institutional Email"
                 class="form-control" required>
        </div>

        <div class="form-group">
          <button class="login-btn" type="submit">
            SEND RESET LINK
          </button>
        </div>
      </form>

      <div class="back-login">
        <a href="login.php">← Back to Login</a>
      </div>
    </div>
  </div>

  <!-- RIGHT -->
  <div class="login-right">
    <div class="right-content">
      <img src="<?= validate_image($_settings->info('logo')) ?>"
           style="height:150px;width:150px;border-radius:100%;margin-bottom:2rem;">
      <h2><?php echo $_settings->info('name') ?></h2>
    </div>
  </div>

</div>

<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script>
$(document).ready(function(){
  end_loader();

  $('#forgot-form').submit(function(e){
    e.preventDefault();

    let email = $('#email').val();

    if(!email.endsWith('@plmun.edu.ph')){
      alert('Only PLMUN institutional email is allowed.');
      return;
    }

    start_loader();

    // TODO: connect to your forgot password backend
    // Example:
    // classes/ForgotPassword.php?f=send_reset

    setTimeout(() => {
      alert('If the email exists, a reset link has been sent.');
      end_loader();
    }, 1000);
  });
});
</script>

</body>
</html>
