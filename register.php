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
      margin: 0 !important;
      padding: 0 !important;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif !important;
    }
    body{
      background: #111311ff !important;
      overflow: hidden !important;
    }
    .register-container {
      display: flex !important;
      height: 100vh !important;
      width: 100% !important;
    }
    .register-left {
      flex: 0.5 !important;
      background: rgba(39, 60, 37, 0.85);
      display: flex !important;
      flex-direction: column !important;
      justify-content: flex-start !important;
      align-items: center !important;
      padding: 2rem !important;
      margin: 1rem !important;
      border-radius: 20px !important;
      backdrop-filter: blur(10px) !important;
      overflow-y: auto !important;
      max-height: calc(100vh - 2rem) !important;
    }
    .register-left::-webkit-scrollbar {
      width: 8px !important;
    }
    .register-left::-webkit-scrollbar-track {
      background: rgba(45, 74, 45, 0.3) !important;
      border-radius: 4px !important;
    }
    .register-left::-webkit-scrollbar-thumb {
      background: #badd95ff !important;
      border-radius: 4px !important;
    }
    .register-left::-webkit-scrollbar-thumb:hover {
      background: #689F38 !important;
    }
    .register-form {
      width: 100% !important;
      max-width: 500px !important;
      padding-top: 1rem !important;
      padding-bottom: 2rem !important;
    }
    .register-right {
      flex: 0.5 !important;
      background-image: url("<?php echo validate_image($_settings->info('cover')) ?>") !important;
      background-size: cover !important;
      background-repeat: no-repeat !important;
      background-position: center !important;
      display: flex !important;
      flex-direction: column !important;
      justify-content: center !important;
      align-items: center !important;
      color: white !important;
      position: relative !important;
      overflow: hidden !important;
    }
    .register-right::before {
      content: '' !important;
      position: absolute !important;
      top: 0 !important;
      left: 0 !important;
      right: 0 !important;
      bottom: 0 !important;
      background: rgba(0, 0, 0, 0.5) !important;
    }
    .register-title {
      font-size: 2rem !important;
      font-weight: 300 !important;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif !important;
      color: #ffffff !important;
      margin-bottom: 2rem !important;
      text-align: center !important;
      text-transform: uppercase !important;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.56) !important;
    }
    .form-group {
      margin-bottom: 1.5rem !important;
      position: relative !important;
      display: flex !important;
      align-items: center !important;
      gap: 0.75rem !important;
    }
    .form-icon {
      color: #4CAF50 !important;
      font-size: 1.2rem !important;
      width: 20px !important;
      text-align: center !important;
    }
    .form-control, .form-control-border, select.form-control {
      background: #789947ff !important;
      border: 2px solid #5d743aff;
      border-radius: 50px !important;
      padding: 1rem 1.5rem !important;
      font-size: 1rem !important;
      transition: all 0.3s ease !important;
      width: 100% !important;
      color: #ffffff !important;
    }
    .form-control:focus, .form-control-border:focus, select.form-control:focus {
      background: #2d4a2d !important;
      border-color: #7CB342 !important;
      box-shadow: 0 0 0 3px rgba(124, 179, 66, 0.3) !important;
      outline: none !important;
      color: #ffffff !important;
    }
    .form-control::placeholder {
      color: #e7e9d7ff !important;
    }
    .register-btn {
         background: linear-gradient(135deg, #19854dff 0%, #5dc79bff 100%);
      border: none;
      border-radius: 50px;
      padding: 1rem 2rem;
      font-size: 1rem;
      font-weight: 600;
      color: #bae5baff !important;
      text-transform: uppercase;
      letter-spacing: 1px;
      width: 100%;
      cursor: pointer;
      transition: all 0.3s ease;
    }
    .register-btn:hover {
      background: #07a05eff !important;
      color: #c2e4c7ff !important;
      transform: translateY(-2px) !important;
      box-shadow: 0 5px 15px rgba(226, 255, 195, 0.4) !important;
    }
    .right-content {
      text-align: center !important;
      z-index: 1 !important;
    }
    .right-title {
      font-size: 3rem !important;
      font-weight: 300 !important;
      margin-bottom: 1rem !important;
    }
    .custom-control-label {
      color: #ffffff !important;
      font-size: 0.9rem !important;
    }
    .text-navy {
      color: #7CB342 !important;
      font-weight: 600 !important;
    }
    .select2-container--default .select2-selection--single {
      background: #2d4a2d !important;
      border: 2px solid #4CAF50 !important;
      border-radius: 50px !important;
      height: calc(2.25rem + 2px) !important;
      padding: 0.5rem 1rem !important;
    }
    .select2-container--default .select2-selection--single .select2-selection__rendered {
      color: #ffffff !important;
      line-height: 1.5 !important;
    }
    .select2-container--default.select2-container--focus .select2-selection--single {
      border-color: #7CB342 !important;
      box-shadow: 0 0 0 3px rgba(124, 179, 66, 0.3) !important;
    }
    input[type="file"] {
      border-radius: 25px !important;
      padding: 1rem 1.5rem !important;
      background: #2d4a2d !important;
      border: 2px solid #4CAF50 !important;
      color: #ffffff !important;
      height: auto !important;
      line-height: normal !important;
    }
    input[type="file"]:focus {
      border-color: #7CB342 !important;
      box-shadow: 0 0 0 3px rgba(124, 179, 66, 0.3) !important;
    }
    input[type="file"]::-webkit-file-upload-button {
      background: #7CB342 !important;
      color: #2d4a2d !important;
      border: none !important;
      border-radius: 15px !important;
      padding: 0.5rem 1rem !important;
      font-weight: 600 !important;
      margin-right: 1rem !important;
      cursor: pointer !important;
    }
    input[type="file"]::-webkit-file-upload-button:hover {
      background: #689F38 !important;
    }
    .select2-dropdown {
      background: #2d4a2d !important;
      border: 1px solid #4CAF50 !important;
    }
    .select2-results__option {
      background: #2d4a2d !important;
      color: #ffffff !important;
    }
    .select2-results__option--highlighted {
      background: #7CB342 !important;
      color: #2d4a2d !important;
    }
  </style>
<div class="register-container">
  <div class="register-left">
    <div class="register-form">
      <h1 class="register-title">Register</h1>
      
      <form action="" id="registration-form" enctype="multipart/form-data">
        <input type="hidden" name="id">
        
        <div class="form-group">
          <i class="fas fa-user form-icon"></i>
          <input type="text" name="firstname" id="firstname" autofocus placeholder="Firstname" class="form-control" required>
        </div>
        
        <div class="form-group">
          <i class="fas fa-user form-icon"></i>
          <input type="text" name="middlename" id="middlename" placeholder="Middlename (optional)" class="form-control">
        </div>
        
        <div class="form-group">
          <i class="fas fa-user form-icon"></i>
          <input type="text" name="lastname" id="lastname" placeholder="Lastname" class="form-control" required>
        </div>

        <div class="form-group">
          <i class="fas fa-id-badge form-icon"></i>
          <input type="text" name="student_number" id="student_number" placeholder="Student Number" class="form-control" required>
        </div>

        <div style="margin-left: 2.95rem; margin-bottom: 1.5rem;">
          <div class="custom-control custom-radio" style="display: inline-block; margin-right: 2rem;">
            <input class="custom-control-input" type="radio" id="genderMale" name="gender" value="Male" required checked>
            <label for="genderMale" class="custom-control-label">Male</label>
          </div>
          <div class="custom-control custom-radio" style="display: inline-block;">
            <input class="custom-control-input" type="radio" id="genderFemale" name="gender" value="Female">
            <label for="genderFemale" class="custom-control-label">Female</label>
          </div>
        </div>

        <div class="form-group">
          <i class="fas fa-building form-icon"></i>
          <select name="department_id" id="department_id" class="form-control select2" data-placeholder="Select Department" required>
            <option value="" disabled selected>Select Department</option>
            <?php 
            $department = $conn->query("SELECT * FROM `department_list` where status = 1 order by `name` asc");
            while($row = $department->fetch_assoc()):
            ?>
            <option value="<?= $row['id'] ?>"><?= ucwords($row['name']) ?></option>
            <?php endwhile; ?>
          </select>
        </div>

        <div class="form-group">
          <i class="fas fa-graduation-cap form-icon"></i>
          <select name="curriculum_id" id="curriculum_id" class="form-control select2" data-placeholder="Select Curriculum" required>
            <option value="" disabled selected>Select Department First</option>
            <?php 
            $curriculum = $conn->query("SELECT * FROM `curriculum_list` where status = 1 order by `name` asc");
            $cur_arr = [];
            while($row = $curriculum->fetch_assoc()){
                $row['name'] = ucwords($row['name']);
                $cur_arr[$row['department_id']][] = $row;
            }
            ?>
          </select>
        </div>
        
        <div class="form-group">
          <i class="fas fa-envelope form-icon"></i>
          <input type="email" name="email" id="email" placeholder="Institutional Email" class="form-control" required>
        </div>
        
        <div class="form-group">
          <i class="fas fa-lock form-icon"></i>
          <input type="password" name="password" id="password" placeholder="Password" class="form-control" required>
        </div>
        
        <div class="form-group">
          <i class="fas fa-lock form-icon"></i>
          <input type="password" id="cpassword" placeholder="Confirm Password" class="form-control" required>
        </div>
        
        <div class="form-group">
          <i class="fas fa-id-card form-icon"></i>
          <input type="file" name="id_front" id="id_front" class="form-control" accept="image/png,image/jpeg" required>
        </div>
        
        <div class="form-group">
          <i class="fas fa-id-card form-icon"></i>
          <input type="file" name="id_back" id="id_back" class="form-control" accept="image/png,image/jpeg" required>
        </div>
        
        <div style="margin-left: 2.95rem;">
          <button class="register-btn" type="submit">REGISTER</button>
        </div>
      </form>
      
      <div style="text-align: center; margin-top: 2rem; margin-left: 2.95rem;">
        <a href="login.php" style="color: #7CB342; text-decoration: none; font-size: 0.9rem; transition: color 0.3s ease;" onmouseover="this.style.color='#fffacd'" onmouseout="this.style.color='#7CB342'">Already have an account? Login</a>
      </div>
    </div>
  </div>
  
  <div class="register-right">
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
    var cur_arr = $.parseJSON('<?= json_encode($cur_arr) ?>');
  $(document).ready(function(){
    end_loader();
    $('.select2').select2({
        width:"100%"
    })
    $('#department_id').change(function(){
        var did = $(this).val()
        $('#curriculum_id').html("")
        if(!!cur_arr[did]){
            Object.keys(cur_arr[did]).map(k=>{
                var opt = $("<option>")
                    opt.attr('value',cur_arr[did][k].id)
                    opt.text(cur_arr[did][k].name)
                $('#curriculum_id').append(opt)
            })
        }
        $('#curriculum_id').trigger("change")
    })

    // Registration Form Submit
    $('#registration-form').submit(function(e){
        e.preventDefault()
        var _this = $(this)
            $(".pop-msg").remove()
            $('#password, #cpassword').removeClass("is-invalid")
        var el = $("<div>")
            el.addClass("alert pop-msg my-2")
            el.hide()
        if($("#password").val() != $("#cpassword").val()){
            el.addClass("alert-danger")
            el.text("Password does not match.")
            $('#password, #cpassword').addClass("is-invalid")
            $('#cpassword').after(el)
            el.show('slow')
            return false;
        }
        
        // Check email domain
        var email = $('#email').val();
        if(!email.endsWith('@plmun.edu.ph')){
            el.addClass("alert-danger")
            el.text("Only @plmun.edu.ph email addresses are allowed.")
            _this.prepend(el)
            el.show('slow')
            return false;
        }
        
        start_loader();
        $.ajax({
            url:_base_url_+"classes/Users.php?f=save_student",
            method:'POST',
            data: new FormData(this),
            dataType:'json',
            processData: false,
            contentType: false,
            error:err=>{
                console.log(err)
                el.text("An error occured while saving the data")
                el.addClass("alert-danger")
                _this.prepend(el)
                el.show('slow')
                end_loader()
            },
            success:function(resp){
                if(resp.status == 'success'){
                    location.href= "./login.php"
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