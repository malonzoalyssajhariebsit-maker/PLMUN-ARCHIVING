<?php require_once('./config.php') ?>
<!DOCTYPE html>
<html lang="en" class="" style="height: auto;">
 <?php require_once('inc/header.php') ?>
<body class="hold-transition ">
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
      flex-direction: column;
      justify-content: center;
      align-items: center;
      padding: 3rem;
      margin: 2rem;
      border-radius: 20px;
      backdrop-filter: blur(10px);
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
    }
    .login-right {
      flex: 0.6;
      background-image: url("<?php echo validate_image($_settings->info('cover')) ?>");
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      color: white;
      position: relative;
      overflow: hidden;
    }
    .login-right::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: rgba(0, 0, 0, 0.5);
    }
    .login-form {
      width: 100%;
      max-width: 400px;
    }
    .login-title {
      font-size: 2rem !important;
      font-weight: 300 !important;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif !important;
      color: #d6ffd7ff !important;
      margin-bottom: 2rem;
      text-align: center;
      text-transform: uppercase !important;
    }

    .form-group {
      margin-bottom: 1.5rem;
      position: relative;
      display: flex;
      align-items: center;
      gap: 0.75rem;
    }
    .form-icon {
      color: #4CAF50;
      font-size: 1.2rem;
      width: 20px;
      text-align: center;
    }
    .form-control {
      background: #789947ff !important;
      border: 2px solid #5d743aff;
      border-radius: 50px;
      padding: 1rem 1.5rem;
      font-size: 1rem;
      transition: all 0.3s ease;
      width: 100%;
      color: #e7e9d7ff;
    }
    .form-control:focus {
      background: #2d4a2d !important;
      border-color: #7CB342 !important;
      box-shadow: 0 0 0 3px rgba(124, 179, 66, 0.3) !important;
      outline: none !important;
      color: #ffffff !important;
    }
    .form-control::placeholder {
      color: #e3ead1ff;
    }
    .login-btn {
      background: linear-gradient(135deg, #81C784 0%, #2e6a30ff 100%);
      border: none;
      border-radius: 50px;
      padding: 1rem 2rem;
      font-size: 1rem;
      font-weight: 600;
      color: white;
      text-transform: uppercase;
      letter-spacing: 1px;
      width: 100%;
      cursor: pointer;
      transition: all 0.3s ease;
    }
    .login-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 5px 15px rgba(171, 201, 52, 0.73);
    }
    .right-content {
      text-align: center;
      z-index: 1;
    }
    .right-title {
      font-size: 3rem;
      font-weight: 300;
      margin-bottom: 1rem;
    }
    .right-subtitle {
      font-size: 1.1rem;
      opacity: 0.9;
      margin-bottom: 3rem;
    }
  
    .forgot-password {
      text-align: center;
      margin-top: 2rem;
    }
    .forgot-password a {
      color: #666;
      text-decoration: none;
      font-size: 0.9rem;
    }
    .forgot-password a:hover {
      color: #edf3abff;
    }
  </style>
  <?php if($_settings->chk_flashdata('success')): ?>
      <script>
        alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
      </script>
      <?php endif;?> 
<div class="login-container">
  <div class="login-left">
    <div class="login-form">
      <h1 class="login-title">Login</h1>
      
      <form action="" id="slogin-form">
        <div class="form-group">
          <i class="fas fa-envelope form-icon"></i>
          <input type="email" name="email" id="email" placeholder="Institutional Email" class="form-control" required>
        </div>
        <div class="form-group">
          <i class="fas fa-lock form-icon"></i>
          <input type="password" name="password" id="password" placeholder="Password" class="form-control" required>
        </div>
        <div style="margin-top: 0.5rem; margin-left: 2.95rem; text-align: left;">
          <input type="checkbox" id="showPassword" style="margin-right: 0.5rem;">
          <label for="showPassword" style="color: #dadadaff; font-size: 0.9rem; cursor: pointer;">Show Password</label>
        </div>
        <div class="form-group">
          <button class="login-btn" type="submit" style="margin-left: 2.95rem; width: calc(100% - 2.95rem);">LOGIN</button>
        </div>
      </form>
      
      <div class="forgot-password">
        <a href="forgot_password.php">Forgot Password?</a>
      </div>
      
      <div style="text-align: center; margin-top: 1rem;">
        <a href="register.php" style="color: #4CAF50; text-decoration: none; font-size: 0.9rem; transition: color 0.3s ease;" onmouseover="this.style.color='#fffacd'" onmouseout="this.style.color='#4CAF50'">Don't have an account? Register</a>
      </div>
    </div>
  </div>
  
  <div class="login-right">
    <div class="right-content">
      <center><img src="<?= validate_image($_settings->info('logo')) ?>" alt="" style="height:150px;width:150px;object-fit:scale-down;object-position:center center;border-radius:100%;margin-bottom:2rem;"></center>
      <h2 class="right-title"><?php echo $_settings->info('name') ?></h2>
      
    </div>
  </div>
</div>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url ?>plugins/select2/js/select2.full.min.js"></script>

<script>
  $(document).ready(function(){
    end_loader();
    
    // Show/Hide Password Toggle
    $('#showPassword').change(function(){
      const passwordField = $('#password');
      const fieldType = $(this).is(':checked') ? 'text' : 'password';
      passwordField.attr('type', fieldType);
    });
    
    // Registration Form Submit
    $('#slogin-form').submit(function(e){
        e.preventDefault()
        var _this = $(this)
            $(".pop-msg").remove()
            $('#password, #cpassword').removeClass("is-invalid")
        var el = $("<div>")
            el.addClass("alert pop-msg my-2")
            el.hide()
        
        // Check email domain
        var email = $('#email').val();
        if(!email.endsWith('@plmun.edu.ph')){
            el.addClass("alert-danger")
            el.text("Only PLMUN Institutional Email addresses are allowed.")
            _this.prepend(el)
            el.show('slow')
            return false;
        }
        
        start_loader();
        $.ajax({
            url:_base_url_+"classes/Login.php?f=student_login",
            method:'POST',
            data:_this.serialize(),
            dataType:'json',
            error:err=>{
                console.log(err)
                el.text("An error occured while saving the data")
                el.addClass("alert-danger")
                _this.prepend(el)
                el.show('slow')
                end_loader();
            },
            success:function(resp){
                if(resp.status == 'success'){
                    location.href= "./"
                }else if(!!resp.msg){
                    el.text(resp.msg)
                    el.addClass("alert-danger")
                    _this.prepend(el)
                    el.show('show')
                }else{
                    el.text("An error occured while saving the data")
                    el.addClass("alert-danger")
                    _this.prepend(el)
                    el.show('show')
                }
                end_loader();
                $('html, body').animate({scrollTop: 0},'fast')
            }
        })
    })
  })
</script>
</body>
</html>