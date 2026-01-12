<?php require_once('./config.php'); ?>
 <!DOCTYPE html>
<html lang="en" class="" style="height: auto;">
<style>
  #header{
    height:70vh;
    width:calc(100%);
    position:relative;
    top:-1em;
    overflow: hidden;
  }
  #header:before{
    content:"";
    position:absolute;
    height:calc(100%);
    width:calc(100%);
    background-image:url(<?= validate_image($_settings->info("cover")) ?>);
    background-size:cover;
    background-repeat:no-repeat;
    background-position: center center;
  }
  #header:after {
    content:"";
    position:absolute;
    height:calc(100%);
    width:calc(100%);
    background: linear-gradient(135deg, rgba(44, 71, 29, 0.42), rgba(0, 23, 46, 0.6));
    z-index: 1;
  }
  #header>div{
    position:absolute;
    height:calc(100%);
    width:calc(100%);
    z-index:3;
  }

  .hero-title {
    font-size: 3.5rem !important;
    font-weight: 800 !important;
    color: white !important;
    text-shadow: 2px 2px 8px rgba(0,0,0,0.5) !important;
    line-height: 1.4 !important;
    margin-bottom: 1.5rem !important;
    letter-spacing: 1px !important;
    word-spacing: 4px !important;
  }

  .hero-subtitle {
    font-size: 1.2rem;
    color: rgba(255, 255, 255, 0.9);
    margin-bottom: 2rem;
    font-weight: 300;
    line-height: 1.6 !important;
    letter-spacing: 0.5px !important;
  }

  .explore-btn {
    background: linear-gradient(135deg, #ffffff, #f8faff) !important;
    color: #ceac17ff !important;
    border: none !important;
    padding: 1rem 2.5rem !important;
    font-size: 1.1rem !important;
    font-weight: 700 !important;
    border-radius: 50px !important;
    box-shadow: 0 8px 25px rgba(255, 255, 255, 0.3) !important;
    transition: all 0.4s ease !important;
    text-decoration: none !important;
  }

  .explore-btn:hover {
    transform: translateY(-3px) !important;
    box-shadow: 0 12px 35px rgba(255, 255, 255, 0.4) !important;
    color: #5856eb !important;
  }

  .hero-image {
    max-height: 450px !important;
    max-width: 100% !important;
    object-fit: contain !important;
    filter: drop-shadow(0 10px 30px rgba(0,0,0,0.4)) !important;
    animation: float 6s ease-in-out infinite !important;
  }

  @keyframes float {
    0% { transform: translateY(0px); }
    50% { transform: translateY(-20px); }
    100% { transform: translateY(0px); }
  }

  .hero-content {
    padding-right: 4rem;
    padding-left: 5rem !important
  }

  .hero-image-container {
    position: relative;
  }

  .hero-image-bg {
    position: absolute;
    width: 300px;
    height: 300px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 50%;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: -1;
  }

  #top-Nav a.nav-link.active {
  color: #ceac17ff !important;
      font-weight: 900;
      position: relative;
  }
  #top-Nav a.nav-link.active:before {
    content: "";
    position: absolute;
    border-bottom: 2px solid #ceac17ff;
    width: 33.33%;
    left: 33.33%;
    bottom: 0;
  }

  @media (max-width: 768px) {
    .hero-title {
      font-size: 2.5rem !important;
    }
    .hero-content {
      padding-right: 0;
      text-align: center;
      margin-bottom: 2rem;
    }
    #header {
      height: 80vh;
    }
  }
</style>
<?php require_once('inc/header.php') ?>
  <body class="layout-top-nav layout-fixed layout-navbar-fixed" style="height: auto;">
    <div class="wrapper">
     <?php $page = isset($_GET['page']) ? $_GET['page'] : 'home';  ?>
     <?php require_once('inc/topBarNav.php') ?>
     <?php if($_settings->chk_flashdata('success')): ?>
      <script>
        alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
      </script>
      <?php endif;?>    
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper pt-5">
        <?php if($page == "home" || $page == "about_us"): ?>
          <div id="header" class="shadow mb-4">
              <div class="container-fluid h-100">
                  <div class="row h-100 align-items-center">
                      <!-- Left side: Title and Button -->
                      <div class="col-lg-6 col-md-6 hero-content">
                          <h1 class="hero-title">
                              <?php echo $_settings->info('name') ?>
                          </h1>
                          <p class="hero-subtitle">
                              Discover and explore academic research, thesis, and capstone projects from our institution
                          </p>
                          <div class="text-left">
                              <a href="./?page=projects" class="explore-btn">
                                  <i class="fas fa-search mr-2"></i>Explore Projects
                              </a>
                          </div>
                      </div>
                      
                      <!-- Right side: Image -->
                      <div class="col-lg-6 col-md-6 d-flex justify-content-center align-items-center hero-image-container">
                          <div class="hero-image-bg"></div>
                          <?php 
                          // Check multiple possible locations for the uniform image
                          $image_paths = [
                              './uploads/uniform.png',
                              './assets/uniform.png',
                              './images/uniform.png',
                              './uniform.png'
                          ];
                          $image_found = false;
                          $image_src = '';
                          
                          foreach($image_paths as $path) {
                              if(file_exists($path)) {
                                  $image_src = $path;
                                  $image_found = true;
                                  break;
                              }
                          }
                          ?>
                          
                          <?php if($image_found): ?>
                          <img src="<?= $image_src ?>" alt="Academic Excellence" class="hero-image">
                          <?php else: ?>
                          <!-- Fallback: Beautiful academic icon if image not found -->
                          <div class="hero-image d-flex align-items-center justify-content-center" style="width: 350px; height: 350px; background: linear-gradient(135deg, rgba(255,255,255,0.2), rgba(255,255,255,0.1)); border-radius: 50%; backdrop-filter: blur(10px);">
                              <i class="fas fa-graduation-cap" style="font-size: 8rem; color: white; text-shadow: 0 4px 15px rgba(0,0,0,0.3);"></i>
                          </div>
                          <?php endif; ?>
                      </div>
                  </div>
              </div>
          </div>
        <?php endif; ?>
        <!-- Main content -->
        <section class="content ">
          <div class="container">
            <?php 
              if(!file_exists($page.".php") && !is_dir($page)){
                  include '404.html';
              }else{
                if(is_dir($page))
                  include $page.'/index.php';
                else
                  include $page.'.php';

              }
            ?>
          </div>
        </section>
        <!-- /.content -->
  <div class="modal fade" id="confirm_modal" role='dialog'>
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Confirmation</h5>
      </div>
      <div class="modal-body">
        <div id="delete_content"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id='confirm' onclick="">Continue</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="uni_modal" role='dialog'>
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title"></h5>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id='submit' onclick="$('#uni_modal form').submit()">Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="uni_modal_right" role='dialog'>
    <div class="modal-dialog modal-full-height  modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span class="fa fa-arrow-right"></span>
        </button>
      </div>
      <div class="modal-body">
      </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="viewer_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
              <button type="button" class="btn-close" data-dismiss="modal"><span class="fa fa-times"></span></button>
              <img src="" alt="">
      </div>
    </div>
  </div>
      </div>
      <!-- /.content-wrapper -->
      <?php require_once('inc/footer.php') ?>
  </body>
</html>
